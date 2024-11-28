<?php

namespace App\Services\Rekomendasi;

use App\OrganizationStructure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrganizationService{

    public function save(Request $request){
        DB::beginTransaction();

        $data = new OrganizationStructure();
        $data->pengarah = $request->pengarah;
        $data->pengarah_1 = $request->pengarah_1;
        $data->pengarah_2 = $request->pengarah_2;
        $data->pengarah_3 = $request->pengarah_3;
        $data->pengarah_4 =  $request->pengarah_4;
        $data->pengarah_5 = $request->pengarah_5;
        $data->ketua = $request->ketua;
        $data->umum = $request->umum;
        $data->sertifikasi = $request->sertifikasi;
        $data->manajemen_mutu = $request->manajemen_mutu;
        $data->jumlah_karyawan = $request->jumlah_karyawan;
        $data->no_telp_pengarah = $request->no_telp_pengarah;
        $data->no_telp_pengarah_1 = $request->no_telp_pengarah_1;
        $data->no_telp_pengarah_2 = $request->no_telp_pengarah_2;
        $data->no_telp_pengarah_3 = $request->no_telp_pengarah_3;
        $data->no_telp_pengarah_4 = $request->no_telp_pengarah_4;
        $data->no_telp_pengarah_5 = $request->no_telp_pengarah_5;
        $data->no_ketua = $request->no_ketua;
        $data->no_umum = $request->no_umum;
        $data->no_sertifikasi = $request->no_sertifikasi;
        $data->no_manajemen = $request->no_manajemen;
        $data->upload_persyaratan = $request->hasFile('upload_persyaratan') ? $request->file('upload_persyaratan')->store('file/struktur-organisasi', 'public') : 'file/pencatatan/1/nofile.pdf';
        $data->users_id = Auth::user()->id;
        $data->save();

        DB::commit();
    }

    public function updated(Request $request, $id){
        $data = OrganizationStructure::findOrFail($id);
        DB::beginTransaction();
        $data->pengarah = $request->pengarah;
        $data->pengarah_1 = $request->pengarah_1;
        $data->pengarah_2 = $request->pengarah_2;
        $data->pengarah_3 = $request->pengarah_3;
        $data->pengarah_4 =  $request->pengarah_4;
        $data->pengarah_5 = $request->pengarah_5;
        $data->ketua = $request->ketua;
        $data->umum = $request->umum;
        $data->sertifikasi = $request->sertifikasi;
        $data->manajemen_mutu = $request->manajemen_mutu;
        $data->jumlah_karyawan = $request->jumlah_karyawan;
        $data->no_telp_pengarah = $request->no_telp_pengarah;
        $data->no_telp_pengarah_1 = $request->no_telp_pengarah_1;
        $data->no_telp_pengarah_2 = $request->no_telp_pengarah_2;
        $data->no_telp_pengarah_3 = $request->no_telp_pengarah_3;
        $data->no_telp_pengarah_4 = $request->no_telp_pengarah_4;
        $data->no_telp_pengarah_5 = $request->no_telp_pengarah_5;
        $data->no_ketua = $request->no_ketua;
        $data->no_umum = $request->no_umum;
        $data->no_sertifikasi = $request->no_sertifikasi;
        $data->no_manajemen = $request->no_manajemen;
        $data->upload_persyaratan = $request->hasFile('upload_persyaratan') ? $request->file('upload_persyaratan')->store('file/struktur-organisasi', 'public') : $data->upload_persyaratan;
        $data->users_id = Auth::user()->id;
        $data->save();
        DB::commit();
    }
}
