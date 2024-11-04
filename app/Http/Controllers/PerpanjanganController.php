<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DocumentRequest;
use App\Document;
use App\Permohonan;
use Auth;

class PerpanjanganController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    public function index(){
        $permohonan = Permohonan::where('users_id', Auth::user()->id)
                        ->where('jenis_permohonan', 'perpanjangan')
                        ->get();

        return view('pages.user.rekomendasi.perpanjangan', [
            'permohonan' => $permohonan,
            'title' => "Dokumen Perpanjangan"
        ]);
    }

    public function store(DocumentRequest $request){
        $data['users_id'] = Auth::user()->id;

        $data['permohonan_id'] =$request->permohonan_id;

        $data['sk_lisensi'] = $request->file('sk_lisensi')->store(
            'file/sk_lisensi', 'public'
        );

        $data['laporan_tindak_lanjut'] = $request->file('laporan_tindak_lanjut')->store(
            'file/laporan_tindak_lanjut', 'public'
        );

        $data['rekapitulasi_laporan'] = $request->file('rekapitulasi_laporan')->store(
            'file/rekapitulasi_laporan', 'public'
        );

        Document::create($data);
        return redirect('/')->with('success', 'Data berhasil di Simpan');
    }
}
