<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Administration;
use App\User;
use App\Permohonan;
use App\Check;

class VerificationController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    public function list(){
        $permohonan = Permohonan::with(['administrations'])
                                ->whereNotNull('status_submit')
                                ->whereNull('status_kelengkapan')
                                ->whereNull('status_verifikasi')
                                ->whereNull('status_permohonan')
                                ->whereNull('status_tolak')
                                ->get();
        
        return view('pages.admin.rekomendasi.list-kelengkapan', [
            'data' => $permohonan,
            'title' => 'List Permohonan'
        ]);
    }
    
    public function index(Request $request, $id){
        $user = Permohonan::with('administrations', 'user', 'skema')->where('id', $id)->firstOrFail();
        
        $user_file = User::with(['administrasi', 'organization', 'sertifikat_lsp', 'asesors', 'permohonan'])
                            ->where('id', $user->users_id)->firstOrFail();
        
        $cek_kelengkapan = Check::where('permohonans_id', $user->id)->get();

        return view('pages.admin.rekomendasi.detail-kelengkapan', [
            'data' => $user_file,
            'permohonan' => $user,
            'cek' => $cek_kelengkapan,
            'title' => "Cek Kelengkapan"
        ]);
    }

    public function tolak(){
        $permohonan = Permohonan::with(['administrations'])
                                ->whereNotNull('status_tolak')->get();

        return view('pages.admin.rekomendasi.tolak', [
            'data' => $permohonan,
            'title' => 'List Permohonan Tolak'
        ]);
    }

    public function selesai(){
        $permohonan = Permohonan::with(['administrations'])
                                ->whereNotNull('status_permohonan')->get();

        return view('pages.admin.rekomendasi.selesai', [
            'data' => $permohonan,
            'title' => 'List Permohonan Selesai'
        ]);
    }
    

}
