<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Permohonan;
use App\Check;


class indexController extends Controller
{
    public function index(){
        $permohonan = Permohonan::with(['administrations'])->whereNotNull('status_submit')->get();

        if($permohonan)
            return ResponseFormatter::success($permohonan, 'Transaction Data Success to get');
        else
            return ResponseFormatter::error(null, 'Transaction Data Empty', 404);
    }

    public function detail($id){
        
        $user = Permohonan::with('administrations', 'user')->where('id', $id)->firstOrFail();
        
        $user_file = User::with(['administrasi', 'organization', 'sertifikat_lsp', 'asesors', 'permohonan'])
                            ->where('id', $user->users_id)->firstOrFail();
        
        if($user_file)
            return ResponseFormatter::success($user_file, 'Transaction Data Success to get');
        else
            return ResponseFormatter::error(null, 'Transaction Data Empty', 404);
    }
}
