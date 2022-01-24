<?php

namespace App\Http\Controllers\Pencatatan;

use App\Http\Controllers\Controller;
use App\Http\Requests\Pencatatan\SertifikatRequest;
use Illuminate\Http\Request;
use App\PencatatanAsesor;
use App\PencatatanSertifikat;
use App\Qualification;
use Auth;

class SertifikatController extends Controller
{
    public function index($slug){
        $kualifikasi = Qualification::where('users_id', Auth::user()->id)->get();     
        $asesor = PencatatanAsesor::where('slug', $slug)->firstOrFail();
        $sertifikat = PencatatanSertifikat::where('users_id', Auth::user()->id)->get(); 
        return view('pages.user.pencatatan.sertifikat', [
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
                'file/pencatatan/1/sertifikat', 'public'
        );
        }else{
            $data['ska'] = 'file/pencatatan/1/nofile.pdf';
        }

        if($request->hasFile('sertifikat_asesors')){
            $data['sertifikat_asesors'] = $request->file('sertifikat_asesors')->store(
                'file/pencatatan/1/sertifikat', 'public'
        );
        }else{
            $data['sertifikat_asesors'] = 'file/pencatatan/1/nofile.pdf';
        }

        PencatatanSertifikat::create($data);
        return redirect()->route('pencatatan.asesor')->with('success', 'Data Sertifikat Berhasil di Simpan');
    }

    public function edit($id){
        $data = PencatatanSertifikat::findOrFail($id);
        $kualifikasi = Qualification::where('users_id', Auth::user()->id)->get();     

        return view('pages.user.pencatatan.edit.edit-sertifikat', [
            'data' => $data,
            'klasifikasi' => $kualifikasi,
        ]);
    }

    public function update(Request $request, $id){
        $item = PencatatanSertifikat::findOrFail($id);
        $data = $request->all();

        if($request->hasFile('ska')){
            $data['ska'] = $request->file('ska')->store(
                'file/pencatatan/1/sertifikat', 'public'
        );
        }else{
            $data['ska'] = $item->ska;
        }

        if($request->hasFile('sertifikat_asesors')){
            $data['sertifikat_asesors'] = $request->file('sertifikat_asesors')->store(
                'file/pencatatan/1/sertifikat', 'public'
        );
        }else{
            $data['sertifikat_asesors'] = $item->sertifikat_asesors;
        }

        $item->update($data);

    }

    public function destroy($id){
        $data = PencatatanSertifikat::findOrFail($id);
        $data->delete();

        return redirect()->route('pencatatan.asesor')->with('success', 'Data Sertifikat Berhasil di Hapus');
    }


}
