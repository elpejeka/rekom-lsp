<?php

namespace App\Http\Controllers\Integrasi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class AsesorController extends Controller
{
    public function index()
    {
        $lsp = DB::connection('siki')->select("SELECT id, nama FROM lsp_daftar");
        $title = 'Tambah Asesor API';
        return view('integrasi.asesor.index', compact('lsp', 'title'));
    }

    public function cekAsesor(Request $request)
    {
        $idLsp = $request->id_lsp;
        $noReg = $request->no_reg;

        $response = Http::withHeaders([
            'token' => '20|YLLqRFQ8YI8j4oUiaCTjyAEEevdEIREyoEFzRLtf',
            'Content-Type' => 'application/json',
        ])->withBody(json_encode([
            'no_reg_asesor_bnsp' => $noReg,
        ]), 'application/json')
        ->post('http://siki.pu.go.id/api-bank-data/api/get_detail_asesor_bnsp');

        $cek  = DB::connection('siki')->select("SELECT * FROM lsp_asesor la WHERE noreg_bnsp  ='$noReg' AND id_lsp ='$idLsp'");

        if(!empty($cek)){
            return response()->json('Asesor Sudah Terdaftar');
        }

        return response()->json('success');
    }

    private function asesorBNSP($noReg)
    {
        $response = Http::withHeaders([
            'token' => '20|YLLqRFQ8YI8j4oUiaCTjyAEEevdEIREyoEFzRLtf',
            'Content-Type' => 'application/json',
        ])->withBody(json_encode([
            'no_reg_asesor_bnsp' => $noReg,
        ]), 'application/json')
        ->post('http://siki.pu.go.id/api-bank-data/api/get_detail_asesor_bnsp');

        return $response;
    }
}
