<?php

namespace App\Http\Controllers;

use App\Http\Requests\QualificationRequest;
use Illuminate\Http\Request;
use App\Qualification;
use App\Permohonan;
use App\Administration;
use App\Subklasifikasi;
use App\Klasifikasi;
use Auth;
use Illuminate\Support\Facades\DB;

class KualifikasiController extends Controller
{   


    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    public function index(Request $request){
        $kualifikasi = Qualification::with('klas', 'subklas')->where('users_id', Auth::user()->id)->get();
        // dd($kualifikasi);
        $permohonan = Permohonan::where('id', Auth::user()->id)->get();
        $klasifikasi = Klasifikasi::all();
        return view('pages.user.rekomendasi.klasifikasi', [
            'data' => $kualifikasi,
            'item' => $permohonan,
            'klas' => $klasifikasi,
            'title' => 'Klasifikasi dan Subklasifikasi'
        ]);
    }

    public function store(QualificationRequest $request){
        $data = $request->all();
        $data['users_id'] = Auth::user()->id;
        // $data['upload_persyaratan'] = $request->file('upload_persyaratan')->store(
        //     'file/kualifikasi', 'public'
        // );

        Qualification::create($data);
        return redirect('/kualifikasi')->with('success', 'Data Kualifikasi dan Sub Kualifikasi Berhasil di Simpan');
    }

    public function destroy($id)
    {
        $data = Qualification::findOrFail($id);
        $data->delete();

        return redirect()->route('kualifikasi')->with('success', 'Data Klasifikasi dan Subklasifikasi Berhasil di hapus');
    }

    public function table(){
        $kualifikasi = Qualification::where('users_id', Auth::user()->id)->get();
        $id = Administration::where('users_id', Auth::user()->id)->firstOrFail();
        // $permohonan = Permohonan::where('id', $id->id)->firstOrFail();
        return view('pages.user.table.kualifikasi', [
            'data' => $kualifikasi,
            // 'item' => $permohonan
            
        ]);
    }

    public function edit(){
        
    }

    public function getSubklas(Request $request){
        $subklas = Subklasifikasi::where("klas", $request->kode)->pluck('kode_sub','nama');
        return response()->json($subklas);
    }
}
