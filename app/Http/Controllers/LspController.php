<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Pencatatan;
use App\PencatatanAsesor;
use App\PencatatanSkema;
use App\User;
use Illuminate\Support\Facades\Auth;
use Notification;

class LspController extends Controller
{
    public function listLsp(){
        $data = Pencatatan::with('administrations')->whereNotNull('approve')->get();
   
        return view('daftar-lsp', [
            'permohonan' => $data,
        ]);
    }

    public function detailLsp($slug){
        $data = Pencatatan::with(['administrations', 'asesor', 'skema', 'tuk'])->where('slug', $slug)->firstOrFail();
        $user_file = User::with(['administrasi'])->where('id', $data->users_id)->firstOrFail();

        return view('detail-lsp', [
            'data' => $data,
            'item' => $user_file
        ]);
    }

    public function show($slug){
        $item = PencatatanAsesor::with('sertifikat')->where('slug', $slug)->firstOrFail();
      

        return view('pages.user.show.sertifikat_asesor', [
            'item' => $item
        ]);
    }
}
