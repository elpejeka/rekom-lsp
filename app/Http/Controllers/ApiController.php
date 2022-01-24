<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    public function index(Request $request){

        $nik = $request->nik;
    // $url = env('API_ASESOR');
        $response = Http::withToken('eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6IjQiLCJlbWFpbCI6ImFsaWVmYmFnYXMwNEBnbWFpbC5jb20ifQ.aFZdGhtikkat8UWvB5EEqC3melJR50XN9XJSDOymvDk')
                                    ->get('https://siki.pu.go.id/API-Server-LPJK/public/api/data_asesor_tenaga_kerja', [
                                        'nik' => $nik
                                    ]);

        return response($response);
    }

    public function create(){
        return view('pages.apiAsesor');
    }

    
}
