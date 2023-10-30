<?php

namespace App\Http\Controllers\References;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Jabker;
use Illuminate\Support\Facades\DB;

class MasterController extends Controller
{
    public function jabker($id){
        $jabker = DB::table('jabker_02')->where('id', $id)->first();

        return response()->json([
            'message' => 'success',
            'data' => $jabker
        ]);
    }

    public function getSertifikat($nik){
        $sertifikat = DB::connection('siki')->select("SELECT  a.`nik`,a.nama,a.`id_jabatan_kerja` AS id_sub_bidang,
          a.`jabatan_kerja` AS des_sub_klas,
          a.`jenjang` AS kualifikasi,
          DATE_ADD(tanggal_ditetapkan, INTERVAL 5 year) as tanggal_cetak, 
          a.`asosiasi`,a.`propinsi` AS provinsi_registrasi,b.pas_foto
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
          DATE_ADD(tanggal_cetak, INTERVAL 3 year) as tanggal_cetak , 
          asosiasi,
          provinsi_registrasi,
          foto
        FROM
          (
            SELECT
              '1' AS aktif,
              a.`id_personal` AS NIK,
              a.`Nama`,
              b.`id_sub_bidang`,
              f.`Deskripsi` AS des_sub_klas,
              e.`Deskripsi_trampil` AS kualifikasi,
              b.`Tgl_proses` AS tanggal_cetak,
              c.`Nama` AS asosiasi,
              d.`Nama` AS Provinsi_registrasi,
              CONCAT('https://siki.pu.go.id/sertifikasi/get_file/get_tt_12/',a.persyaratan_12) AS foto
            FROM
              personal a,
              tk_registrasi_history_tt b,
              personal_profesi_ta_detail c,
              propinsi d,
              `kualifikasi_profesi` e,
              `sub_bidang_ketrampilan` f
            WHERE
              a.`id_personal` = b.`ID_Personal`
              AND b.`ID_Asosiasi_profesi` = c.`ID_Asosiasi_Profesi`
              AND b.`Propinsi` = d.`ID_Propinsi`
              AND b.`id_sub_bidang` = f.`ID_Sub_Bidang_Ketrampilan`
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
              e.`Deskripsi_trampil` AS kualifikasi,
              b.`Tgl_proses` AS tanggal_cetak,
              c.`Nama` AS asosiasi,
              d.`Nama` AS Provinsi_registrasi,
               CONCAT('https://siki.pu.go.id/sertifikasi/get_file/get_tt_12/',a.persyaratan_12) AS foto
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
                  tk_registrasi_history_tt_hapus
                WHERE
                  id_hapus IN(
                    SELECT
                      MAX(id_hapus) AS id
                    FROM
                      tk_registrasi_history_tt_hapus
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
              `sub_bidang_ketrampilan` f
            WHERE
              a.`id_personal` = b.`ID_Personal`
              AND b.`ID_Asosiasi_profesi` = c.`ID_Asosiasi_Profesi`
              AND b.`Propinsi` = d.`ID_Propinsi`
              AND b.`id_sub_bidang` = f.`ID_Sub_Bidang_Ketrampilan`
              AND b.`id_Kualifikasi_profesi` = e.`ID_Kualifikasi_Profesi`
            GROUP BY
              b.`ID_Personal`,
              b.`id_sub_bidang`
          ) q
        GROUP BY
          nik,
          id_sub_bidang          
        UNION
        SELECT
          nik,
          nama,
          id_sub_bidang,
          des_sub_klas,
          kualifikasi,
          tanggal_cetak,
          asosiasi,
          provinsi_registrasi,
          foto
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
              d.`Nama` AS Provinsi_registrasi,
               CONCAT('https://siki.pu.go.id/sertifikasi/get_file/get_tt_12/',a.persyaratan_12) AS foto
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
              d.`Nama` AS Provinsi_registrasi,
               CONCAT('https://siki.pu.go.id/sertifikasi/get_file/get_tt_12/',a.persyaratan_12) AS foto
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

    return response()->json([
        'message' => 'success',
        'data' => $sertifikat
    ]);
    }
}
