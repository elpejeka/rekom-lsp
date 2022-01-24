<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AsesorRequest;
use Illuminate\Support\Str;
use App\Asesor;
use App\Qualification;
use App\Permohonan;
use App\Administration;
use Auth;

class AsesorController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    public function index(Request $request){
        $asesor = Asesor::where('users_id', Auth::user()->id)->get();
        // $permohonan = Permohonan::where('id', Auth::user()->id)->firstOrFail();
        return view('pages.user.asesor', [
            'asesor' => $asesor,
            // 'item' => $permohonan
        ]);
    }

    public function store(Request $request){
      $data = $request->all();
        $data['slug'] = Str::slug($request->nama_asesor);
        $data['users_id'] = Auth::user()->id;
        Asesor::create($data);
        return redirect('/asesor')->with('success', 'Data Asesor Berhasil di Simpan');
    }
    
      public function show($slug){
        $item = Asesor::with('sertifikat')->where('slug', $slug)->firstOrFail();

        return view('pages.user.show.detail_asesor', [
            'item' => $item
        ]);
    }
    
    public function edit($id){
        $asesor = Asesor::findOrFail($id);

        return view('pages.user.edit.edit_asesor',[
            'item' => $asesor
        ]);
    }

    public function update(AsesorRequest $request, $id){
        $data = $request->all();
        $data['slug'] = Str::slug($request->nama_asesor);
        $data['users_id'] = Auth::user()->id;

        $item = Asesor::findOrFail($id);

        $item->update($data);
        return redirect('/asesor')->with('success', 'Data Asesor Berhasil di Update');
    }

    public function destroy($id)
    {
        $data = Asesor::findOrFail($id);
        $data->delete();

        return redirect()->route('asesor')->with('success', 'Data Asesor Berhasil di hapus');
    }


    public function table(){
        $asesor = Asesor::where('users_id', Auth::user()->id)->get();
        $id = Administration::where('users_id', Auth::user()->id)->firstOrFail();
        // $permohonan = Permohonan::where('id', $id->id)->firstOrFail();
        // $permohonan = Permohonan::where('id', Auth::user()->id)->firstOrFail();
        return view('pages.user.table.asesor', [
            'asesor' => $asesor,
            // 'item' => $permohonan
        ]);
    }

}
