<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permohonan;
use Carbon\Carbon;
use PDF;

class PenetapanController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }
    
    public function index(){
        $permohonan = Permohonan::with(['administrations'])->where('status_verifikasi', 'submit')->get();
        $id = Permohonan::with(['administrations'])->firstOrFail(); 
        $validasi = Verification::where('permohonans_id', $id->id)->get();
        // dd($validasi);
        return view('pages.admin.list_validasi', [
            'data' => $permohonan,
            'cek' => $validasi
        ]);
    }
}
