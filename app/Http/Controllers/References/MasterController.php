<?php

namespace App\Http\Controllers\References;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Jabker;
use Illuminate\Support\Facades\DB;

class MasterController extends Controller
{
    public function jabker($id){
        $jabker = DB::table('jabker_07')->where('id', $id)->first();

        return response()->json([
            'message' => 'success',
            'data' => $jabker
        ]);
    }
}
