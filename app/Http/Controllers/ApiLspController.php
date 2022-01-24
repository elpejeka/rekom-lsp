<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permohonan;
use App\User;

class ApiLspController extends Controller
{
    public function index(){
        $permohonan = Permohonan::with(['administrations'])->whereNotNull('status_submit')->get();
        
        return response()->json([
            'status' => 'success',
            'data' => $permohonan
        ], 200);
    }
}
