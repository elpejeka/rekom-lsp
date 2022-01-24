<?php

namespace App\Http\Controllers;

use App\Http\Requests\QualificationRequest;
use Illuminate\Http\Request;
use App\Qualification;
use App\Permohonan;
use App\Administration;
use Auth;

class KualifikasiController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    public function index(Request $request){
        $kualifikasi = Qualification::where('users_id', Auth::user()->id)->get();
        $permohonan = Permohonan::where('id', Auth::user()->id)->get();
        return view('pages.user.kualifikasi', [
            'data' => $kualifikasi,
            'item' => $permohonan
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
}
