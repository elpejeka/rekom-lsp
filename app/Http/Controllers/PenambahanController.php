<?php

namespace App\Http\Controllers;

use App\Administration;
use App\Http\Requests\PenambahanRequest;
use Illuminate\Http\Request;
use App\Permohonan;
use App\Penambahan;
use App\OrganizationStructure;
use Auth;

class PenambahanController extends Controller
{
    public function index(){
        $permohonan = Permohonan::where('users_id', Auth::user()->id)
                        ->where('status_submit', NULL)->get();
        return view('pages.user.penambahan', [
            'permohonan' => $permohonan,
        ]);
    }

    public function store(PenambahanRequest $request){
        $idOrganisasi = OrganizationStructure::where('users_id', Auth::user()->id)->firstOrFail();
        $idAdministrasi = Administration::where('users_id', Auth::user()->id)->firstOrFail();
        
        $data = $request->all();
        $data['users_id'] = Auth::user()->id;
        $data['administration_id'] = $idAdministrasi->id ;
        $data['organisasi_id'] = $idOrganisasi->id;
    
        
        Penambahan::create($data);
        return redirect('/')->with('success', 'Data Penambahan Ruang Lingkup Berhasil di Simpan');
    }

    public function edit($id){
        $penambahan = Penambahan::findOrFail($id);

        return view('pages.user.edit.edit_penambahan',[
            'item' => $penambahan
        ]);
    }

    public function update(Request $request, $id){
        $penambahan = Penambahan::findOrFail($id);

        $data = $request->all();

        $penambahan->update($data);
        
        return redirect('/')->with('success', 'Data Penambahan berhasil di update');
    }
    
}
