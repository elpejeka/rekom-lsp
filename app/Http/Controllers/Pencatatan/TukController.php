<?php

namespace App\Http\Controllers\Pencatatan;

use App\Http\Controllers\Controller;
use App\Http\Requests\Pencatatan\TukRequest;
use Illuminate\Http\Request;
use App\Pencatatan;
use App\PencatatanTuk;
use Auth;

class TukController extends Controller
{
    public function index(){
        $permohonan = Pencatatan::where('users_id', Auth::user()->id)->get();
        $tuk = PencatatanTuk::where('users_id', Auth::user()->id)->get();
        return view('pages.user.pencatatan.tuk', [
            'permohonan' => $permohonan,
            'data' => $tuk
        ]);
    }

    public function store(TukRequest $request){
        $data = $request->all();
        $data['users_id'] = Auth::user()->id;

        if($request->hasFile('upload_persyaratan')){
            $data['upload_persyaratan'] = $request->file('upload_persyaratan')->store(
                'file/tuk/1', 'public'
        );
        }else{
            $data['upload_persyaratan'] = 'file/pencatatan/1/nofile.pdf';
        }

        PencatatanTuk::create($data);

        return redirect()->route('pencatatan.tuk')->with('success', 'Pencatatan TUK Berhasil di Simpan');

    }

    public function edit($id){
        $data = PencatatanTuk::findOrFail($id);
        $permohonan = Pencatatan::where('users_id', Auth::user()->id)->get();

        return view('pages.user.pencatatan.edit.edit-tuk', [
            'data' => $data,
            'permohonan' => $permohonan,
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


}
