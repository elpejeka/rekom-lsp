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
        $permohonan = Permohonan::with(['administrations'])->whereNotNull('status_submit')->get();
        // dd($permohonan);
        $id = Permohonan::with(['administrations'])->firstOrFail();
        
        return view('pages.admin.index', [
            'data' => $permohonan,
        ]);
    }
    
    public function index(Request $request, $id){
        // $user = Administration::with(['akta_pendirian', 'organization'])->where('slug', $slug)->firstOrFail();
        $user = Permohonan::with('administrations', 'user', 'skema')->where('id', $id)->firstOrFail();
        
        // dd($permohonan);
        $user_file = User::with(['administrasi', 'organization', 'sertifikat_lsp', 'asesors', 'permohonan'])
                            ->where('id', $user->users_id)->firstOrFail();
        
        $cek_kelengkapan = Check::where('permohonans_id', $user->id)->get();

        // dd($user_file);
        return view('pages.admin.verifikasi', [
            'data' => $user_file,
            'permohonan' => $user,
            'cek' => $cek_kelengkapan
        ]);
    }

    

}
