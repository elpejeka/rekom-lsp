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
use App\LSPIntegration;
use App\Pencatatan;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
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
        $kelengkapan = Permohonan::whereNotNull('status_submit')
                                    ->whereNull('status_kelengkapan')
                                    ->whereNull('status_verifikasi')
                                    ->whereNull('status_permohonan')
                                    ->whereNull('status_tolak')
                                    ->get();

        $verifikasi = Permohonan::whereNotNull('status_submit')
                                    ->whereNotNull('status_kelengkapan')
                                    ->whereNull('status_verifikasi')
                                    ->whereNull('status_permohonan')
                                    ->whereNull('status_tolak')->get();

        $jumlah_selesai = Permohonan::whereNotNull('status_permohonan')->get();

        $tolak = Permohonan::whereNotNull('status_tolak')->get();
        $pencatatan = Pencatatan::whereNotNull('approve')->get();

         return view('dashboard.sekretariat', [
             'jumlah_masuk' => count($jumlah_masuk),
             'kelengkapan' => count($kelengkapan),
             'verifikasi' => count($verifikasi),
             'jumlah_selesai' => count($jumlah_selesai),
             'tolak' => count($tolak),
             'pencatatan' => count($pencatatan),
             'title' => "Dashboard"
         ]);
     }

     public function dashboard(Request $request){
        $users = User::with(['administrasi', 'organization', 'sertifikat_lsp', 'asesors', 'locations'])->where('id', Auth::user()->id)->get();
        $permohonan = Permohonan::with(['administrations'])->where('users_id', Auth::user()->id)->get();
        $pencatatan = Pencatatan::where('users_id', Auth::user()->id)->first();
        $aplikasi = LSPIntegration::where('user_id', Auth::user()->id)->first(); 

        return view('dashboard.user', [
            'users'  => $users,
            'permohonan' => $permohonan,
            'pencatatan' => $pencatatan,
            'aplikasi' => $aplikasi,
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
