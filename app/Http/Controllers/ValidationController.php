<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Permohonan;
use App\Verification;
use App\Check;
use App\LspCertificate;
use Carbon\Carbon;
use PDF;

class ValidationController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }
    
    public function index(){
        $permohonan = Permohonan::with(['administrations'])->whereNotNull('status_kelengkapan')->get();
        $id = Permohonan::with(['administrations'])->firstOrFail(); 
        
        // dd($validasi);
        return view('pages.admin.list_validasi', [
            'data' => $permohonan,
        ]);
    }

    public function validation(Request $request, $id){
        $user = Permohonan::with('administrations', 'user')->where('id', $id)->firstOrFail();
        $user_file = User::with(['administrasi', 'organization', 'sertifikat_lsp', 'asesors', 'permohonan'])
                            ->where('id', $user->users_id)->firstOrFail();
        
        $validasi = Verification::where('permohonans_id', $user->id)->get();

        return view('pages.admin.validasi', [
            'data' => $user_file,
            'permohonan' => $user,
            'verifikasi' => $validasi
        ]);
    }
    
    
    public function showSkema($id){
        $skema = LspCertificate::find($id);
        return response()->json($skema);
    }

    public function keabsahan(Request $request){
        $skema = LspCertificate::find($request->id);
        $skema->nama_skema = $request->nama_skema;
        $skema->kesesuaian  = $request->kesesuaian;

        $skema->save();
        return response()->json($skema); 
    }

    public function penilaian(Request $request){
        $data = $request->all();

        Verification::create($data);
        return redirect('/validasi')->with('success', 'Data verifikasi dan validasi berhasil dicek');
    }

    public function print_pdf($id){
        $validasi = Verification::where('permohonans_id', $id)->firstOrFail();

        // dd($validasi);

        $pdf = PDF::loadview('pages.user.pdf.verifikasi', [
            'data' => $validasi
        ]);

        return $pdf->download('dokumen-verifikasi-validasi');

        // return view('pages.user.pdf.verifikasi', [
        //     'data' => $validasi
        // ]);
    }


    public function beritaAcara($id){
        $user = Permohonan::with('administrations', 'user')->where('id', $id)->firstOrFail();
        
        // dd($permohonan);x
        $user_file = User::with(['administrasi', 'organization', 'sertifikat_lsp', 'asesors', 'permohonan'])
                            ->where('id', $user->users_id)->firstOrFail();

        $tgl = Carbon::now()->isoFormat('D MMMM Y');

        $pdf = PDF::loadview('pages.user.pdf.vv_berita_acara', [
            'data' => $user_file,
            'permohonan' => $user,
            'tgl' => $tgl
        ]);

        return $pdf->download('vv_berita_acara');

        // return view('pages.user.pdf.surat_rekomendasi', [
        //     'data' => $user_file,
        //     'permohonan' => $user,
        //     'tgl' => $tgl
        // ]);
    }
 
}
