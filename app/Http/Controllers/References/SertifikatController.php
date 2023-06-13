<?php

namespace App\Http\Controllers\References;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SertifikatController extends Controller
{
    public function index($nik)
    {
        $ska = DB::connection('siki')->select("SELECT c.`id_personal` as nik ,c.`nama_personal` as nama ,d.deskripsi AS klasifikasi,c.`des_sub_bidang` AS subklasifikasi,
        c.`no_reg_full` AS nomor_registrasi,b.`tgl_cetak_pertama` AS tanggal_ditetapkan,b.`tgl_cetak_pertama`  + INTERVAL 3 YEAR - INTERVAL 1 DAY AS tanggal_masa_berlaku
         FROM personal_reg_ta_kbli a
        JOIN personal_sertifikat_ta b ON a.`id_personal`=b.`id_personal` AND a.`id_sub_bidang`=b.`id_sub_bidang`
        JOIN personal_brta c ON a.id_personal=c.`id_personal` AND a.`Tgl_Registrasi`=c.`tgl_permohonan`
        JOIN `bidang_klasifikasi_profesi` d ON c.id_bidang=d.id_bidang_profesi
        WHERE a.`id_personal`='$nik';");

        $skk = DB::connection('siki')->select("SELECT a.`nik`,a.`nama`,a.`klasifikasi`,a.`subklasifikasi`,a.`nomor_registrasi`,a.`tanggal_ditetapkan`,a.`tanggal_masa_berlaku`
        FROM lsp_pencatatan a WHERE a.`nik`='$nik' AND a.`valid`='1' AND a.`final_at` IS NOT NULL;");

        return response()->json([
            'message' => 'success',
            'data' => array_merge($ska, $skk)
        ]);
    }

    public function detail($noReq){
        $detail = DB::connection('siki')->select("SELECT a.`nik`,a.`nama`,a.`klasifikasi`,a.`subklasifikasi`,a.`nomor_registrasi`,a.`tanggal_ditetapkan`,a.`tanggal_masa_berlaku`
        FROM lsp_pencatatan a WHERE a.nomor_registrasi = '$noReq' AND a.`valid`='1' AND a.`final_at` IS NOT NULL
       UNION
       SELECT c.`id_personal` as nik ,c.`nama_personal` as nama ,d.deskripsi AS klasifikasi,c.`des_sub_bidang` AS subklasifikasi,
       c.`no_reg_full` AS nomor_registrasi,b.`tgl_cetak_pertama` AS tanggal_ditetapkan,b.`tgl_cetak_pertama`  + INTERVAL 3 YEAR - INTERVAL 1 DAY AS tanggal_masa_berlaku
        FROM personal_reg_ta_kbli a
       JOIN personal_sertifikat_ta b ON a.`id_personal`=b.`id_personal` AND a.`id_sub_bidang`=b.`id_sub_bidang`
       JOIN personal_brta c ON a.id_personal=c.`id_personal` AND a.`Tgl_Registrasi`=c.`tgl_permohonan`
       JOIN `bidang_klasifikasi_profesi` d ON c.id_bidang=d.id_bidang_profesi
       WHERE c.no_reg_full = '$noReq';");

       return response()->json([
            'message' => 'success',
            'data' => $detail
        ]);
    }
}
