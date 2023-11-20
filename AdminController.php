<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Pencabutan;
use App\Model\Klarifikasi;
use App\Model\Perbaikan;
use App\Model\LogPencabutan;
use App\Model\TkkBU;
use Notification;
use App\Notifications\PerbaikanNotification;
use App\Notifications\KlarifikasiNotification;
use App\Notifications\ProsesSelesai;
use App\Notifications\CqKlarifikasi;
use App\Notifications\Penolakan;
use App\Notifications\NotificationSuspend;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index(Request $request){
        if(!empty($request->session()->get('username')) && ($request->session()->get('role') == 'admin')){
            // $klarifikasi = Klarifikasi::orderBy('id', 'DESC')->get();
            $klarifikasi = DB::select("select k.keterangan ,k.username , k.tgl_approve , p.nama  from klarifikasi k
            join pencabutan p on p.id = k.pencabutan_id
            where k.read_at is null
            order by k.tgl_approve DESC");
            $pencabutan = Pencabutan::whereNull('tgl_proses')
                        ->whereNull('tgl_tolak')
                        ->whereNull('suspend')
                        ->whereNull('status_perubahan')
                        ->where(function($query){
                            $query->where('penerbit_bu', 'LPJK')
                                ->orWhereNull('penerbit_bu');
                        })->get();

            return view('pages.admin.new.list-pencabutan', [
                'data' => $pencabutan,
                'klarifikasi' => $klarifikasi,
                'title' => "List Permohonan Perubahan"
            ]);
        }else{
            return redirect('/login');
        }
    }

    public function list(Request $request){
        if(!empty($request->session()->get('username')) && $request->session()->get('role')){
            $type = $request->session()->get('type');
            $pencabutan = Pencabutan::whereNotNull('tgl_proses')->get();
            $klarifikasi = Klarifikasi::orderBy('id', 'DESC')->get();

            return view('pages.admin.new.selesai', [
                'data' => $pencabutan,
                'klarifikasi' => $klarifikasi,
                'title' => "List Pencabutan Selesai"
            ]);
        }else{
            return redirect('/login');
        }
    }

    public function showDetail($id){
      $pencabutan = Pencabutan::with(['perbaikan', 'klarifikasi'])->find($id);
      return response()->json($pencabutan);
    }

    public function perbaikan(Request $request){
        $id = $request->id;
        $pencabutan = Pencabutan::find($id);
        $pencabutan->tgl_perbaikan = Carbon::now();
        $pencabutan->update();
        $emailUser  = $pencabutan->email;

        $item = new Perbaikan();
        $item->uuid = $request->uuid;
        $item->pencabutan_id = $request->id;
        $item->email = $request->emailPemohon;
        $item->keterangan = $request->keterangan;
        $item->save();

        $log = new LogPencabutan();
        $log->pencabutan_id = $request->id;
        $log->keterangan = 'Perbaikan';
        $log->username = $request->session()->get('username');
        $log->save();

        Notification::route('mail', $emailUser)->notify(new PerbaikanNotification($item));

        return response()->json($pencabutan);
    }

    public function kirimKlarifikasi(Request $request, $uuid){
        $pencabutan = Pencabutan::where('uuid', $uuid)->first();
        $pencabutan->tgl_klarifikasi = Carbon::now();
        $pencabutan->update();
        $emailBu = $pencabutan->email_bu;
        $emailUser = $pencabutan->email;

        $log = new LogPencabutan();
        $log->pencabutan_id = $pencabutan->id;
        $log->keterangan = 'Kirim Klarifikasi';
        $log->username = $request->session()->get('username');
        $log->save();

        Notification::route('mail', $emailBu)->notify(new KlarifikasiNotification($pencabutan));
        Notification::route('mail', $emailUser)->notify(new CqKlarifikasi($pencabutan));

        return redirect('/dashboard')->with('success', 'Klarifikasi Send Successfully!');
    }

    public function klarifikasi($uuid){
      $pencabutan = Pencabutan::where('uuid', $uuid)->first();
      return view('pages.pencabutan.klarifikasi', [
          'data'=> $pencabutan
      ]);
      // $role = $request->session()->get('role');
      // if($role == 'admin' || $role == 'lsbu'){
      // }else{
      //     return redirect('/login');
      // }
    }

    public function klarifikasiProses(Request $request, $uuid){
        $item = Pencabutan::where('uuid', $uuid)->first();
        $data = $request->all();

        $item->update($data);

        $log = new LogPencabutan();
        $log->pencabutan_id = $item->id;
        $log->keterangan = 'Proses Klarifikasi';
        $log->username = $item->bu_used;
        $log->save();

        $klarifikasi = new Klarifikasi();
        $klarifikasi->pencabutan_id = $item->id;
        $klarifikasi->username = $item->bu_used;
        $klarifikasi->keterangan = $request->keterangan;
        $klarifikasi->uuid = $request->uuid;
        $klarifikasi->tgl_approve = Carbon::now();
        $klarifikasi->save();

        return redirect('/')->with('success', 'Klarifikasi Send Successfully!');
    }

    public function selesai(Request $request, $uuid){
      $role = $request->session()->get('role');
      if($role == 'admin' || $role == 'lsbu'){
        $pencabutan = Pencabutan::where('uuid', $uuid)->first();
        $pencabutan->tgl_proses = Carbon::now();
        $pencabutan->update();
        $emailBu = $pencabutan->email;

        $data = $this->getBU($pencabutan->ktp_termohon);

        // in case dibawah masih lolos use this
        if(in_array($pencabutan->bu_used, $data->nama_bu)){
          if($role == 'admin'){
            return redirect(route('list-pencabutan'))->with('success', 'Hapus Tenaga Kerja Terlebih dahulu dan proses selesai');
          }else{
            return redirect(route('lsbu.list'))->with('success', 'Hapus Tenaga Kerja Terlebih dahulu dan proses selesai');
          }
        }

        // foreach($data as $item){
        //     if($item->nama_bu == $pencabutan->bu_used){
        //       if($role == 'admin'){
        //         return redirect(route('list-pencabutan'))->with('success', 'Hapus Tenaga Kerja Terlebih dahulu dan proses selesai');
        //       }else{
        //         return redirect(route('lsbu.list'))->with('success', 'Hapus Tenaga Kerja Terlebih dahulu dan proses selesai');
        //       }
        //     }
        // }

        $tkkSimpan = TkkBU::where('nik', $pencabutan->ktp_termohon)->first();
        
        if(!empty($tkkSimpan)){
            $tkkSimpan->update([
                'nik' => $pencabutan->ktp_termohon,
                'npwp' => $pencabutan->npwp_kerja,
                'nama_bu' => $pencabutan->bu_kerja,
                'nib' => $pencabutan->nib_kerja,
                'referensi' => 'Aplikasi Perubahan TKK'
            ]);
        }else{
            TkkBU::query()->create([
                'nik' => $pencabutan->ktp_termohon,
                'npwp' => $pencabutan->npwp_kerja,
                'nama_bu' => $pencabutan->bu_kerja,
                'nib' => $pencabutan->nib_kerja,
                'referensi' => 'Aplikasi Perubahan TKK'
            ]);
        }

        $log = new LogPencabutan();
        $log->pencabutan_id = $pencabutan->id;
        $log->keterangan = 'Selesai';
        $log->username = $request->session()->get('username');
        $log->save();

        Notification::route('mail', $emailBu)->notify(new ProsesSelesai($pencabutan));

        return redirect('/dashboard')->with('success', 'Pencabutan Successfully!');
      }else{
        return redirect('/login');
      }
    }

    public function suspend(Request $request, $uuid){
        $pencabutan = Pencabutan::where('uuid', $uuid)->first();
        $emailUser = $pencabutan->email;
        $pencabutan->suspend = Carbon::now();
        $pencabutan->update();

        $tkkSimpan = TkkBU::where('nik', $pencabutan->ktp_termohon)->first();

        if(!empty($tkkSimpan)){
            $tkkSimpan->update([
                'nik' => $pencabutan->ktp_termohon,
                'npwp' => $pencabutan->npwp_kerja,
                'nama_bu' => $pencabutan->bu_kerja,
                'nib' => $pencabutan->nib_kerja,
                'referensi' => 'Aplikasi Perubahan TKK'
            ]);
        }
        
        if(empty($tkkSimpan)){
            TkkBU::query()->create([
                'nik' => $pencabutan->ktp_termohon,
                'npwp' => $pencabutan->npwp_kerja,
                'nama_bu' => $pencabutan->bu_kerja,
                'nib' => $pencabutan->nib_kerja,
                'referensi' => 'Aplikasi Perubahan TKK'
            ]);
        }

        $log = new LogPencabutan();
        $log->pencabutan_id = $pencabutan->id;
        $log->keterangan = 'Selesai';
        $log->username = $request->session()->get('username');
        $log->save();

        Notification::route('mail', $emailUser)->notify(new NotificationSuspend($pencabutan));

        return redirect('/dashboard')->with('success', 'Pencabutan ditangguhkan!');
    }

    public function tolak(Request $request){
      $role = $request->session()->get('role');
      if($role == 'admin' || $role == 'lsbu'){
        $pencabutan = Pencabutan::where('uuid', $request->uuid)->first();
        $emailUser = $pencabutan->email;
        $pencabutan->tgl_tolak = Carbon::now();
        $pencabutan->keterangan = $request->keterangan;
        $pencabutan->update();

        $log = new LogPencabutan();
        $log->pencabutan_id = $pencabutan->id;
        $log->keterangan = 'Tolak';
        $log->username = $request->session()->get('username');
        $log->save();

        Notification::route('mail', $emailUser)->notify(new Penolakan($pencabutan));
        return response()->json($pencabutan);
      }else{
        return redirect('/login');
      }
    }

    public function perubahan(Request $request, $uuid){
        $pencabutan = Pencabutan::where('uuid', $uuid)->first();
        $pencabutan->status_perubahan = '1';
        $pencabutan->tgl_perubahan = Carbon::now();
        $pencabutan->update();

        $log = new LogPencabutan();
        $log->pencabutan_id = $pencabutan->id;
        $log->keterangan = 'Perubahan';
        $log->username = $request->session()->get('username');
        $log->save();

        return redirect('/dashboard')->with('success', 'Pencabutan masuk menu perubahan!');
    }

    public function listPerubahan(Request $request){
        if(!empty($request->session()->get('username')) && $request->session()->get('role')){
            $klarifikasi = DB::select('select k.keterangan ,k.username , k.tgl_approve , p.nama  from klarifikasi k
            join pencabutan p on p.id = k.pencabutan_id
            order by k.tgl_approve DESC');
            $pencabutan = Pencabutan::wherenotNull('status_perubahan')->get();
            // $pencabutan = DB::table('pencabutan')->whereNull('tgl_proses')->paginate(5);

            return view('pages.admin.list-perubahan', [
                'data' => $pencabutan,
                'klarifikasi' => $klarifikasi
            ]);
        }else{
            return redirect('/login');
        }

    }

    public function bu($bu){
        $bu = DB::connection('mysql2')->table('bu')
                ->select('Email','Alamat')
                ->where('Nama', $bu)
                ->first();

        if(empty($bu)){
          $bu = DB::connection('mysql2')->table('lsbu_bu')
                ->select('email_badan_usaha as Email', 'alamat_badan_usaha as Alamat')
                ->where('nama_badan_usaha', $bu)
                ->first();
        }

        return response()->json($bu);
    }


    public function permohonan(){
        return view('pages.admin.new.list-permohonan', [
            'data' => Pencabutan::all(),
            'title' => "List Permohonan Pencabutan LSBU"
        ]);
    }


    public function sertifikat($nik)
    {
        $sertifikat = DB::connection('mysql2')->select("SELECT  a.`nik`,a.nama,a.`id_jabatan_kerja` AS id_sub_bidang,a.`jabatan_kerja` AS des_sub_klas,a.`jenjang` AS kualifikasi,a.`tanggal_ditetapkan` AS tanggal_cetak,a.`asosiasi`,a.`propinsi` AS provinsi_registrasi,b.pas_foto
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


    public function getBU($nik){
      $data= DB::connection("mysql2")->SELECT("SELECT a.no_ktp, a.nama, a.Noreg, a.id_bu AS nib, b.Nama AS nama_bu, IF(a.PJT = 1, 'PJT', '') AS PJT, IF(a.PJK = 1, 'PJK', '') 
        AS PJK, IF(a.PJSK = 1, 'PJSK', '') AS PJSK, 'LPJK' AS Penerbit_SBU, '1' AS kbli,b.alamat, b.npwp, b.email, b.telepon AS no_hp, c.nama AS bentuk_usaha,
        a.id_sub_bidang_klasifikasi AS subklasifikasi, d.deskripsi AS deskripsi_subklasifkasi FROM bu_tenaga_kerja_kbli a LEFT JOIN bu b ON a.ID_Bu = b.ID_BU 
        LEFT JOIN bu_bentuk_usaha c ON c.ID_Bentuk_usaha = b.id_bentuk_usaha LEFT JOIN sub_bidang_keahlian_kbli d ON d.id_sub_bidang_keahlian = a.id_sub_bidang_klasifikasi 
        WHERE a.id_personal = '$nik' GROUP BY no_ktp, nib 
        UNION SELECT a1.nik AS no_ktp, a1.nama, a1.noreg_skk AS Noreg, a1.nib, b1.nama_badan_usaha AS nama_bu, 'PJT' AS PJT, '' AS PJK, '' AS PJSK, 
        a1.username AS Penerbit_SBU, '0' AS kbli,b1.alamat_badan_usaha AS alamat, b1.npwp_badan_usaha, b1.email_badan_usaha AS email, b1.hp_badan_usaha AS no_hp, c1.deskripsi AS bentuk_usaha, 
        a1.sub_klasifikasi AS subklasifikasi, '' AS deskripsi_subklasifkasi 
        FROM lsbu_pjtbu a1 
        LEFT JOIN lsbu_bu b1 ON a1.nib = b1.nib LEFT JOIN lsbu_bentuk_usaha c1 ON c1.id_bentuk_usaha = b1.bentuk_badan_usaha 
        WHERE a1.nik = '$nik' AND deleted_at IS NULL GROUP BY no_ktp, nib 
        UNION 
        SELECT a2.nik AS no_ktp, a2.nama, a2.noreg_skk AS Noreg, a2.nib, b2.nama_badan_usaha AS nama_bu, '' AS PJT, '' AS PJK, 'PJSK' AS PJSK, a2.username AS Penerbit_SBU,'0' AS kbli,
        b2.alamat_badan_usaha AS alamat, 
        b2.npwp_badan_usaha, b2.email_badan_usaha AS email, b2.hp_badan_usaha AS no_hp, c2.deskripsi AS bentuk_usaha, a2.sub_klasifikasi AS subklasifikasi, '' AS deskripsi_subklasifkasi 
        FROM lsbu_pjskbu a2 LEFT JOIN lsbu_bu b2 ON a2.nib = b2.nib 
        LEFT JOIN lsbu_bentuk_usaha c2 ON c2.id_bentuk_usaha = b2.bentuk_badan_usaha 
        WHERE a2.nik  = '$nik' AND deleted_at IS NULL GROUP BY no_ktp, nib");

      return $data;
    }
}

