<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asesor;
use App\Jabker;
use App\SkemaAsesor;
use Auth;
use Illuminate\Support\Facades\DB;

class SkemaAsesorController extends Controller
{
    public function index($slug){
        $asesor = Asesor::where('slug', $slug)->firstOrFail();
        $subklas = DB::table('subklasifikasi')->get();
        $skemaAsesor = SkemaAsesor::where('asesor_id', $asesor->id)->get();
        $skema = DB::table('jabker_02')->get();

        return view('pages.user.rekomendasi.skema-asesor', [
            'asesor' => $asesor,
            'subklas' => $subklas,
            'sertifikat' => $skemaAsesor,
            'skema' => $skema,
            'title' => "Skema Asesor"
        ]);
    }   

    public function store(Request $request){
        $asesor_id = $request->asesor_id;
        $skema = $request->skema_sertifikasi;
        $user_id = Auth::user()->id;
        $kualifikasi = $request->kualifikasi;
        $subklasifikasi = $request->subklasifikasi;

        for ($i=0; $i < count($kualifikasi) ; $i++) { 
            $data = [
                'skema_sertifikasi' => $skema,
                'asesor_id' => $asesor_id,
                'users_id' => $user_id,
                'kualifikasi' => $kualifikasi[$i],
                'subklasifikasi' => $subklasifikasi[$i]
            ];

            // print_r($data);
            SkemaAsesor::create($data); 
        }

        return redirect()->route('asesor')->with('success', 'Data Skema Asesor Berhasil di Simpan');
    }

    public function edit($id){
        $subklas = DB::table('subklasifikasi')->get();
        $skema = Jabker::all();
        $item = SkemaAsesor::with('asesor')->findOrFail($id);

        // dd($item->subklasifikasi);

        return view('pages.user.edit.edit_skema_asesor', [
            'item' => $item,
            'skema' => $skema,
            'subklas' => $subklas,
        ]);
    }

    public function update(Request $request, $id){
        $data = $request->all();
        $data['users_id'] = Auth::user()->id;
        $item = SkemaAsesor::findOrFail($id);

        $item->update($data);

        return redirect('/asesor')->with('success', 'Data Asesor Berhasil di Update');
       
    }   

    public function destroy($id){
        $data = SkemaAsesor::findOrFail($id);
        $data->delete();

        return redirect('/asesor')->with('success', 'Data Asesor Berhasil di Hapus');
    }
}
