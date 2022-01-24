<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Association;

class AsosiasiController extends Controller
{
    public function index(){
        $asosiasi = Association::all();

        if($asosiasi)
            return ResponseFormatter::success($asosiasi, 'Data Asosiasi Success to get');
        else
            return ResponseFormatter::error(null, 'Data Asosiasi Empty', 404);
    }
}
