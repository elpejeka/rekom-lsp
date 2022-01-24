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
        // $permohonan = Permohonan::where('id', Auth::user()->id)->firstOrFail();
        return view('pages.user.tuk', [
            'data' => $tuk,
            // 'item' => $permohonan
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
