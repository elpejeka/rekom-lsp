<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Administration;
use App\Permohonan;
use App\Check;
use App\User;
use Auth;

class StatusController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    public function index(Request $request, $id){
        $permohonan = Permohonan::findOrFail($id);
        $cek = Check::where('permohonans_id', $permohonan->id)->get();
        $user_file = User::with(['administrasi', 'organization', 'sertifikat_lsp', 'asesors', 'permohonan'])
                            ->where('id', Auth::user()->id)->firstOrFail();
        // dd($user_file);
        // dd($permohonan);
        // dd($permohonan);
        // $permohonan = Permohonan::all();
        // $user = User::with(['asosiasi'])->get();
        // dd($user);
        // dd($permohonan);
        return view('pages.user.status', [
            'item' => $permohonan,
            'data' => $cek,
            'user' => $user_file
        ]);
    }
}
