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
        FROM lsp_pencatatan a WHERE a.`nik`='$nik' AND a.`valid`='1' AND a.`final_at` IS NOT NULL");

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

    public function getSertifikat($nik){
        $data = DB::connection('siki')->SELECT("SELECT  a.`nik`,a.nama,a.`id_jabatan_kerja` AS id_sub_bidang,a.`jabatan_kerja` AS des_sub_klas,a.`jenjang` AS kualifikasi,a.`tanggal_ditetapkan` AS tanggal_cetak,a.`asosiasi`,a.`propinsi` AS provinsi_registrasi
        FROM lsp_pencatatan a
        LEFT JOIN lsp_personal b ON a.`id_izin`=b.id_izin
        WHERE a.`nik`='$nik' AND a.final_at IS NOT NULL AND valid='1' HAVING MAX(a.`id`)
        UNION
        SELECT
          nik,
          nama,
          id_sub_bidang,
          des_sub_klas,
          kualifikasi,
          tanggal_cetak,
          asosiasi,
          provinsi_registrasi
        FROM
          (
            SELECT
              '1' AS aktif,
              a.`id_personal` AS NIK,
              a.`Nama`,
              b.`id_sub_bidang`,
              f.`Deskripsi` AS des_sub_klas,
              e.`Deskripsi_ahli` AS kualifikasi,
              b.`Tgl_proses` AS tanggal_cetak,
              c.`Nama` AS asosiasi,
              d.`Nama` AS Provinsi_registrasi
            FROM
              personal a,
              tk_registrasi_history b,
              personal_profesi_ta_detail c,
              propinsi d,
              `kualifikasi_profesi` e,
              `sub_bidang_keahlian_kbli` f
            WHERE
              a.`id_personal` = b.`ID_Personal`
              AND b.`ID_Asosiasi_profesi` = c.`ID_Asosiasi_Profesi`
              AND b.`Propinsi` = d.`ID_Propinsi`
              AND b.`id_sub_bidang` = f.`ID_Sub_Bidang_Keahlian`
              AND b.`id_status` = '4'
              AND b.`id_Kualifikasi_profesi` = e.`ID_Kualifikasi_Profesi`
              AND a.`id_personal` IN ('$nik')
            GROUP BY
              b.`ID_Personal`,
              b.`id_sub_bidang`
            UNION
            SELECT
              '0' AS aktif,
              a.`id_personal` AS NIK,
              a.`Nama`,
              b.`id_sub_bidang`,
              f.`Deskripsi` AS des_sub_klas,
              e.`Deskripsi_ahli` AS kualifikasi,
              b.`Tgl_proses` AS tanggal_cetak,
              c.`Nama` AS asosiasi,
              d.`Nama` AS Provinsi_registrasi
            FROM
              personal a,
              (
                SELECT
                  id_hapus,
                  id_personal,
                  id_sub_bidang,
                  id_asosiasi_profesi,
                  id_kualifikasi_profesi,
                  tgl_proses,
                  propinsi,
                  id_unit_sertifikasi
                FROM
                  tk_registrasi_history_hapus
                WHERE
                  id_hapus IN(
                    SELECT
                      MAX(id_hapus) AS id
                    FROM
                      tk_registrasi_history_hapus
                    WHERE
                      id_status = '4'
                      AND id_personal = '$nik'
                    GROUP BY
                      id_sub_bidang
                  )
              ) b,
              personal_profesi_ta_detail c,
              propinsi d,
              `kualifikasi_profesi` e,
              `sub_bidang_keahlian_kbli` f
            WHERE
              a.`id_personal` = b.`ID_Personal`
              AND b.`ID_Asosiasi_profesi` = c.`ID_Asosiasi_Profesi`
              AND b.`Propinsi` = d.`ID_Propinsi`
              AND b.`id_sub_bidang` = f.`ID_Sub_Bidang_Keahlian`
              AND b.`id_Kualifikasi_profesi` = e.`ID_Kualifikasi_Profesi`
            GROUP BY
              b.`ID_Personal`,
              b.`id_sub_bidang`
          ) q
        GROUP BY
          nik,
          id_sub_bidang
          ;
        ");

        return response()->json($data);
    }
}
