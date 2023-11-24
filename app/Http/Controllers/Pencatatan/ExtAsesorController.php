<?php

namespace App\Http\Controllers\Pencatatan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ExtAsesor;
use App\PencatatanAsesor;
use Auth;

class ExtAsesorController extends Controller
{
    public function index($id){
        $asesor = PencatatanAsesor::find($id);
        $data = ExtAsesor::where('asesor_id', $id)->get();
        return view('pages.user.catat.ext-asesor', [
            'asesor' => $asesor,
            'data' => $data,
            'title' => 'Dokumen Perjanjian Asesor'
        ]);
    }

    public function store(Request $request){
        $data = $request->all();

        $data['user_id'] = Auth::user()->id;

        if($request->hasFile('upload_persyaratan')){
            $data['upload_persyaratan'] = $request->file('upload_persyaratan')->store(
                'file/pencatatan/external/', 'public'
            );
        }else{
            $data['upload_persyaratan'] = 'file/pencatatan/1/nofile.pdf';
        }

        ExtAsesor::create($data);

        return redirect()->route('pencatatan.asesor')->with('success', 'Data Asesor Berhasil di Simpan');
    }

    public function edit($id){
        $data = ExtAsesor::find($id);

        return view('pages.user.catat.edit.ext-asesor', [
            'item' => $data,
            'title' => 'Dokumen Perjanjian Asesor'
        ]);
    }

    public function update(Request $request, $id){
        $item = ExtAsesor::find($id);
        $data = $request->all();
        if($request->hasFile('upload_persyaratan')){
            $data['upload_persyaratan'] = $request->file('upload_persyaratan')->store(
                'file/pencatatan/external/', 'public'
        );
        }else{
            $data['upload_persyaratan'] = $item->upload_persyaratann;
        }

        $item->update($data);

        return redirect()->route('pencatatan.asesor')->with('success', 'Data Asesor Berhasil di Update');
    }

    public function destroy($id){
        $item = ExtAsesor::find($id);

        $item->delete();

        return redirect()->route('pencatatan.asesor')->with('success', 'Data Asesor Berhasil di Hapus');
    }
    
}
