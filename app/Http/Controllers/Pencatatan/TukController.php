<?php

namespace App\Http\Controllers\Pencatatan;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Pencatatan\TukRequest;
use Illuminate\Http\Request;
use App\Administration;
use App\Pencatatan;
use App\PencatatanTuk;
use App\LogPencatatan;
use Auth;
use Carbon\Carbon;

class TukController extends Controller
{
    public function index(){
        $permohonan = Pencatatan::where('users_id', Auth::user()->id)->get();
        $tuk = PencatatanTuk::where('users_id', Auth::user()->id)->get();
        $propinsi = DB::table('propinsi_dagri')->get();
        return view('pages.user.pencatatan.tuk', [
            'permohonan' => $permohonan,
            'data' => $tuk,
            'propinsi' => $propinsi,
        ]);
    }

    public function store(TukRequest $request){
        $item = Pencatatan::where('users_id', Auth::user()->id)->first();
        $administrasi = Administration::where('users_id', Auth::user()->id)->first();
        
        $data = $request->all();
        $data['users_id'] = Auth::user()->id;

        if($request->hasFile('upload_persyaratan')){
            $data['upload_persyaratan'] = $request->file('upload_persyaratan')->store(
                'file/tuk/1', 'public'
        );
        }else{
            $data['upload_persyaratan'] = 'file/pencatatan/1/nofile.pdf';
        }

        if($item->approve != null){
            $notif = new LogPencatatan;
            $notif->nama_lsp = $administrasi->nama;
            $notif->keterangan = 'Permohonan Pencatatan TUK';
            $notif->created_at = Carbon::now();
            $notif->save();
        }

        PencatatanTuk::create($data);

        return redirect()->route('pencatatan.tuk')->with('success', 'Pencatatan TUK Berhasil di Simpan');

    }

    public function edit($id){
        $data = PencatatanTuk::findOrFail($id);
        $permohonan = Pencatatan::where('users_id', Auth::user()->id)->get();
        $propinsi = DB::table('propinsi_dagri')->get();

        return view('pages.user.pencatatan.edit.edit-tuk', [
            'data' => $data,
            'permohonan' => $permohonan,
            'propinsi' => $propinsi,
        ]);
    }

    public function update(Request $request, $id){
        $item = PencatatanTuk::findOrFail($id);

        $data = $request->all();

        if($request->hasFile('upload_persyaratan')){
            $data['upload_persyaratan'] = $request->file('upload_persyaratan')->store(
                'file/tuk/1', 'public'
        );
        }else{
            $data['upload_persyaratan'] = $item->upload_persyaratan;
        }

        $item->update($data);
        return redirect()->route('pencatatan.tuk')->with('success', 'Pencatatan TUK Berhasil di Update');
    }

    public function destroy($id){
        $data = PencatatanTuk::findOrFail($id);
        $data->delete();

        return redirect()->route('pencatatan.tuk')->with('success', 'Pencatatan TUK Berhasil di Hapus');
    }

    public function showTuk($id){
        $tuk = PencatatanTuk::find($id);

        return response()->json($tuk);
    }

    public function approveTuk(Request $request){
        $id = $request->id;
        $tuk = PencatatanTuk::find($id);
        $tuk->nama_tuk = $request->nama_tuk;
        $tuk->approve = $request->approve;
        $tuk->no_pencatatan = $request->no_pencatatan;

        $tuk->save();
        return response()->json($tuk);
    }

    public function unapprove($id){
        $tuk = PencatatanTuk::find($id);
        $tuk->approve = null;
        $tuk->no_pencatatan = null;
        $tuk->save();

        return redirect()->route('pencatatan.approve.list')->with('success', 'Pencatatan TUK Tidak Ditayangkan');
    }

}
