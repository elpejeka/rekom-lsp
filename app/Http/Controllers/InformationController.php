<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AdministrationRequest;
use Illuminate\Support\Facades\DB;
use App\Administration;
use App\Permohonan;
use App\User;
use App\Association;
use App\Notifications\AdministrationUpdate;
use illuminate\Support\Str;
use Auth;
use Notification;

class InformationController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    public function index(Request $request){
        $user_file = User::with(['asosiasi', 'asosiasi1', 'asosiasi2'])
                            ->where('id', Auth::user()->id)->firstOrFail();

        $item = Administration::with(['propinsi', 'unsur', 'unsur1', 'unsur2'])->where('users_id', Auth::user()->id)->get();
        $propinsi = DB::table('propinsi_dagri')->get();

        return view('pages.user.informasi', [
            // 'item' => $permohonan,
            // 'data' => $user
            'data' => $user_file,
            'item' => $item,
            'informasi' => $item->count(),
            'propinsi' => $propinsi
        ]);
    }

    public function store(AdministrationRequest $request){
        $data = $request->all();
        // $data['slug'] = Str::slug($request->nama);
        $data['users_id'] = Auth::user()->id;      
        
          if($request->hasFile('upload_persyaratan')){
        $data['upload_persyaratan'] = $request->file('upload_persyaratan')->store(
            'file/sk_asosiasi', 'public'
        );
        }else{
            $data['upload_persyaratan'] = 'file/pencatatan/1/nofile.pdf';
        }

        if($request->hasFile('akta_pendirian')){
            $data['akta_pendirian'] = $request->file('akta_pendirian')->store(
                'file/akta_pendirian', 'public'
            );
        }else{
            $data['akta_pendirian'] = 'file/pencatatan/1/nofile.pdf';
        }

        if($request->hasFile('bukti_kepemilikan')){
            $data['bukti_kepemilikan'] = $request->file('bukti_kepemilikan')->store(
                'file/bukti_kepemilikan', 'public'
            );
        }else{
            $data['bukti_kepemilikan'] = 'file/pencatatan/1/nofile.pdf';
        }

        if($request->hasFile('komitmen_asesor')){
            $data['komitmen_asesor'] = $request->file('komitmen_asesor')->store(
                'file/komitment-asesor', 'public'
            );
        }else{
            $data['komitmen_asesor'] = 'file/pencatatan/1/nofile.pdf';
        }

        if($request->hasFile('surat_akreditasi')){
            $data['surat_akreditasi'] = $request->file('surat_akreditasi')->store(
                'file/surat_akreditasi', 'public'
            );
        }else{
            $data['surat_akreditasi'] = 'file/akreditasi/1/nofile.pdf';
        }
    
        Administration::create($data);
        return redirect('/')->with('success', 'Data Administrasi Berhasil di Simpan');
    }

    public function edit($id){
        $item = Administration::findOrFail($id);
        $asosiasi = Association::all();
        $propinsi = DB::table('propinsi_dagri')->get();
        $user_file = User::with(['administrasi', 'organization', 'sertifikat_lsp', 'asesors', 'permohonan', 'asosiasi', 'asosiasi1', 'asosiasi2'])
                        ->where('id', Auth::user()->id)->firstOrFail();
        

        return view('pages.user.edit.edit_administrasi')->with([
            'item' => $item,
            'asosiasi' => $asosiasi,
            'data' => $user_file,
            'propinsi' => $propinsi
        ]);
    }
    
    public function update(Request $request, $id){
        $item = Administration::findOrFail($id);
        $data = $request->all();
        // $data['slug'] = Str::slug($request->nama);
        if($request->hasFile('upload_persyaratan')){
            $data['upload_persyaratan'] = $request->file('upload_persyaratan')->store(
                'file/sk_asosiasi', 'public'
            );
            }else{
                $data['upload_persyaratan'] = $item->upload_persyaratan;
            }
    
            if($request->hasFile('akta_pendirian')){
                $data['akta_pendirian'] = $request->file('akta_pendirian')->store(
                    'file/akta_pendirian', 'public'
                );
            }else{
                $data['akta_pendirian'] = $item->akta_pendirian;
            }
    
            if($request->hasFile('bukti_kepemilikan')){
                $data['bukti_kepemilikan'] = $request->file('bukti_kepemilikan')->store(
                    'file/bukti_kepemilikan', 'public'
                );
            }else{
                $data['bukti_kepemilikan'] = $item->bukti_kepemilikan;
            }

            if($request->hasFile('komitmen_asesor')){
                $data['komitmen_asesor'] = $request->file('komitmen_asesor')->store(
                    'file/komitmen-asesor', 'public'
                );
            }else{
                $data['komitmen_asesor'] = $item->komitmen_asesor;
            }

            if($request->hasFile('surat_akreditasi')){
                $data['surat_akreditasi'] = $request->file('surat_akreditasi')->store(
                    'file/surat_akreditasi', 'public'
                );
            }else{
                $data['surat_akreditasi'] = $item->surat_akreditasi;
            }

        $item = Administration::findOrFail($id);
        $item->update($data);
        
        
        $user = User::where('roles', 'admin')->get();
        Notification::send($user, new AdministrationUpdate($item));

        return redirect('/')->with('success', 'Data Administrasi berhasil di update');
    }
    
     public function revisi($id){
        $item = Administration::findOrFail($id);

        return view('pages.user.edit.edit_sk_menteri', [
            'item' => $item
        ]);
    }

    public function table(){
        $administrasi = Administration::where('users_id', Auth::user()->id)->get();
        $id = Administration::where('users_id', Auth::user()->id)->firstOrFail();
        // $permohonan = Permohonan::where('id', $id->id)->firstOrFail();
        return view('pages.user.table.administrasi', [
            'data' => $administrasi,
            // 'item' => $permohonan
        ]);
    }

}
