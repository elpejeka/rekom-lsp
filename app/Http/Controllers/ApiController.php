<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    public function index($nik){
        $response = Http::withToken('eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6IjQiLCJlbWFpbCI6ImFsaWVmYmFnYXMwNEBnbWFpbC5jb20ifQ.aFZdGhtikkat8UWvB5EEqC3melJR50XN9XJSDOymvDk')
                                    ->get('https://siki.pu.go.id/API-Server-LPJK/public/api/data_tenaga_kerja_lsp', [
                                        'nik' => $nik
                                    ]);
        
        // $response = Http::withBody( 
        //         '{
        //         "no_reg_asesor_bnsp": "MET.000.004993 2020s"
        //     }', 'json' 
        //             ) ->withHeaders([ 
        //             'token'=> '20|YLLqRFQ8YI8j4oUiaCTjyAEEevdEIREyoEFzRLtf', 
        //             'Content-Type'=> 'application/json', 
        //         ]) 
        //         ->post('https://siki.pu.go.id/api-bank-data/api/get_detail_asesor_bnsp'); 

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
