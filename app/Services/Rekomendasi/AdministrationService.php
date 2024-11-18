<?php

namespace App\Services\Rekomendasi;

use App\Administration;
use App\Notifications\AdministrationUpdate;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Notification;


class AdministrationService{

    public function save(Request $request){
        DB::beginTransaction();
        $data = new Administration();
        $data->nama = $request->nama;
        $data->no_akta = $request->no_akta;
        $data->jenis_lsp = $request->jenis_lsp;
        $data->unsur_pembentuk = $request->unsur_pembentuk;
        $data->kategori_lsp = $request->kategori_lsp;
        $data->ketersediaan_sistem = $request->ketersediaan_sistem;
        $data->alamat = $request->alamat;
        $data->status_kepemilikan = $request->status_kepemilikan;
        $data->no_telp = $request->no_telp;
        $data->website = $request->website;
        $data->email = $request->email;
        $data->jumlah_skema = $request->jumlah_skema;
        $data->upload_persyaratan = $request->hasFile('upload_persyaratan') ? $request->file('upload_persyaratan')->store('file/sk_persyaratan', 'public') : 'file/pencatatan/1/nofile.pdf';
        $data->akta_pendirian = $request->hasFile('akta_pendirian') ? $request->file('akta_pendirian')->store('file/akta_pendirian', 'public') : 'file/pencatatan/1/nofile.pdf';
        $data->bukti_kepemilikan = $request->hasFile('bukti_kepemilikan') ? $request->file('bukti_kepemilikan')->store('file/bukti_kepemilikan', 'public') : 'file/pencatatan/1/nofile.pdf';
        $data->komitmen_asesor = $request->hasFile('komitmen_asesor') ? $request->file('komitmen_asesor')->store('file/komitmenasesor', 'public') : 'file/pencatatan/1/nofile.pdf';
        $data->surat_akreditasi = $request->hasFile('surat_akreditasi') ? $request->file('surat_akreditasi')->store('file/surat_akreditasi', 'public') : 'file/pencatatan/1/nofile.pdf';
        $data->users_id = Auth::user()->id;
        $data->save();
        DB::commit();
    }

    public function updated(Request $request, $id){
        DB::beginTransaction();
        $data = Administration::find($id);
        $data->nama = $request->nama;
        $data->no_akta = $request->no_akta;
        $data->jenis_lsp = $request->jenis_lsp;
        $data->unsur_pembentuk = $request->unsur_pembentuk;
        $data->kategori_lsp = $request->kategori_lsp;
        $data->ketersediaan_sistem = $request->ketersediaan_sistem;
        $data->alamat = $request->alamat;
        $data->status_kepemilikan = $request->status_kepemilikan;
        $data->no_telp = $request->no_telp;
        $data->website = $request->website;
        $data->email = $request->email;
        $data->jumlah_skema = $request->jumlah_skema;
        $data->upload_persyaratan = $request->hasFile('upload_persyaratan') ? $request->file('upload_persyaratan')->store('file/sk_persyaratan', 'public') : $data->upload_persyaratan;
        $data->akta_pendirian = $request->hasFile('akta_pendirian') ? $request->file('akta_pendirian')->store('file/akta_pendirian', 'public') : $data->akta_pendirian;
        $data->bukti_kepemilikan = $request->hasFile('bukti_kepemilikan') ? $request->file('bukti_kepemilikan')->store('file/bukti_kepemilikan', 'public') : $data->bukti_kepemilikan;
        $data->komitmen_asesor = $request->hasFile('komitmen_asesor') ? $request->file('komitmen_asesor')->store('file/komitmenasesor', 'public') : $data->komitmen_asesor;
        $data->surat_akreditasi = $request->hasFile('surat_akreditasi') ? $request->file('surat_akreditasi')->store('file/surat_akreditasi', 'public') : $data->surat_akreditasi;
        $data->users_id = Auth::user()->id;
        $data->save();
        DB::commit();
        $user = User::where('roles', 'admin')->get();
        Notification::send($user, new AdministrationUpdate($data));
    }
}
