<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Check;

class PerbaikanController extends Controller
{
    public function index(Request $request){
        
        $idPermohonan = $request->input('id');

        $komen = Check::find($idPermohonan);

        if($komen)
            return ResponseFormatter::success($komen, 'Transaction Data Success to get');
        else
            return ResponseFormatter::error(null, 'Transaction Data Empty', 404);
    }
}
