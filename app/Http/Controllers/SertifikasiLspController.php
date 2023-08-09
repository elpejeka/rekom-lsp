<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LspCertificateRequest;
use App\Notifications\PerbaikanNotif;
use Illuminate\Support\Facades\DB;
use App\Administration;
use App\LspCertificate;
use App\Qualification;
use App\Permohonan;
use App\User;
use App\Jabker;
use Auth;
use Notification;

class SertifikasiLspController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    public function index(Request $request){
        $permohonan = Permohonan::where('users_id', Auth::user()->id)->get();      
        $kualifikasi = Qualification::with('klas', 'subklas')->where('users_id', Auth::user()->id)->get();   
        // $jabker = Jabker::all();   
        $jabker = DB::table('jabker_02')->get();
        $skema = DB::table('lsp_certificates')
                    ->where('lsp_certificates.users_id', '=' ,Auth::user()->id)
                    ->whereNull('lsp_certificates.deleted_at')
                    ->join('permohonans', function($skema){
                        $skema->on('lsp_certificates.permohonans_id', '=', 'permohonans.id');
                    })
                    ->select('lsp_certificates.*', 'permohonans.status_permohonan', 'permohonans.status_tolak', 'permohonans.status_submit')
                    ->get();
        // $skema = LspCertificate::with('permohonan')->where('users_id', Auth::user()->id)->get();

        return view('pages.user.sertifikasi_lsp', [
            'data' => $kualifikasi,
            'skema' => $skema,
            'items' => $jabker,
            'permohonan' => $permohonan
        ]);
    }

    public function store(LspCertificateRequest $request){
        $data = $request->all();
        $data['users_id'] = Auth::user()->id;
       
           if($request->hasFile('upload_persyaratan')){
            $data['upload_persyaratan'] = $request->file('upload_persyaratan')->store(
                'file/acuan_skema_lsp', 'public'
        );
        }else{
            $data['upload_persyaratan'] = 'file/pencatatan/1/nofile.pdf';
        }

        if($request->hasFile('standar_kompetensi')){
            $data['standar_kompetensi'] = $request->file('standar_kompetensi')->store(
                'file/standar_kompetensi/sertifikat', 'public'
        );
        }else{
            $data['standar_kompetensi'] = 'file/pencatatan/1/nofile.pdf';
        }
        
        
        LspCertificate::create($data);
        return redirect('/sertifikasi-lsp')->with('success', 'Data Skema Sertifikasi Lsp Berhasil di Simpan');
    }
    
    
    public function edit($id){
        $permohonan = Permohonan::where('users_id', Auth::user()->id)->get();     
        $kualifikasi = Qualification::with('klas', 'subklas')->where('users_id', Auth::user()->id)->get();      
        // $jabker = Jabker::all(); 
        // $jabker = DB::table('jabker_baru')->get();
        $jabker = DB::table('jabker_02')->get();
            
        $data = LspCertificate::findOrFail($id);

        return view('pages.user.edit.edit_skema', [
            'data' => $data,
            'subklas' => $kualifikasi,
            'items' => $jabker,
            'permohonan' => $permohonan
        ]);
    }

    public function update(Request $request, $id){
        $item = LspCertificate::findOrFail($id);
        $data = $request->all();
        $data['users_id'] = Auth::user()->id;
        
          if($request->hasFile('upload_persyaratan')){
            $data['upload_persyaratan'] = $request->file('upload_persyaratan')->store(
                'file/acuan_skema_lsp', 'public'
        );
        }else{
            $data['upload_persyaratan'] = $item->upload_persyaratan;
        }

        if($request->hasFile('standar_kompetensi')){
            $data['standar_kompetensi'] = $request->file('standar_kompetensi')->store(
                'file/standar_kompetensi/sertifikat', 'public'
        );
        }else{
            $data['standar_kompetensi'] = $item->standar_kompetensi;
        }

       
        $item->update($data);
        
        
        $user = User::where('roles', 'admin')->get();
        
        $administrasi = Administration::where('users_id', Auth::user()->id)->firstOrFail();
        Notification::send($user, new PerbaikanNotif($administrasi));

        return redirect('/sertifikasi-lsp')->with('success', 'Data Skema Berhasil di Update');

    }

    public function destroy($id)
    {
        $data = LspCertificate::findOrFail($id);
        $data->delete();

        return redirect()->route('sertifikasi-lsp')->with('success', 'Data Ruang Lingkup LSP Berhasil di hapus');
    }

    public function table(){
        $skema = LspCertificate::where('users_id', Auth::user()->id)->get();
        $id = Administration::where('users_id', Auth::user()->id)->firstOrFail();
        // $permohonan = Permohonan::where('id', $id->id)->firstOrFail();
        // $permohonan = Permohonan::where('id', Auth::user()->id)->firstOrFail();
        return view('pages.user.table.skema', [
            'skema' => $skema,
            // 'item' => $permohonan
        ]);
    }
}
