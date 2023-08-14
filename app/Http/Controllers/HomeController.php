<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Administration;
use App\LspCertificate;
use App\Qualification;
use App\Tuk;
use App\OrganizationStructure;
use App\Asesor;
use App\User;
use App\Permohonan;
use App\TerimaPermohonan;
use Auth;
use App\Http\Middleware\IsAdmin;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
        $this->middleware(['auth','verified']);
        $this->middleware(['isAdmin'])->only(['index']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

     public function index(Request $request){
        $jumlah_masuk = Permohonan::whereNotNull('status_submit')->get();
        $jumlah_proses = Permohonan::whereNotNull('status_kelengkapan')->get();
        $jumlah_selesai = Permohonan::whereNotNull('status_verifikasi')->get();

         return view('dashboard.sekretariat', [
             'jumlah_masuk' => $jumlah_masuk,
             'jumlah_proses' => $jumlah_proses,
             'jumlah_selesai' => $jumlah_selesai,
             'title' => "Dashboard"
         ]);
     }

     public function dashboard(Request $request){
        $users = User::with(['administrasi', 'organization', 'sertifikat_lsp', 'asesors', 'locations'])->where('id', Auth::user()->id)->get();
        $permohonan = Permohonan::with(['administrations'])->where('users_id', Auth::user()->id)->get();
        $data = Administration::where('users_id', Auth::user()->id)->get();
        $kualifikasi = Qualification::where('users_id', Auth::user()->id)->get();
        $organisasi = OrganizationStructure::where('users_id', Auth::user()->id)->get();
        $tuk = Tuk::where('users_id', Auth::user()->id)->get();
        $asesor = Asesor::where('users_id', Auth::user()->id)->get();
        $lsp = LspCertificate::where('users_id', Auth::user()->id)->get();

        return view('dashboard.user', [
            'data' => $data,
            'kualifikasi' => $kualifikasi,
            'organisasi' => $organisasi,
            'tuk' => $tuk,
            'asesor' => $asesor,
            'lsp' => $lsp,
            'users'  => $users,
            'permohonan' => $permohonan,
            'title' => "Dashboard"
        ]);
     }

     public function show($id){
        $data = Administration::findOrFail($id);
        return view('show')->with([
            'item' => $data
        ]);
     }
}
