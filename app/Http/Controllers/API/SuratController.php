<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Letter;


class SuratController extends Controller
{
    public function terima($id){
        $surat = Letter::find($id);

        if($surat)
            return ResponseFormatter::success($surat,'Surat rekomendasi berhasil diambil');
        else
            return ResponseFormatter::error(null,'Surat rekomendasi tidak ada', 404);
    }

    public function tolak($id){
        $surat = Letter::find($id);

        if($surat)
            return ResponseFormatter::success($surat,'Surat penolakan berhasil diambil');
        else
            return ResponseFormatter::error(null,'Surat penolakan tidak ada', 404);
    }   

    public function pencatatan($idPencatatan){
        $surat = 'ugbeigbeueb';

        if($surat)
            return ResponseFormatter::success($surat,'Surat penolakan berhasil diambil');
        else
            return ResponseFormatter::error(null,'Surat penolakan tidak ada', 404);
            
    }
}
