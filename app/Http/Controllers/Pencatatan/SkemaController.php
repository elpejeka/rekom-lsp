<?php

namespace App\Http\Controllers\Pencatatan;

use App\Administration;
use App\Http\Controllers\Controller;
use App\Http\Requests\Pencatatan\SkemaRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Jabker;
use App\Pencatatan;
use App\PencatatanSkema;
use Illuminate\Support\Facades\Auth;
use App\LogPencatatan;
use App\LogSkema;
use Carbon\Carbon;

class SkemaController extends Controller
{
    public function index(){
        // $jabker = Jabker::all();
        // $jabker = DB::table('jabker_baru')->get();
        $jabker = DB::table('jabker_07')->get();
        $permohonan = Pencatatan::where('users_id', Auth::user()->id)->get();
        $skema = PencatatanSkema::where('users_id', Auth::user()->id)->get();
        return view('pages.user.pencatatan.skema', [
            'items' => $jabker,
            'permohonan' => $permohonan,
            'skema' => $skema
        ]);
    }

    public function store(SkemaRequest $request){
        $item = Pencatatan::where('users_id', Auth::user()->id)->first();
        $administrasi = Administration::where('users_id', Auth::user()->id)->first();
        $data = $request->all();
        $jenjang = $request->input('jenjang');
        $data["jenjang"] = implode(',' , $jenjang);
        $data['users_id'] = Auth::user()->id;

        if($request->hasFile('upload_persyaratan')){
            $data['upload_persyaratan'] = $request->file('upload_persyaratan')->store(
                'file/skema/1', 'public'
        );
        }else{
            $data['upload_persyaratan'] = 'file/pencatatan/1/nofile.pdf';
        }

        if($item->approve != null){
            $notif = new LogPencatatan;
            $notif->nama_lsp = $administrasi->nama;
            $notif->keterangan = 'Permohonan Pencatatan Skema';
            $notif->created_at = Carbon::now();
            $notif->save();
        }

        PencatatanSkema::create($data);
        return redirect('/')->with('success', 'Pencatatan Skema Berhasil diSimpan');
    }

    public function edit($id){
        $data = PencatatanSkema::findOrFail($id);
        $permohonan = Pencatatan::where('users_id', Auth::user()->id)->get();
        // $jabker = Jabker::all();
        // $jabker = DB::table('jabker_baru')->get();
        $jabker = DB::table('jabker_07')->get();
    
        return view('pages.user.pencatatan.edit.edit-skema', [
            'data' => $data,
            'permohonan' => $permohonan,
            'items' => $jabker,
            
        ]);
    }

    public function update(Request $request, $id){
        $item = PencatatanSkema::findOrFail($id);
        $data = $request->all();
        $jenjang = $request->input('jenjang');
        $data["jenjang"] = implode(',' , $jenjang);

        if($request->hasFile('upload_persyaratan')){
            $data['upload_persyaratan'] = $request->file('upload_persyaratan')->store(
                'file/skema/1', 'public'
        );
        }else{
            $data['upload_persyaratan'] = $item->upload_persyaratan;
        }

        if($item->approve == 1){
            LogSkema::create([
                'file' => $item->upload_persyaratan,
                'user_id' => Auth::user()->id
            ]);
        }

        LogSkema::create([
            'file' => $data
        ]);

        $item->update($data);

        return redirect()->route('pencatatan.skema')->with('success', 'Data Skema Berhasil di Update');  
    }

    public function destroy($id){
        $data= PencatatanSkema::findOrFail($id);
        $data->delete();

        return redirect()->route('pencatatan.skema')->with('success', 'Data Skema Berhasil di Hapus');  
    }

    public function showSkema($id){
        $skema = PencatatanSkema::find($id);
        
        return response()->json($skema);
    }

    public function approveSkema(Request $request){
        $id = $request->id;
        $skema = PencatatanSkema::find($id);
        $skema->nama_skema = $request->nama_skema;
        $skema->approve = $request->approve;
        $skema->no_pencatatan = $request->no_pencatatan;

        $skema->save();
        return response()->json($skema);
    }

    public function unapprove($id){
        $skema = PencatatanSkema::find($id);
        $skema->approve = null;
        $skema->no_pencatatan = null;
        $skema->save();
        
        return redirect()->route('pencatatan.approve.list')->with('success', 'Data Skema Tidak Tayang');  
    }

}
