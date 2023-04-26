<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Pencatatan;
use App\PencatatanAsesor;
use App\PencatatanSkema;
use App\PencatatanTuk;
use App\User;
use Illuminate\Support\Facades\Auth;
use Notification;

use Carbon\Carbon;  
use QrCode;
use PDF;

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

        $skema = PencatatanSkema::where('pencatatan_id', $data->id)->whereNotNull('approve')->get();

        $tuk = PencatatanTuk::where('pencatatan_id', $data->id)
                            ->whereNotNull('approve')->get();

        // dd($tuk);

        return view('detail-lsp', [
            'data' => $data,
            'item' => $user_file,
            'tuk' => $tuk,
            'skema' => $skema
        ]);
    }

    public function show($id){
        $item = PencatatanAsesor::with('sertifikat')->find($id);
      

        return view('pages.user.show.sertifikat_asesor', [
            'item' => $item
        ]);
    }

    public function showPencatatanAsesor($id){
        $data = DB::table('pencatatan_asesor')
                    ->join('sertifikat_asesor', function($join){
                        $join->on('pencatatan_asesor.id', '=', 'sertifikat_asesor.asesor_id');
                        })
                    ->join('klasifikasi', function($klas){
                        $klas->on('sertifikat_asesor.klasifikasi', '=', 'klasifikasi.kode');
                    })
                    ->join('subklasifikasi', function($sub){
                        $sub->on('sertifikat_asesor.subklasifikasi', '=', 'subklasifikasi.kode_sub');
                    })
                    ->join('users' , function($join){
                        $join->on('pencatatan_asesor.users_id', '=', 'users.id');
                    })  
                    ->where('pencatatan_asesor.id', $id)
                    ->select('pencatatan_asesor.*', 'sertifikat_asesor.*', 'klasifikasi.nama as klasifikasi', 'subklasifikasi.nama as subklasifikasi', 'users.nama_lsp')
                    ->first();

        $pdf = PDF::loadView('pdf.detail-asesor', [
                    'data'=> $data
                ]);
                            
        return $pdf->stream('detail-asesor.pdf');
        
    }
}

