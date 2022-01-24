<?php

use Illuminate\Support\Facades\Http;

function getAsesor($nik){
    $url = env('API_ASESOR').'/'.$nik;
    $token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6IjQiLCJlbWFpbCI6ImFsaWVmYmFnYXMwNEBnbWFpbC5jb20ifQ.aFZdGhtikkat8UWvB5EEqC3melJR50XN9XJSDOymvDk';
    try{
        $response = Http::withToken($token)->get($url);
        $data = $response->json();
        $data['http_code'] = $response->getStatusCode();
        return $data;
    }catch(\Throwable $th){
        return [
            'status' => 'error',
            'http_code' => 500,
            'message'=> 'service asesor unavailable'
        ];
    }
}
