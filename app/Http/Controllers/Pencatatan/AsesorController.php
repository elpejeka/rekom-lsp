<?php

namespace App\Http\Controllers\Pencatatan;

use App\Http\Controllers\Controller;
use App\Http\Requests\Pencatatan\PencatatanAsesorRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\PencatatanAsesor;
use App\Pencatatan;

use Auth;

class AsesorController extends Controller
{
    public function index(){
        $data = PencatatanAsesor::where('users_id', Auth::user()->id)->get();
        $permohonan = Pencatatan::where('users_id', Auth::user()->id)->get();
        return view('pages.user.pencatatan.asesor', [
            'asesor' => $data,
            'permohonan' => $permohonan
        ]);
    }

    public function store(PencatatanAsesorRequest $request){
        $data = $request->all();
        $data['slug'] = Str::slug($request->nama_asesor);
        $data['users_id'] = Auth::user()->id;

        PencatatanAsesor::create($data);
        return redirect()->route('pencatatan.asesor')->with('success', 'Data Asesor Berhasil di Simpan');
    }

    public function edit($slug){
        $data = PencatatanAsesor::where('slug', $slug)->firstOrFail();
        $permohonan = Pencatatan::where('users_id', Auth::user()->id)->get();

        return view('pages.user.pencatatan.edit.edit-asesor', [
            'data' => $data,
            'permohonan' => $permohonan
        ]);
    }

    public function update(PencatatanAsesorRequest $request, $id){
        $data = $request->all();
        $data['slug'] = Str::slug($request->nama_asesor);

        $item = PencatatanAsesor::findOrFail($id);

        $item->update($data);

        return redirect()->route('pencatatan.asesor')->with('success', 'Data Asesor Berhasil di Update');  
    }

    public function destroy($id){
        $data = PencatatanAsesor::findOrFail($id);
        $data->delete();

        return redirect()->route('pencatatan.asesor')->with('success', 'Data Asesor Berhasil di Hapus');  
    }

    public function show($slug){
        $item = PencatatanAsesor::with('sertifikat')->where('slug', $slug)->firstOrFail();
      
        // dd($item);

        return view('pages.user.show.sertifikat_asesor', [
            'item' => $item
        ]);
    }


}
