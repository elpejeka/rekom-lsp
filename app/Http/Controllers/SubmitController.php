<?php

namespace App\Http\Controllers;

use App\Permohonan;
use Illuminate\Http\Request;
use App\Notifications\CheckKelengkapan;
use App\Notifications\SubmitPermohonan;
use App\Notifications\VerifikasiValidasi;
use App\Notifications\DokumentasiAPI;
use Illuminate\Support\Facades\DB;
use App\Check;
use App\User;
use Carbon\Carbon;
use Auth;
use Notification;

class SubmitController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    public function progres(){
        $pengurus = Permohonan::with(['administrations', 'user'])->get();

        // dd($pengurus);

        return view('pages.admin.progres', [
            'data'  => $pengurus
        ]);
    }

    public function detail($id){
        $user = Permohonan::with('administrations', 'user')->where('id', $id)->firstOrFail();
        $user_file = User::with(['administrasi', 'organization', 'sertifikat_lsp', 'asesors', 'permohonan', 'asosiasi', 'asosiasi1', 'asosiasi2'])
                            ->where('id', $user->users_id)->firstOrFail();


        return view('pages.admin.detail', [
            'data' => $user_file,
        ]);
    }

    public function detailPermohonan($id){
        $user = Permohonan::with('administrations', 'user', 'skema', 'perpanjangan')->where('id', $id)->firstOrFail();
        $user_file = User::with(['administrasi', 'organization', 'sertifikat_lsp', 'asesors', 'permohonan'])
                            ->where('id', $user->users_id)->firstOrFail();

        $klasifikasi = DB::select("select k.nama , s.nama as subklas from qualifications q
        join klasifikasi k on q.klasifikasi = k.kode
        join subklasifikasi s on q.sub_klasifikasi = s.kode_sub
        where q.deleted_at is null and q.users_id =". $user->users_id);


        return view('pages.user.rekomendasi.submit', [
            'permohonan' => $user_file,
            'data' => $user,
            'klasifikasi' => $klasifikasi,
            'title' => "Detail Permohonan"
        ]);
    }

    public function setStatusSubmit(Request $request, $id)
    {
        // $request->validate([
        //     'status_submit' => 'required'
        // ]);

        $item = Permohonan::findOrFail($id);
        $item->status_submit = Carbon::now();
        $item->save();
        $user = User::where('id', $item->users_id)->first();
        Notification::send($user, new SubmitPermohonan());

        return redirect('/')->with('success', 'Permohonan berhasil di submit');
    }

    public function setStatusKelengkapan(Request $request, $id){
        $request->validate([
            'status_kelengkapan' => 'required'
        ]);

        $item = Permohonan::findOrFail($id);
        $item->status_kelengkapan = Carbon::now();

        $user = User::where('id', $item->users_id)->get();

        $item->save();

        Notification::send($user, new CheckKelengkapan());

        return redirect('/verifikasi')->with('success', 'Kelangkapan sudah di cek');
    }

    public function setStatusVerifikasi(Request $request, $id){

        $request->validate([
            'status_verifikasi' => 'required'
        ]);

        $item = Permohonan::findOrFail($id);
        $item->status_verifikasi = Carbon::now();

        $user = User::where('id', $item->users_id)->first();

        // dd($user);


        // Notification::send($user, new VerifikasiValidasi());

        $item->save();

        return redirect('/validasi')->with('success', 'Permohonan berhasil di verifikasi');
    }

    public function setStatusPermohonan(Request $request, $id){
        $request->validate([
            'status_permohonan' => 'required'
        ]);

        $item = Permohonan::findOrFail($id);
        $item->status_permohonan = Carbon::now();

        $item->save();
        $user = User::where('id', $item->users_id)->first();

        Notification::send($user, new DokumentasiAPI());

        return redirect('/validasi')->with('success', 'Permohonan berhasil di update');
    }

    public function setStatusTolak(Request $request, $id){
        $request->validate([
            'status_tolak' => 'required'
        ]);

        $item = Permohonan::findOrFail($id);
        $item->status_tolak = Carbon::now();

        $item->save();

        return redirect('/validasi')->with('success', 'Permohonan berhasil di tolak');
    }



    public function submitted(Request $request, $id)
    {
        $request->validate([
            'status_submit' => 'required'
        ]);

        $item = Permohonan::findOrFail($id);
        $item->status_submit = Carbon::now();

        $user = User::where('id', $item->users_id)->get();

        $item->save();

        Notification::send($user, new SubmitPermohonan());

        return redirect('/')->with('success', 'Permohonan berhasil di submit');
    }

}
