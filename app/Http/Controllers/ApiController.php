<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    public function index($nik){

        // $nik = $nik;
    // $url = env('API_ASESOR');
        // $response = Http::withToken('eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6IjQiLCJlbWFpbCI6ImFsaWVmYmFnYXMwNEBnbWFpbC5jb20ifQ.aFZdGhtikkat8UWvB5EEqC3melJR50XN9XJSDOymvDk')
        //                             ->get('https://siki.pu.go.id/API-Server-LPJK/public/api/data_asesor_tenaga_kerja', [
        //                                 'nik' => $nik
        //                             ]);

        $response = Http::withToken('eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6IjQiLCJlbWFpbCI6ImFsaWVmYmFnYXMwNEBnbWFpbC5jb20ifQ.aFZdGhtikkat8UWvB5EEqC3melJR50XN9XJSDOymvDk')
                                    ->get('https://siki.pu.go.id/API-Server-LPJK/public/api/data_tenaga_kerja_lsp', [
                                        'nik' => $nik
                                    ]);

        // return response($response['data']);
        // print_r(json_encode($response));
        return view('pages.admin.pencatatan.check-asesor',[
            'asesor' => json_decode($response)
        ]);
    }

    public function create(){
        return view('pages.apiAsesor');
    }

    
}
