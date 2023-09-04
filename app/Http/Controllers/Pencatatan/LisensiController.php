<?php

namespace App\Http\Controllers\Pencatatan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Pencatatan;
use App\SKLisensi;
use Auth;

class LisensiController extends Controller
{
    public function index()
    {
        $permohonan = Pencatatan::where('users_id', Auth::user()->id)->get();
        $data = SKLisensi::where('users_id', Auth::user()->id)->get();

        return view('pages.user.catat.legalitas', [
            'permohonan' => $permohonan,
            'data' => $data,
            'title' => 'Legalitas LSP'
        ]);
    }

    public function store(Request $request){
        $data = $request->all();
        $data['users_id'] = Auth::user()->id;

         
        if($request->hasFile('sk_lisensi')){
            $data['sk_lisensi'] = $request->file('sk_lisensi')->store(
                'file/sk_lisensi_bnsp', 'public'
            );
        }else{
            $data['sk_lisensi'] = 'file/pencatatan/1/nofile.pdf';
        }

        if($request->hasFile('sertifikat_lisensi')){
            $data['sertifikat_lisensi'] = $request->file('sertifikat_lisensi')->store(
                'file/sertifikat_lisensi_bnsp', 'public'
            );
        }else{
            $data['sertifikat_lisensi'] = 'file/pencatatan/1/nofile.pdf';
        }

        SKLisensi::create($data);

        return redirect()->route('sk.lisensi')->with('success', 'Data Berhasil di Simpan');
    }


    public function edit($id){
        $data = SKLisensi::find($id);

        return view('pages.user.catat.edit.legalitas', [
            'data' => $data,
            'title' => 'Edit Legalitas'
        ]);
    }

    public function update(Request $request, $id){
        $item = SKLisensi::find($id);
        $data =  $request->all();

        if($request->hasFile('sk_lisensi')){
            $data['sk_lisensi'] = $request->file('sk_lisensi')->store(
                'file/sk_lisensi_bnsp', 'public'
            );
        }else{
            $data['sk_lisensi'] = $item->sk_lisensi;
        }

        if($request->hasFile('sertifikat_lisensi')){
            $data['sertifikat_lisensi'] = $request->file('sertifikat_lisensi')->store(
                'file/sertifikat_lisensi_bnsp', 'public'
            );
        }else{
            $data['sertifikat_lisensi'] = $item->sertifikat_lisensi;
        }

        $item->update($data);

        return redirect()->route('sk.lisensi')->with('success', 'Data Berhasil di Simpan');
    }

    public function destroy($id){
        $item = SKLisensi::find($id);
        $item->delete();

        return redirect()->route('sk.lisensi')->with('success', 'Data Berhasil di Hapus');
    }
}
