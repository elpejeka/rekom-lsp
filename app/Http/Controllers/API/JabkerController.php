<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Jabker;

class JabkerController extends Controller
{
    public function index(){
        $jabker = Jabker::whereNotNull('kode_jabker')->get();

        if($jabker)
            return ResponseFormatter::success($jabker, 'Data Skema Success to get');
        else
            return ResponseFormatter::error(null, 'Data Skema Empty', 404);
    }
}
