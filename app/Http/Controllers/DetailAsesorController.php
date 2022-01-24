<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DetailAsesorRequest;
use App\Qualification;
use App\Asesor;
use App\DetailAsesor;
use Auth;

class DetailAsesorController extends Controller
{
    public function index($slug){
        $kualifikasi = Qualification::where('users_id', Auth::user()->id)->get();     
        $asesor = Asesor::where('slug', $slug)->firstOrFail();
        $sertifikat = DetailAsesor::where('asesor_id', $asesor->id)->get();

        return view('pages.user.detail_asesor', [
            'asesor' => $asesor,
            'data' => $kualifikasi,
            'sertifikat' => $sertifikat
        ]);
    }


    public function store(Request $request){
        $data = $request->all();
        $data['users_id'] = Auth::user()->id;

        if($request->hasFile('ska')){
            $data['ska'] = $request->file('ska')->store(
                'file/asesor/sertifikat', 'public'
        );
        }else{
            $data['ska'] = 'file/pencatatan/1/nofile.pdf';
        }

        if($request->hasFile('sertifikat_asesors')){
            $data['sertifikat_asesors'] = $request->file('sertifikat_asesors')->store(
                'file/asesor/sertifikat', 'public'
        );
        }else{
            $data['sertifikat_asesors'] = 'file/pencatatan/1/nofile.pdf';
        }

        DetailAsesor::create($data);
        return redirect()->route('asesor')->with('success', 'Data Asesor Berhasil di Simpan');
    }

    public function edit($id){
        $kualifikasi = Qualification::where('users_id', Auth::user()->id)->get();     
        $item = DetailAsesor::with('asesor')->findOrFail($id);


        return view('pages.user.edit.edit_detail_asesor', [
            'item' => $item,
            'data' => $kualifikasi,
        ]);
    }

    public function update(DetailAsesorRequest $request, $id){
        $item = DetailAsesor::findOrFail($id);
        $data = $request->all();
        $data['users_id'] = Auth::user()->id;

        if($request->hasFile('ska')){
            $data['ska'] = $request->file('ska')->store(
                'file/asesor/sertifikat', 'public'
        );
        }else{
            $data['ska'] = $item->ska;
        }

        if($request->hasFile('sertifikat_asesor')){
            $data['sertifikat_asesor'] = $request->file('sertifikat_asesor')->store(
                'file/asesor/sertifikat', 'public'
        );
        }else{
            $data['sertifikat_asesor'] = $item->sertifikat_asesor;
        }

        $item->update($data);
        return redirect()->route('asesor')->with('success', 'Data Detail Asesor Berhasil di Simpan');
    }
    
    public function destroy($id){
        $data = DetailAsesor::findOrFail($id);
        $data->delete();

        return redirect()->route('asesor')->with('success', 'Data Detail Asesor Berhasil di Hapus');
    }
}
