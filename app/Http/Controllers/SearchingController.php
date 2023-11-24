<?php

namespace App\Http\Controllers;

use App\PencatatanAsesor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchingController extends Controller
{
    public function searchAsesor(){
        $title = 'Searching Asesor';
        return view('pages.admin.searching.asesor', compact('title'));
    }

    public function getAsesor(Request $request){
        $input = $request->input;
        $type = $request->type;

        if($type == 'nik'){
            $data = PencatatanAsesor::with(['user'])->where('nik', $input)->get();
        }elseif($type == 'nama'){
            $data = DB::SELECT("SELECT a.nama_asesor, a.alamat, a.tgl_lahir, a.status_asesor , b.nama_lsp
                            FROM pencatatan_asesor a
                            LEFT JOIN users b on a.users_id = b.id
                            where a.nama_asesor like '%$input%'
                            and a.deleted_at is null");
        }else{
            $data = DB::SELECT("SELECT b.nama_asesor, b.alamat, b.tgl_lahir, b.status_asesor , a.nama_lsp
                                FROM pencatatan_asesor b
                                JOIN sertifikat_asesor c ON c.asesor_id = b.id
                                LEFT JOIN users a on b.users_id = a.id
                                where c.no_reg_asesor = '$input' 
                                and b.deleted_at is null");
        }

        if(count($data) > 0){
            return response()->json($data);
        } else {
            return response()->json('NODATA');
        }
    }
}
