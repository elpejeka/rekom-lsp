<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LocationRequest;
use App\Permohonan;
use App\Tuk;
use App\Administration;
use Auth;

class TukController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    public function index(){
        $tuk = Tuk::where('users_id', Auth::user()->id)->get();
        return view('pages.user.rekomendasi.tuk', [
            'data' => $tuk,
            'title' => "Tempat Uji Kompetensi"
        ]);
    }

    public function store(Request $request){
        $data = $request->all();
        $data['users_id'] = Auth::user()->id;
        $data['cakupan'] = $request->file('cakupan')->store(
            'file/sarana', 'public'
        );
        
        Tuk::create($data);
        return redirect('/tempat-uji-kompetensi')->with('success', 'Data Tempat Uji Kompetensi Berhasil di Simpan');
    }

    public function edit($id){
        $tuk = Tuk::find($id);

        return view('pages.user.rekomendasi.edit.tuk', [
            'item' => $tuk,
            'title' => "Edit Tempat Uji Kompetensi"
        ]);
    }

    public function update(Request $request, $id){
        $tuk = Tuk::find($id);

        $tuk->nama_tuk = $request->nama_tuk;
        $tuk->alamat = $request->alamat;
        $tuk->cakupan = $request->hasFile('cakupan') ? $request->file('cakupan')->store('file/sarana', 'public') : $tuk->cakupan;
        $tuk->save();

        return redirect('/tempat-uji-kompetensi')->with('success', 'Data Tempat Uji Kompetensi Berhasil di Update');

    }

    public function destroy($id)
    {
        $data = Tuk::findOrFail($id);
        $data->delete();

        return redirect()->route('tuk')->with('success', 'Data Tempat Uji Kompetensi Berhasil di hapus');
    }

    public function table(){
        $tuk = Tuk::where('users_id', Auth::user()->id)->get();
        $id = Administration::where('users_id', Auth::user()->id)->firstOrFail();
        // $permohonan = Permohonan::where('id', $id->id)->firstOrFail();
        // $permohonan = Permohonan::where('id', Auth::user()->id)->firstOrFail();
        // dd($permohonan);
        return view('pages.user.table.tuk', [
            'data' => $tuk,
            // 'item' => $permohonanA
        ]);
    }

}
