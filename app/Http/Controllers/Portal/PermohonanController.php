<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

use App\IdIzin;
use App\Asesor;
use App\Administration;
use App\User;
use App\LspCertificate;
use App\OrganizationStructure;
use App\Permohonan;
use App\Tuk;
use App\DetailAsesor;
use App\Qualification;
use App\SkemaAsesor;
use App\TerimaPermohonan;
use App\LogStatus;
use App\Check;
use App\Verification;
use App\Letter;
use App\Document;

use Notification;
use App\Notifications\VerifikasiTidakLengkap;



class PermohonanController extends Controller
{
    public function index(){
        $data = IdIzin::whereNull('read_at')->get();
        return view('pages.admin.portal.index', [
            'data' => $data,
        ]);
    }

    public function permohonanBaru($id){
        $response = Http::withHeaders([
            'app_id' => 'lisensijakon_001',
            'app_key' => '2398ffb8a517d3c77c228f5b71d68591d1f761ef3ae430b424bea194'
                ])->send('POST', 'http://api.pu.go.id/oss/staging/services/app/getPermohonan', [
                    'body' => '{
                        "dataRequest" : {
                            "id_izin" : "'.$id.'"
                        }
                    }'
                ])->json();

        $emailPermohonan = $response['LSP Unsur Pembentuk'][0]["creator"];

        $cekUser = DB::table('users')->where('email', $emailPermohonan)->first();
        $permohonan=DB::table('api_terima_permohonan')->where('id_izin', $id)->first();

        if(empty($cekUser)){

        $user = new User();
        $user->nama_lsp = $permohonan[0]->nama_lsp;
        $user->id_izin = $permohonan[0]->id_izin;
        $user->email = $response['LSP Unsur Pembentuk'][0]["creator"];
        $user->asosiasi_pendiri = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['asosiasi_pendiri_satu'];
        $user->asosiasi_pendiri_1 = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['asosiasi_pendiri_dua'];
        $user->asosiasi_pendiri_2 = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['asosiasi_pendiri_tiga'];
        $user->alamat = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['alamat'];
        $user->save();
            

        $userId= DB::table('users')->where('email', $emailPermohonan)->first();
        
        $apt = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'];
        if (!empty($apt)){
            $apt = new Administration();
            $apt->no_akta = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['no_akta'];
            $apt->nama = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['nama_lsp'];
            $apt->unsur_pembentuk = $response['LSP Unsur Pembentuk'][0]['nama_unsur'];
            $apt->nama_unsur  = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['asosiasi_pendiri_satu'];
            $apt->nama_unsur_1  = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['asosiasi_pendiri_dua'];
            $apt->nama_unsur_2  = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['asosiasi_pendiri_tiga'];
            $apt->kategori_lsp  = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['kategori_asosiasi'];
            $apt->jenis_lsp  = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['jenis_lsp'];
            $apt->provinsi = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['propinsi'];
            $apt->alamat  = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['alamat'];
            $apt->kode_pos  = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['kode_pos'];
            $apt->status_kepemilikan  = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['status_kepemilikan'];
            $apt->ketersediaan_sistem  = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['ketersediaan_sistem'];
            // sk asosiasi
            $apt->upload_persyaratan  = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['sk_akreditasi'];
            $apt->no_telp  = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['no_telpon'];
            $apt->website  = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['website'];
            $apt->email  = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['email'];
            $apt->jumlah_skema  = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['jumlah_skema'];
            $apt->akta_pendirian  = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['akta_pendirian'];
            $apt->bukti_kepemilikan  = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['bukti_kepemilikan_kantor'];
            $apt->komitmen_asesor  = $response['Surat Pernyataan Komitmen Asesor '][0]['surat_komitmen_asesor'];
            $apt->users_id  = $userId->id;
            $apt->id_izin = $permohonan->id_izin;
            $apt->save();
        }

        $lppk = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'];
        if (!empty($lppk)){
            $lppk = new Administration();
            $lppk->no_registrasi = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['no_registrasi'];
            $lppk->no_akta = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['no_sk'];
            $lppk->nama = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['nama_lsp'];
            $lppk->unsur_pembentuk = $response['LSP Unsur Pembentuk'][0]['nama_unsur'];
            $lppk->nama_unsur  = 999;
            $lppk->nama_unsur_1  = 999;
            $lppk->nama_unsur_2  = 999;
            $lppk->kategori_lsp  = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['jenis_lp'];
            $lppk->jenis_lsp  = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['jenis_lsp'];
            $lppk->provinsi = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['propinsi'];
            $lppk->alamat  = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['alamat'];
            $lppk->kode_pos  = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['kode_pos'];
            $lppk->status_kepemilikan  = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['status_kepemilikan'];
            $lppk->ketersediaan_sistem  = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['ketersediaan_sistem'];
            // sk asosiasi
            $lppk->upload_persyaratan  = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['surat_tanda_registrasi'];
            $lppk->no_telp  = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['no_telpon'];
            $lppk->website  = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['website'];
            $lppk->email  = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['email'];
            $lppk->jumlah_skema  = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['jumlah_skema'];
            $lppk->akta_pendirian  = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['sk_penetapan'];
            $lppk->bukti_kepemilikan  = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['bukti_kepemilikan_kantor'];
            $lppk->surat_akreditasi = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['surat_akreditasi'];
            $lppk->komitmen_asesor  = $response['Surat Pernyataan Komitmen Asesor '][0]['surat_komitmen_asesor'];
            $lppk->users_id  = $userId->id;
            $lppk->id_izin = $permohonan->id_izin;
            $lppk->save();
        }

        $administrasiId = DB::table('administrations')->where('id_izin', $id)->get();

        $organisasi = new OrganizationStructure();
        $organisasi->users_id = $userId->id;
        $organisasi->id_izin = $permohonan->id_izin;

        $jumlah_pengarah = count($response['Data Pengarah LSP']);

        for ($i=0; $i <= $jumlah_pengarah; $i++) { 
            if($i == 0 ){
                if(array_key_exists($i,$response['Data Pengarah LSP'])){
                    $organisasi->pengarah = $response['Data Pengarah LSP'][$i]['nama_pengarah'];
                    $organisasi->no_telp_pengarah = $response['Data Pengarah LSP'][$i]['no_telpon_pengarah'];
                }else{
                    break;
                }
            }else if($i == 1){
                if(array_key_exists($i,$response['Data Pengarah LSP'])){
                    $organisasi->pengarah_1 = $response['Data Pengarah LSP'][$i]['nama_pengarah'];
                    $organisasi->no_telp_pengarah_1 = $response['Data Pengarah LSP'][$i]['no_telpon_pengarah'];
                }else{
                    break;
                }
            }else if($i == 2){
                if(array_key_exists($i,$response['Data Pengarah LSP'])){
                    $organisasi->pengarah_2 = $response['Data Pengarah LSP'][$i]['nama_pengarah'];
                    $organisasi->no_telp_pengarah_2 = $response['Data Pengarah LSP'][$i]['no_telpon_pengarah'];
                }else{
                    break;
                }
            }else if($i == 3){
                if(array_key_exists($i,$response['Data Pengarah LSP'])){
                    $organisasi->pengarah_3 = $response['Data Pengarah LSP'][$i]['nama_pengarah'];
                    $organisasi->no_telp_pengarah_3 = $response['Data Pengarah LSP'][$i]['no_telpon_pengarah'];
                }else{
                    break;
                }
            }else if($i == 4){
                if(array_key_exists($i,$response['Data Pengarah LSP'])){
                    $organisasi->pengarah_4 = $response['Data Pengarah LSP'][$i]['nama_pengarah'];
                    $organisasi->no_telp_pengarah_4 = $response['Data Pengarah LSP'][$i]['no_telpon_pengarah'];
                }else{
                    break;
                }
            }else if($i == 5){
                if(array_key_exists($i,$response['Data Pengarah LSP'])){
                    $organisasi->pengarah_5 = $response['Data Pengarah LSP'][$i]['nama_pengarah'];
                    $organisasi->no_telp_pengarah_5 = $response['Data Pengarah LSP'][$i]['no_telpon_pengarah'];
                }else{
                    break;
                }
            }else{
                break;
            }
        }

        $organisasi->ketua = $response['Data Pengurus LSP'][0]['ketua'];
        $organisasi->no_ketua = $response['Data Pengurus LSP'][0]['no_ketua'];
        $organisasi->umum = $response['Data Pengurus LSP'][0]['umum'];
        $organisasi->no_umum = $response['Data Pengurus LSP'][0]['no_umum'];
        $organisasi->sertifikasi = $response['Data Pengurus LSP'][0]['sertifikasi'];
        $organisasi->no_sertifikasi = $response['Data Pengurus LSP'][0]['no_sertifikasi'];
        $organisasi->manajemen_mutu = $response['Data Pengurus LSP'][0]['manajamen_mutu'];
        $organisasi->no_manajemen = $response['Data Pengurus LSP'][0]['no_manajemen'];
        $organisasi->jumlah_karyawan = $response['Data Pengurus LSP'][0]['jumlah_karyawan'];
        $organisasi->upload_persyaratan = $response['Data Pengurus LSP'][0]['upload_persyaratan'];
        $organisasi->save();

        foreach($response['Ruang Lingkup LSP'] as $qualifications){
            $kualifikasi = new Qualification();
            $kualifikasi->id_izin = $permohonan->id_izin;
            $kualifikasi->users_id = $userId->id;
            $kualifikasi->klasifikasi = $qualifications['klasifikasi'];
            $kualifikasi->sub_klasifikasi = substr($qualifications['sub_klasifikasi'],2,3);
            $kualifikasi->save();
        }
    
        foreach($response['Asesor'] as $data){
            $asesor = new Asesor();
            $asesor->id_izin = $permohonan->id_izin;
            $asesor->users_id = $userId->id;
            $asesor->nama_asesor = $data['nama_asesor'];
            $asesor->slug = Str::slug($data['nama_asesor']);
            $asesor->nik = $data['nik'];
            $asesor->npwp = $data['npwp'];
            $asesor->no_telpon = $data['no_hp'];
            $asesor->alamat = $data['alamat'];
            $asesor->provinsi = $data['propinsi'];
            $asesor->kab_kota = $data['id_kabupaten_kota'];
            $asesor->tgl_lahir = $data['tanggal_lahir'];
            $asesor->tempat_lahir = $data['tempat_lahir'];
            $asesor->pendidikan = $data['pendidikan'];

            if($data['status_asesor'] != 1){
                $asesor->status_asesor = "Tidak Tetap";
            }

            if($data['status_asesor'] == 1){
                $asesor->status_asesor = "Tetap";
            }
            
            // belum ada data tercatat ?
            $asesor->tercatat = $data['status_asesor'];
            $asesor->save();

            $asesorId = Asesor::where('nik', $data['nik'])->get();
            
            $detailAsesor = new DetailAsesor();
            $detailAsesor->asesor_id =  $asesorId[0]->id;
            $detailAsesor->klasifikasi = $data['skema_diampu'];
            $detailAsesor->nrka = $data['nomor_sertifikat_skk'];
            // $detailAsesor->sub_klasifikasi = ?
            // $detailAsesor->kualifikasi = ?
            $detailAsesor->no_sertifikasi_asesor = $data['nomor_sertifikasi_asesor'];
            // $detailAsesor->sub_klasifikasi_sertifikat = ?
            // $detailAsesor->kualifikasi_sertifikat = ?
            $detailAsesor->ska = $data['sertifikat_kompetensi_kerja'];
            $detailAsesor->sertifikat_asesors = $data['sertifikat_asesor_bnsp'];
            $detailAsesor->id_izin = $permohonan->id_izin;
            $detailAsesor->users_id = $userId->id;
            $detailAsesor->save();

            $skemaAsesor = new SkemaAsesor();
            $skemaAsesor->asesor_id = $asesorId[0]->id;
            $skemaAsesor->id_izin = $permohonan->id_izin;
            $skemaAsesor->users_id = $userId->id;
            $skemaAsesor->save();
            $skemaAsesor->skema_sertifikasi = $data['jabker'];
            // $skemaAsesor->kualifikasi = ?
            // $skemaAsesor->subklasifikasi = ?      
        }

        foreach($response['Sarana dan Prasarana serta TUK'] as $tuks){
            $tuk = new Tuk();
            $tuk->users_id = $userId->id;
            $tuk->id_izin = $permohonan->id_izin;
            $tuk->nama_tuk = $tuks['nama_tuk'];
            $tuk->alamat = $tuks['alamat'];
            $tuk->upload_persyaratan = $tuks['daftar_sarana_prasarana'];
            $tuk->save();
        }

        $permohonanBaru = new Permohonan();
        $permohonanBaru->id_izin = $permohonan->id_izin;
        $permohonanBaru->administrations_id = $administrasiId[0]->id;
        $permohonanBaru->users_id = $userId->id;
        $permohonanBaru->jenis_permohonan = $permohonan->jenis_permohonan;
        $permohonanBaru->surat_permohonan = $response['Skema Sertifikasi LSP Baru'][0]['surat_permohonan'];
        $permohonanBaru->status_submit = $permohonan->created_at;

        $permohonanBaru->save();

        $permohonanId = DB::table('permohonans')->where('id_izin', $id)->get();

        foreach($response['Skema Sertifikasi'] as $skema){
            $permohonanSkema = new LspCertificate();
            $permohonanSkema->users_id = $userId->id;
            $permohonanSkema->id_izin = $permohonan->id_izin;
            $permohonanSkema->permohonans_id =  $permohonanId[0]->id;
            $permohonanSkema->kode_skema = $skema['kode_skema'];
            $permohonanSkema->nama_skema = $skema['nama_skema'];
            $permohonanSkema->jabker = $skema['jabker'];
            $permohonanSkema->klasifikasi = $skema['klasifikasi'];
            $permohonanSkema->sub_klasifikasi = substr($skema['sub_klasifikasi'], 2,3);
            $permohonanSkema->jenjang = $skema['jenjang'];
            $permohonanSkema->jumlah_unit = $skema['jumlah_unit'];
            $permohonanSkema->acuan_skema = $skema['acuan_skema'];
            $permohonanSkema->no_kompetensi = $skema['nomor_kompetensi'];
            $permohonanSkema->upload_persyaratan = $skema['upload_persyaratan'];
            $permohonanSkema->standar_kompetensi = $skema['standar_kompetensi'];

            if($skema['jenjang'] >= 1){
                $permohonanSkema->kualifikasi = "Operator";
            }else if($skema['jenjang'] >= 4){
                $permohonanSkema->kualifikasi = "Teknisi / Analis";
            }else if($skema['jenjang'] >= 7){
                $permohonanSkema->kualifikasi = "Ahli";
            } 

            $permohonanSkema->save();
        }

        $skemaBaru = $response['LSP - Pengajuan Jabatan Kerja Baru'];

        if (!empty($skemaBaru)) {
            foreach($response['LSP - Pengajuan Jabatan Kerja Baru'] as $baru){
                $permohonanSkema = new LspCertificate();
                $permohonanSkema->users_id = $userId->id;
                $permohonanSkema->id_izin = $permohonan->id_izin;
                $permohonanSkema->permohonans_id =  $permohonanId[0]->id;
                $permohonanSkema->kode_skema = $baru['kode_skema'];
                $permohonanSkema->nama_skema = $baru['nama_skema'];
                $permohonanSkema->jabker = $baru['nama_skema'];
                $permohonanSkema->klasifikasi = $baru['klasifikasi'];
                $permohonanSkema->sub_klasifikasi = substr($baru['sub_klasifikasi'], 2,3);
                $permohonanSkema->jenjang = 99;
                $permohonanSkema->jumlah_unit = $baru['jumlah_unit'];
                $permohonanSkema->acuan_skema = $baru['acuan_skema'];
                $permohonanSkema->upload_persyaratan = $baru['upload_persyaratan'];
                $permohonanSkema->standar_kompetensi = $baru['standar_kompetensi'];
                $permohonanSkema->kualifikasi = "Kosong";
    
                $permohonanSkema->save();
    
            }
        }

        $data['status_permohonan'] = 20;
        $data['updated_at'] = Carbon::now();
        $data['read_at'] = Carbon::now();
        $permohonanUpdate = TerimaPermohonan::where('id_izin', $id)->firstOrFail();
        $permohonanUpdate->update($data);

        $logData['id_izin'] = $permohonan->id_izin;
        $logData['nama_lsp'] = $permohonan->nama_lsp;
        $logData['status'] = 20;
        $logData['tgl_status'] = Carbon::now();
        $logData['keterangan'] = "Verifikasi Dokumen Permohonan";

        LogStatus::create($logData);

        Http::withHeaders([
            'app_id' => 'lisensijakon_001',
            'app_key' => '2398ffb8a517d3c77c228f5b71d68591d1f761ef3ae430b424bea194'
                ])->send('POST', 'http://api.pu.go.id/oss/staging/services/app/terimaStatusPersyaratan', [
                    'body' => '{
                        "IZINREQUEST" : {
                            "id_izin" : "'.$id.'",
                            "kd_status" : "20",
                            "tgl_status" : " '. Carbon::now().'",
                            "nama_status" : "Sekretariat LPJK",
                            "keterangan" : "Verifikasi Dokumen"
                        }
                    }'
                ])->json();

        return redirect()->route('portal.index');
        }

        $permohonan=DB::table('api_terima_permohonan')->where('id_izin', $id)->first();
        $userId= DB::table('users')->where('id_izin', $id)->first();

        $apt = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'];
        if (!empty($apt)){
            $apt = new Administration();
            $apt->no_akta = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['no_akta'];
            $apt->nama = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['nama_lsp'];
            $apt->unsur_pembentuk = $response['LSP Unsur Pembentuk'][0]['nama_unsur'];
            $apt->nama_unsur  = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['asosiasi_pendiri_satu'];
            $apt->nama_unsur_1  = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['asosiasi_pendiri_dua'];
            $apt->nama_unsur_2  = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['asosiasi_pendiri_tiga'];
            $apt->kategori_lsp  = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['kategori_asosiasi'];
            $apt->jenis_lsp  = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['jenis_lsp'];
            $apt->provinsi = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['propinsi'];
            $apt->alamat  = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['alamat'];
            $apt->kode_pos  = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['kode_pos'];
            $apt->status_kepemilikan  = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['status_kepemilikan'];
            $apt->ketersediaan_sistem  = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['ketersediaan_sistem'];
            // sk asosiasi
            $apt->upload_persyaratan  = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['sk_akreditasi'];
            $apt->no_telp  = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['no_telpon'];
            $apt->website  = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['website'];
            $apt->email  = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['email'];
            $apt->jumlah_skema  = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['jumlah_skema'];
            $apt->akta_pendirian  = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['akta_pendirian'];
            $apt->bukti_kepemilikan  = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['bukti_kepemilikan_kantor'];
            $apt->komitmen_asesor  = $response['Surat Pernyataan Komitmen Asesor '][0]['surat_komitmen_asesor'];
            $apt->users_id  = $userId->id;
            $apt->id_izin = $permohonan->id_izin;
            $apt->save();
        }

        $lppk = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'];
        if (!empty($lppk)){
            $lppk = new Administration();
            $lppk->no_registrasi = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['no_registrasi'];
            $lppk->no_akta = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['no_sk'];
            $lppk->nama = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['nama_lsp'];
            $lppk->unsur_pembentuk = $response['LSP Unsur Pembentuk'][0]['nama_unsur'];
            $lppk->nama_unsur  = 999;
            $lppk->nama_unsur_1  = 999;
            $lppk->nama_unsur_2  = 999;
            $lppk->kategori_lsp  = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['jenis_lp'];
            $lppk->jenis_lsp  = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['jenis_lsp'];
            $lppk->provinsi = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['propinsi'];
            $lppk->alamat  = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['alamat'];
            $lppk->kode_pos  = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['kode_pos'];
            $lppk->status_kepemilikan  = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['status_kepemilikan'];
            $lppk->ketersediaan_sistem  = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['ketersediaan_sistem'];
            // sk asosiasi
            $lppk->upload_persyaratan  = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['surat_tanda_registrasi'];
            $lppk->no_telp  = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['no_telpon'];
            $lppk->website  = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['website'];
            $lppk->email  = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['email'];
            $lppk->jumlah_skema  = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['jumlah_skema'];
            $lppk->akta_pendirian  = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['sk_penetapan'];
            $lppk->bukti_kepemilikan  = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['bukti_kepemilikan_kantor'];
            $lppk->surat_akreditasi = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['surat_akreditasi'];
            $lppk->komitmen_asesor  = $response['Surat Pernyataan Komitmen Asesor '][0]['surat_komitmen_asesor'];
            $lppk->users_id  = $userId->id;
            $lppk->id_izin = $permohonan->id_izin;
            $lppk->save();
        }   

        $administrasiId = DB::table('administrations')->where('id_izin', $id)->get();

        $organisasi = new OrganizationStructure();
        $organisasi->users_id = $userId->id;
        $organisasi->id_izin = $permohonan[0]->id_izin;

        $jumlah_pengarah = count($response['Data Pengarah LSP']);

        for ($i=0; $i <= $jumlah_pengarah; $i++) { 
            if($i == 0 ){
                if(array_key_exists($i,$response['Data Pengarah LSP'])){
                    $organisasi->pengarah = $response['Data Pengarah LSP'][$i]['nama_pengarah'];
                    $organisasi->no_telp_pengarah = $response['Data Pengarah LSP'][$i]['no_telpon_pengarah'];
                }else{
                    break;
                }
            }else if($i == 1){
                if(array_key_exists($i,$response['Data Pengarah LSP'])){
                    $organisasi->pengarah_1 = $response['Data Pengarah LSP'][$i]['nama_pengarah'];
                    $organisasi->no_telp_pengarah_1 = $response['Data Pengarah LSP'][$i]['no_telpon_pengarah'];
                }else{
                    break;
                }
            }else if($i == 2){
                if(array_key_exists($i,$response['Data Pengarah LSP'])){
                    $organisasi->pengarah_2 = $response['Data Pengarah LSP'][$i]['nama_pengarah'];
                    $organisasi->no_telp_pengarah_2 = $response['Data Pengarah LSP'][$i]['no_telpon_pengarah'];
                }else{
                    break;
                }
            }else if($i == 3){
                if(array_key_exists($i,$response['Data Pengarah LSP'])){
                    $organisasi->pengarah_3 = $response['Data Pengarah LSP'][$i]['nama_pengarah'];
                    $organisasi->no_telp_pengarah_3 = $response['Data Pengarah LSP'][$i]['no_telpon_pengarah'];
                }else{
                    break;
                }
            }else if($i == 4){
                if(array_key_exists($i,$response['Data Pengarah LSP'])){
                    $organisasi->pengarah_4 = $response['Data Pengarah LSP'][$i]['nama_pengarah'];
                    $organisasi->no_telp_pengarah_4 = $response['Data Pengarah LSP'][$i]['no_telpon_pengarah'];
                }else{
                    break;
                }
            }else if($i == 5){
                if(array_key_exists($i,$response['Data Pengarah LSP'])){
                    $organisasi->pengarah_5 = $response['Data Pengarah LSP'][$i]['nama_pengarah'];
                    $organisasi->no_telp_pengarah_5 = $response['Data Pengarah LSP'][$i]['no_telpon_pengarah'];
                }else{
                    break;
                }
            }else{
                break;
            }
        }

        $organisasi->ketua = $response['Data Pengurus LSP'][0]['ketua'];
        $organisasi->no_ketua = $response['Data Pengurus LSP'][0]['no_ketua'];
        $organisasi->umum = $response['Data Pengurus LSP'][0]['umum'];
        $organisasi->no_umum = $response['Data Pengurus LSP'][0]['no_umum'];
        $organisasi->sertifikasi = $response['Data Pengurus LSP'][0]['sertifikasi'];
        $organisasi->no_sertifikasi = $response['Data Pengurus LSP'][0]['no_sertifikasi'];
        $organisasi->manajemen_mutu = $response['Data Pengurus LSP'][0]['manajamen_mutu'];
        $organisasi->no_manajemen = $response['Data Pengurus LSP'][0]['no_manajemen'];
        $organisasi->jumlah_karyawan = $response['Data Pengurus LSP'][0]['jumlah_karyawan'];
        $organisasi->upload_persyaratan = $response['Data Pengurus LSP'][0]['upload_persyaratan'];
        $organisasi->save();

        foreach($response['Ruang Lingkup LSP'] as $qualifications){
            $kualifikasi = new Qualification();
            $kualifikasi->id_izin = $permohonan->id_izin;
            $kualifikasi->users_id = $userId->id;
            $kualifikasi->klasifikasi = $qualifications['klasifikasi'];
            $kualifikasi->sub_klasifikasi = substr($qualifications['sub_klasifikasi'],2,3);
            $kualifikasi->save();
        }
    
        foreach($response['Asesor'] as $data){
            $asesor = new Asesor();
            $asesor->id_izin = $permohonan->id_izin;
            $asesor->users_id = $userId->id;
            $asesor->nama_asesor = $data['nama_asesor'];
            $asesor->slug = Str::slug($data['nama_asesor']);
            $asesor->nik = $data['nik'];
            $asesor->alamat = $data['alamat'];

            if($data['status_asesor'] != 1){
                $asesor->status_asesor = "Tidak Tetap";
            }

            if($data['status_asesor'] == 1){
                $asesor->status_asesor = "Tetap";
            }
            
            // belum ada data tercatat ?
            $asesor->tercatat = $data['status_asesor'];
            $asesor->save();

            $asesorId = Asesor::where('nik', $data['nik'])->get();
            
            $detailAsesor = new DetailAsesor();
            $detailAsesor->asesor_id =  $asesorId[0]->id;
            $detailAsesor->klasifikasi = $data['skema_diampu'];
            // $detailAsesor->nrka = ?
            // $detailAsesor->sub_klasifikasi = ?
            // $detailAsesor->kualifikasi = ?
            // $detailAsesor->no_sertifikasi_asesor = ?
            // $detailAsesor->sub_klasifikasi_sertifikat = ?
            // $detailAsesor->kualifikasi_sertifikat = ?
            $detailAsesor->ska = $data['sertifikat_kompetensi_kerja'];
            $detailAsesor->sertifikat_asesors = $data['sertifikat_asesor_bnsp'];
            $detailAsesor->id_izin = $permohonan->id_izin;
            $detailAsesor->users_id = $userId->id;
            $detailAsesor->save();

            $skemaAsesor = new SkemaAsesor();
            $skemaAsesor->asesor_id = $asesorId[0]->id;
            $skemaAsesor->id_izin = $permohonan->id_izin;
            $skemaAsesor->users_id = $userId->id;
            $skemaAsesor->save();
            // $skemaAsesor->skema_sertifikasi = ?
            // $skemaAsesor->kualifikasi = ?
            // $skemaAsesor->subklasifikasi = ?      
        }

        foreach($response['Sarana dan Prasarana serta TUK'] as $tuks){
            $tuk = new Tuk();
            $tuk->users_id = $userId->id;
            $tuk->id_izin = $permohonan->id_izin;
            $tuk->nama_tuk = $tuks['nama_tuk'];
            $tuk->alamat = $tuks['alamat'];
            $tuk->upload_persyaratan = $tuks['daftar_sarana_prasarana'];
            $tuk->save();
        }
        
        $permohonanBaru = new Permohonan();
        $permohonanBaru->id_izin = $permohonan->id_izin;
        $permohonanBaru->administrations_id = $administrasiId[0]->id;
        $permohonanBaru->users_id = $userId->id;
        $permohonanBaru->jenis_permohonan = $permohonan->jenis_permohonan;
        $permohonanBaru->surat_permohonan = $response['Skema Sertifikasi LSP Baru'][0]['surat_permohonan'];
        $permohonanBaru->status_submit = $permohonan->created_at;
        $permohonanBaru->save();


        $permohonanId = DB::table('permohonans')->where('id_izin', $id)->get();

        foreach($response['Skema Sertifikasi'] as $skema){
            $permohonanSkema = new LspCertificate();
            $permohonanSkema->users_id = $userId->id;
            $permohonanSkema->id_izin = $permohonan->id_izin;
            $permohonanSkema->permohonans_id =  $permohonanId[0]->id;
            $permohonanSkema->kode_skema = $skema['kode_skema'];
            $permohonanSkema->nama_skema = $skema['nama_skema'];
            $permohonanSkema->jabker = $skema['jabker'];
            $permohonanSkema->klasifikasi = $skema['klasifikasi'];
            $permohonanSkema->sub_klasifikasi = substr($skema['sub_klasifikasi'], 2,3);
            $permohonanSkema->kualifikasi = $skema['kualifikasi'];
            $permohonanSkema->jenjang = $skema['jenjang'];
            $permohonanSkema->jumlah_unit = $skema['jumlah_unit'];
            $permohonanSkema->acuan_skema = $skema['nomor_kompetensi'];
            $permohonanSkema->upload_persyaratan = $skema['upload_persyaratan'];
            $permohonanSkema->standar_kompetensi = $skema['standar_kompetensi'];

            $permohonanSkema->save();
        }

        $skemaBaru = $response['LSP - Pengajuan Jabatan Kerja Baru'];

        if (!empty($skemaBaru)) {
            foreach($response['LSP - Pengajuan Jabatan Kerja Baru'] as $baru){
                $permohonanSkema = new LspCertificate();
                $permohonanSkema->users_id = $userId->id;
                $permohonanSkema->id_izin = $permohonan->id_izin;
                $permohonanSkema->permohonans_id =  $permohonanId[0]->id;
                $permohonanSkema->kode_skema = $baru['kode_skema'];
                $permohonanSkema->nama_skema = $baru['nama_skema'];
                $permohonanSkema->jabker = $baru['nama_skema'];
                $permohonanSkema->klasifikasi = $baru['klasifikasi'];
                $permohonanSkema->sub_klasifikasi = substr($baru['sub_klasifikasi'], 2,3);
                $permohonanSkema->jenjang = 99;
                $permohonanSkema->jumlah_unit = $baru['jumlah_unit'];
                $permohonanSkema->acuan_skema = $baru['acuan_skema'];
                $permohonanSkema->upload_persyaratan = $baru['upload_persyaratan'];
                $permohonanSkema->standar_kompetensi = $baru['standar_kompetensi'];
                $permohonanSkema->kualifikasi = "Kosong";
    
                $permohonanSkema->save();
    
            }
        }

        $data['status_permohonan'] = 20;
        $data['updated_at'] = Carbon::now();
        $data['read_at'] = Carbon::now();
        $permohonanUpdate = TerimaPermohonan::where('id_izin', $id)->firstOrFail();
        $permohonanUpdate->update($data);

        $logData['id_izin'] = $permohonan->id_izin;
        $logData['nama_lsp'] = $permohonan->nama_lsp;
        $logData['status'] = 20;
        $logData['tgl_status'] = Carbon::now();
        $logData['keterangan'] = "Verifikasi Dokumen Permohonan";

        LogStatus::create($logData);

        Http::withHeaders([
            'app_id' => 'lisensijakon_001',
            'app_key' => '2398ffb8a517d3c77c228f5b71d68591d1f761ef3ae430b424bea194'
                ])->send('POST', 'http://api.pu.go.id/oss/staging/services/app/terimaStatusPersyaratan', [
                    'body' => '{
                        "IZINREQUEST" : {
                            "id_izin" : "'.$id.'",
                            "kd_status" : "20",
                            "tgl_status" : " '. Carbon::now().'",
                            "nama_status" : "Sekretariat LPJK",
                            "keterangan" : "Verifikasi Dokumen"
                        }
                    }'
                ])->json();

        return redirect()->route('portal.index');
    }

    public function updatePerbaikan($id){
        $response = Http::withHeaders([
            'app_id' => 'lisensijakon_001',
            'app_key' => '2398ffb8a517d3c77c228f5b71d68591d1f761ef3ae430b424bea194'
                ])->send('POST', 'http://api.pu.go.id/oss/staging/services/app/getPermohonan', [
                    'body' => '{
                        "dataRequest" : {
                            "id_izin" : "'.$id.'"
                        }
                    }'
                ])->json();
            
        $permohonan=DB::table('api_terima_permohonan')->where('id_izin', $id)->get();

        $userId= DB::table('users')->where('id_izin', $id)->first();
        
        $apt = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'];
        if (!empty($apt)){
            $apt = new Administration();
            $apt->no_akta = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['no_akta'];
            $apt->nama = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['nama_lsp'];
            $apt->unsur_pembentuk = $response['LSP Unsur Pembentuk'][0]['nama_unsur'];
            $apt->nama_unsur  = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['asosiasi_pendiri_satu'];
            $apt->nama_unsur_1  = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['asosiasi_pendiri_dua'];
            $apt->nama_unsur_2  = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['asosiasi_pendiri_tiga'];
            $apt->kategori_lsp  = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['kategori_asosiasi'];
            $apt->jenis_lsp  = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['jenis_lsp'];
            $apt->provinsi = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['propinsi'];
            $apt->alamat  = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['alamat'];
            $apt->kode_pos  = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['kode_pos'];
            $apt->status_kepemilikan  = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['status_kepemilikan'];
            $apt->ketersediaan_sistem  = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['ketersediaan_sistem'];
            // sk asosiasi
            $apt->upload_persyaratan  = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['sk_akreditasi'];
            $apt->no_telp  = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['no_telpon'];
            $apt->website  = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['website'];
            $apt->email  = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['email'];
            $apt->jumlah_skema  = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['jumlah_skema'];
            $apt->akta_pendirian  = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['akta_pendirian'];
            $apt->bukti_kepemilikan  = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['bukti_kepemilikan_kantor'];
            $apt->komitmen_asesor  = $response['Surat Pernyataan Komitmen Asesor '][0]['surat_komitmen_asesor'];
            $apt->users_id  = $userId->id;
            $apt->id_izin = $permohonan[0]->id_izin;
            $apt->save();
        }

        $lppk = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'];
        if (!empty($lppk)){
            $lppk = new Administration();
            $lppk->no_registrasi = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['no_registrasi'];
            $lppk->no_akta = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['no_sk'];
            $lppk->nama = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['nama_lsp'];
            $lppk->unsur_pembentuk = $response['LSP Unsur Pembentuk'][0]['nama_unsur'];
            $lppk->nama_unsur  = 999;
            $lppk->nama_unsur_1  = 999;
            $lppk->nama_unsur_2  = 999;
            $lppk->kategori_lsp  = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['jenis_lp'];
            $lppk->jenis_lsp  = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['jenis_lsp'];
            $lppk->provinsi = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['propinsi'];
            $lppk->alamat  = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['alamat'];
            $lppk->kode_pos  = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['kode_pos'];
            $lppk->status_kepemilikan  = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['status_kepemilikan'];
            $lppk->ketersediaan_sistem  = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['ketersediaan_sistem'];
            // sk asosiasi
            $lppk->upload_persyaratan  = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['surat_tanda_registrasi'];
            $lppk->no_telp  = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['no_telpon'];
            $lppk->website  = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['website'];
            $lppk->email  = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['email'];
            $lppk->jumlah_skema  = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['jumlah_skema'];
            $lppk->akta_pendirian  = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['sk_penetapan'];
            $lppk->bukti_kepemilikan  = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['bukti_kepemilikan_kantor'];
            $lppk->surat_akreditasi = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['surat_akreditasi'];
            $lppk->komitmen_asesor  = $response['Surat Pernyataan Komitmen Asesor '][0]['surat_komitmen_asesor'];
            $lppk->users_id  = $userId->id;
            $lppk->id_izin = $permohonan[0]->id_izin;
            $lppk->save();
        }

        $administrasiId = DB::table('administrations')->where('id_izin', $id)->get();

        $organisasi = new OrganizationStructure();
        $organisasi->users_id = $userId->id;
        $organisasi->id_izin = $permohonan[0]->id_izin;

        $jumlah_pengarah = count($response['Data Pengarah LSP']);

        for ($i=0; $i <= $jumlah_pengarah; $i++) { 
            if($i == 0 ){
                if(array_key_exists($i,$response['Data Pengarah LSP'])){
                    $organisasi->pengarah = $response['Data Pengarah LSP'][$i]['nama_pengarah'];
                    $organisasi->no_telp_pengarah = $response['Data Pengarah LSP'][$i]['no_telpon_pengarah'];
                }else{
                    break;
                }
            }else if($i == 1){
                if(array_key_exists($i,$response['Data Pengarah LSP'])){
                    $organisasi->pengarah_1 = $response['Data Pengarah LSP'][$i]['nama_pengarah'];
                    $organisasi->no_telp_pengarah_1 = $response['Data Pengarah LSP'][$i]['no_telpon_pengarah'];
                }else{
                    break;
                }
            }else if($i == 2){
                if(array_key_exists($i,$response['Data Pengarah LSP'])){
                    $organisasi->pengarah_2 = $response['Data Pengarah LSP'][$i]['nama_pengarah'];
                    $organisasi->no_telp_pengarah_2 = $response['Data Pengarah LSP'][$i]['no_telpon_pengarah'];
                }else{
                    break;
                }
            }else if($i == 3){
                if(array_key_exists($i,$response['Data Pengarah LSP'])){
                    $organisasi->pengarah_3 = $response['Data Pengarah LSP'][$i]['nama_pengarah'];
                    $organisasi->no_telp_pengarah_3 = $response['Data Pengarah LSP'][$i]['no_telpon_pengarah'];
                }else{
                    break;
                }
            }else if($i == 4){
                if(array_key_exists($i,$response['Data Pengarah LSP'])){
                    $organisasi->pengarah_4 = $response['Data Pengarah LSP'][$i]['nama_pengarah'];
                    $organisasi->no_telp_pengarah_4 = $response['Data Pengarah LSP'][$i]['no_telpon_pengarah'];
                }else{
                    break;
                }
            }else if($i == 5){
                if(array_key_exists($i,$response['Data Pengarah LSP'])){
                    $organisasi->pengarah_5 = $response['Data Pengarah LSP'][$i]['nama_pengarah'];
                    $organisasi->no_telp_pengarah_5 = $response['Data Pengarah LSP'][$i]['no_telpon_pengarah'];
                }else{
                    break;
                }
            }else{
                break;
            }
        }

        $organisasi->ketua = $response['Data Pengurus LSP'][0]['ketua'];
        $organisasi->no_ketua = $response['Data Pengurus LSP'][0]['no_ketua'];
        $organisasi->umum = $response['Data Pengurus LSP'][0]['umum'];
        $organisasi->no_umum = $response['Data Pengurus LSP'][0]['no_umum'];
        $organisasi->sertifikasi = $response['Data Pengurus LSP'][0]['sertifikasi'];
        $organisasi->no_sertifikasi = $response['Data Pengurus LSP'][0]['no_sertifikasi'];
        $organisasi->manajemen_mutu = $response['Data Pengurus LSP'][0]['manajamen_mutu'];
        $organisasi->no_manajemen = $response['Data Pengurus LSP'][0]['no_manajemen'];
        $organisasi->jumlah_karyawan = $response['Data Pengurus LSP'][0]['jumlah_karyawan'];
        $organisasi->upload_persyaratan = $response['Data Pengurus LSP'][0]['upload_persyaratan'];
        $organisasi->save();

        foreach($response['Ruang Lingkup LSP'] as $qualifications){
            $kualifikasi = new Qualification();
            $kualifikasi->id_izin = $permohonan[0]->id_izin;
            $kualifikasi->users_id = $userId->id;
            $kualifikasi->klasifikasi = $qualifications['klasifikasi'];
            $kualifikasi->sub_klasifikasi = substr($qualifications['sub_klasifikasi'],2,3);
            $kualifikasi->save();
        }
    
        foreach($response['Asesor'] as $data){
            $asesor = new Asesor();
            $asesor->id_izin = $permohonan[0]->id_izin;
            $asesor->users_id = $userId->id;
            $asesor->nama_asesor = $data['nama_asesor'];
            $asesor->slug = Str::slug($data['nama_asesor']);
            $asesor->nik = $data['nik'];
            $asesor->alamat = $data['alamat'];

            if($data['status_asesor'] != 1){
                $asesor->status_asesor = "Tidak Tetap";
            }

            if($data['status_asesor'] == 1){
                $asesor->status_asesor = "Tetap";
            }
            
            // belum ada data tercatat ?
            $asesor->tercatat = $data['status_asesor'];
            $asesor->save();

            $asesorId = Asesor::where('nik', $data['nik'])->get();
            
            $detailAsesor = new DetailAsesor();
            $detailAsesor->asesor_id =  $asesorId[0]->id;
            $detailAsesor->klasifikasi = $data['skema_diampu'];
            // $detailAsesor->nrka = ?
            // $detailAsesor->sub_klasifikasi = ?
            // $detailAsesor->kualifikasi = ?
            // $detailAsesor->no_sertifikasi_asesor = ?
            // $detailAsesor->sub_klasifikasi_sertifikat = ?
            // $detailAsesor->kualifikasi_sertifikat = ?
            $detailAsesor->ska = $data['sertifikat_kompetensi_kerja'];
            $detailAsesor->sertifikat_asesors = $data['sertifikat_asesor_bnsp'];
            $detailAsesor->id_izin = $permohonan[0]->id_izin;
            $detailAsesor->users_id = $userId->id;
            $detailAsesor->save();

            $skemaAsesor = new SkemaAsesor();
            $skemaAsesor->asesor_id = $asesorId[0]->id;
            $skemaAsesor->id_izin = $permohonan[0]->id_izin;
            $skemaAsesor->users_id = $userId->id;
            $skemaAsesor->save();
            // $skemaAsesor->skema_sertifikasi = ?
            // $skemaAsesor->kualifikasi = ?
            // $skemaAsesor->subklasifikasi = ?      
        }

        foreach($response['Sarana dan Prasarana serta TUK'] as $tuks){
            $tuk = new Tuk();
            $tuk->users_id = $userId->id;
            $tuk->id_izin = $permohonan[0]->id_izin;
            $tuk->nama_tuk = $tuks['nama_tuk'];
            $tuk->alamat = $tuks['alamat'];
            $tuk->upload_persyaratan = $tuks['daftar_sarana_prasarana'];
            $tuk->save();
        }

        $PermohonanIsExist = Permohonan::where('id_izin', $id)->first();

        if(!empty($PermohonanIsExist)){
            $permohonanUpdate['surat_permohonan'] = $response['Skema Sertifikasi LSP Baru'][0]['surat_permohonan'];
            $permohonan = Permohonan::where('id_izin', $id)->firstOrFail();
            $permohonan->update($permohonanUpdate);
        }

        $permohonanId = DB::table('permohonans')->where('id_izin', $id)->get();

        foreach($response['Skema Sertifikasi'] as $skema){
            $permohonanSkema = new LspCertificate();
            $permohonanSkema->users_id = $userId->id;
            $permohonanSkema->id_izin = $permohonanId[0]->id_izin;
            $permohonanSkema->permohonans_id =  $permohonanId[0]->id;
            $permohonanSkema->kode_skema = $skema['kode_skema'];
            $permohonanSkema->nama_skema = $skema['nama_skema'];
            $permohonanSkema->jabker = $skema['jabker'];
            $permohonanSkema->klasifikasi = $skema['klasifikasi'];
            $permohonanSkema->sub_klasifikasi = substr($skema['sub_klasifikasi'], 2,3);
            $permohonanSkema->jenjang = $skema['jenjang'];
            $permohonanSkema->jumlah_unit = $skema['jumlah_unit'];
            $permohonanSkema->acuan_skema = $skema['nomor_kompetensi'];
            $permohonanSkema->upload_persyaratan = $skema['upload_persyaratan'];
            $permohonanSkema->standar_kompetensi = $skema['standar_kompetensi'];

            if($skema['jenjang'] >= 1){
                $permohonanSkema->kualifikasi = "Operator";
            }else if($skema['jenjang'] >= 4){
                $permohonanSkema->kualifikasi = "Teknisi / Analis";
            }else if($skema['jenjang'] >= 7){
                $permohonanSkema->kualifikasi = "Ahli";
            } 

            $permohonanSkema->save();
        }

        $skemaBaru = $response['LSP - Pengajuan Jabatan Kerja Baru'];

        if (!empty($skemaBaru)) {
            foreach($response['LSP - Pengajuan Jabatan Kerja Baru'] as $baru){
                $permohonanSkema = new LspCertificate();
                $permohonanSkema->users_id = $userId->id;
                $permohonanSkema->id_izin = $permohonanId[0]->id_izin;
                $permohonanSkema->permohonans_id =  $permohonanId[0]->id;
                $permohonanSkema->kode_skema = $baru['kode_skema'];
                $permohonanSkema->nama_skema = $baru['nama_skema'];
                $permohonanSkema->jabker = $baru['nama_skema'];
                $permohonanSkema->klasifikasi = $baru['klasifikasi'];
                $permohonanSkema->sub_klasifikasi = substr($baru['sub_klasifikasi'], 2,3);
                $permohonanSkema->jenjang = 99;
                $permohonanSkema->jumlah_unit = $baru['jumlah_unit'];
                $permohonanSkema->acuan_skema = $baru['acuan_skema'];
                $permohonanSkema->upload_persyaratan = $baru['upload_persyaratan'];
                $permohonanSkema->standar_kompetensi = $baru['standar_kompetensi'];
                $permohonanSkema->kualifikasi = "Kosong";
    
                $permohonanSkema->save();
    
            }
        }

        $data['status_permohonan'] = 20;
        $data['updated_at'] = Carbon::now();
        $data['read_at'] = Carbon::now();
        $permohonanUpdate = TerimaPermohonan::where('id_izin', $id)->firstOrFail();
        $permohonanUpdate->update($data);

        $logData['id_izin'] = $permohonanId[0]->id_izin;
        $logData['nama_lsp'] = 'test';
        $logData['status'] = 20;
        $logData['tgl_status'] = Carbon::now();
        $logData['keterangan'] = "Verifikasi Dokumen Permohonan";

        LogStatus::create($logData);

        Http::withHeaders([
            'app_id' => 'lisensijakon_001',
            'app_key' => '2398ffb8a517d3c77c228f5b71d68591d1f761ef3ae430b424bea194'
                ])->send('POST', 'http://api.pu.go.id/oss/staging/services/app/terimaStatusPersyaratan', [
                    'body' => '{
                        "IZINREQUEST" : {
                            "id_izin" : "'.$id.'",
                            "kd_status" : "20",
                            "tgl_status" : " '. Carbon::now().'",
                            "nama_status" : "Sekretariat LPJK",
                            "keterangan" : "Verifikasi Dokumen"
                        }
                    }'
                ])->json();

        return redirect()->route('portal.index');
        
    }

    public function cekPermohonan($idIzin){
        $permohonan = Permohonan::where('id_izin', $idIzin)->firstOrFail();
        
        $detail = DB::table('permohonans')
            ->where('permohonans.id_izin', '=' ,$idIzin)
            ->join('administrations', function($administrasi){
                $administrasi->on('permohonans.id_izin', '=', 'administrations.id_izin')->whereNull('administrations.deleted_at');})
            ->join('organization_structures' , function($organisasi){
                $organisasi->on('permohonans.id_izin', '=', 'organization_structures.id_izin')->whereNull('organization_structures.deleted_at');})
            ->join('personal_profesi_ta_detail', 'administrations.nama_unsur', '=','personal_profesi_ta_detail.ID_Asosiasi_Profesi')
            ->join('personal_profesi_ta_detail_1', 'administrations.nama_unsur_1', '=','personal_profesi_ta_detail_1.ID_Asosiasi_Profesi')
            ->join('personal_profesi_ta_detail_2', 'administrations.nama_unsur_2', '=','personal_profesi_ta_detail_2.ID_Asosiasi_Profesi')
            ->select('permohonans.*', 'administrations.*', 'organization_structures.*', 'personal_profesi_ta_detail.nama_0','personal_profesi_ta_detail_1.nama_1' ,'personal_profesi_ta_detail_2.nama_2')
            ->get();

        if(count($detail) == 0){
            return view('pages.admin.portal.perbaikan');
        }
        
        $ruangLingkup = DB::table('permohonans')
                        ->where('permohonans.id_izin', $idIzin)
                        ->join('qualifications', function($join){
                            $join->on('permohonans.id_izin', '=', 'qualifications.id_izin')
                                ->whereNull('qualifications.deleted_at');
                        })
                        ->select('permohonans.id_izin', 'qualifications.*')
                        ->get();

        $skema = DB::table('permohonans')
                    ->where('permohonans.id_izin', $idIzin)
                    ->join('lsp_certificates', function($join){
                        $join->on('permohonans.id_izin', '=', 'lsp_certificates.id_izin')
                            ->whereNull('lsp_certificates.deleted_at');
                    })
                    ->select('permohonans.id_izin', 'lsp_certificates.*')
                    ->get();

        $tuk = DB::table('permohonans')
                    ->where('permohonans.id_izin', $idIzin)
                    ->join('tuks', function($join){
                        $join->on('permohonans.id_izin', '=', 'tuks.id_izin')
                            ->whereNull('tuks.deleted_at');
                    })
                    ->select('permohonans.id_izin', 'tuks.*')
                    ->get();

        $asesor = Asesor::where('id_izin', $idIzin)->whereNull('deleted_at')->get();

        return view('pages.admin.portal.detail', [
            'id_permohonan' => $permohonan->id,
            'detail' => $detail[0],
            'lingkup' => $ruangLingkup,
            'skema' => $skema,
            'tuk' => $tuk,
            'asesor' => $asesor
        ]);
    }

    public function PerbaikanBerkas(Request $request){        
        $data = $request->all();
        Check::create($data);
        
        $updatePermohonan['status_permohonan'] = 11;
        $updatePermohonan['updated_at'] = Carbon::now();
        $updatePermohonan['tgl_perbaikan'] = Carbon::now();
        $permohonan = TerimaPermohonan::where('id_izin', $data['id_izin'])->firstOrFail();
        $permohonan->update($updatePermohonan);
        
        $logData['id_izin'] = $data['id_izin'];
        $logData['nama_lsp'] = $permohonan->nama_lsp;
        $logData['status'] = 11;
        $logData['tgl_status'] = Carbon::now();
        $logData['keterangan'] = "Perbaiki Dokumen Persyaratan";

        LogStatus::create($logData);

        Http::withHeaders([
            'app_id' => 'lisensijakon_001',
            'app_key' => '2398ffb8a517d3c77c228f5b71d68591d1f761ef3ae430b424bea194'
                ])->send('POST', 'http://api.pu.go.id/oss/staging/services/app/terimaStatusPersyaratan', [
                    'body' => '{
                        "IZINREQUEST" : {
                            "id_izin" : "'.$data['id_izin'].'",
                            "kd_status" : "11",
                            "tgl_status" : " '. Carbon::now().'",
                            "nama_status" : "Sekretariat LPJK",
                            "keterangan" : "Dokumen Permohonan Tidak Lengkap"
                        }
                    }'
                ])->json();

        $idIzin = $data['id_izin'];

        $response = Http::withHeaders([
            'app_id' => 'lisensijakon_001',
            'app_key' => '2398ffb8a517d3c77c228f5b71d68591d1f761ef3ae430b424bea194'
                ])->send('POST', 'http://api.pu.go.id/oss/staging/services/app/getPermohonan', [
                    'body' => '{
                        "dataRequest" : {
                            "id_izin" : "'.$idIzin.'"
                        }
                    }'
                ])->json();

        $user = $response['LSP Unsur Pembentuk'][0]["creator"];

        // Notification::send($user, new VerifikasiTidakLengkap($data));

        $administrasi = Administration::where('id_izin', $idIzin)->firstOrFail();
        $administrasi->delete();
          
        $organisasi = OrganizationStructure::where('id_izin', $idIzin)->firstOrFail();
        $organisasi->delete();
          
        $lingkup = Qualification::where('id_izin', $idIzin)->get();
                foreach($lingkup as $item){
                  $item->delete();
                }
          
        $asesor = Asesor::where('id_izin', $idIzin)->get();
                foreach($asesor as $item){
                  $item->delete();
                }
          
        $skema = LspCertificate::where('id_izin', $idIzin)->get();
                foreach($skema as $item){
                  $item->delete();
                }
          
        $tuk = Tuk::where('id_izin', $idIzin)->get();
                foreach($tuk as $item){
                  $item->delete();
                }

        return redirect()->route('portal.index')->with('success', 'Data Permohonan Berhasil Kirim Perbaikan');
    }

    public function DokumenLengkap($idIzin){
        $updatePermohonan['status_permohonan'] = 10;
        $updatePermohonan['updated_at'] = Carbon::now();
        $permohonan = TerimaPermohonan::where('id_izin', $idIzin)->firstOrFail();
        $permohonan->update($updatePermohonan);

        $permohonanUpdate = Permohonan::where('id_izin', $idIzin)->firstOrFail();
        $permohonanUpdate->status_kelengkapan = Carbon::now();
        $permohonanUpdate->save();
           
        $logData['id_izin'] = $idIzin;
        $logData['nama_lsp'] = $permohonan->nama_lsp;
        $logData['status'] = 10;
        $logData['tgl_status'] = Carbon::now();
        $logData['keterangan'] = "Dokumen Permohonan Lengkap";

        LogStatus::create($logData);

        Http::withHeaders([
            'app_id' => 'lisensijakon_001',
            'app_key' => '2398ffb8a517d3c77c228f5b71d68591d1f761ef3ae430b424bea194'
                ])->send('POST', 'http://api.pu.go.id/oss/staging/services/app/terimaStatusPersyaratan', [
                    'body' => '{
                        "IZINREQUEST" : {
                            "id_izin" : "'.$idIzin.'",
                            "kd_status" : "10",
                            "tgl_status" : " '. Carbon::now().'",
                            "nama_status" : "Sekretariat LPJK",
                            "keterangan" : "Dokumen Permohonan Lengkap"
                        }
                    }'
                ])->json();

        return redirect()->route('portal.index')->with('success', 'Data Permohonan Berhasil Kirim Perbaikan');
    }

    public function validasiPermohonan($idIzin){
        $permohonan = Permohonan::where('id_izin', $idIzin)->firstOrFail();
        
        $detail = DB::table('permohonans')
            ->where('permohonans.id_izin', '=' ,$idIzin)
            ->join('administrations', function($administrasi){
                $administrasi->on('permohonans.id_izin', '=', 'administrations.id_izin')->whereNull('administrations.deleted_at');})
            ->join('organization_structures' , function($organisasi){
                $organisasi->on('permohonans.id_izin', '=', 'organization_structures.id_izin')->whereNull('organization_structures.deleted_at');})
            ->join('personal_profesi_ta_detail', 'administrations.nama_unsur', '=','personal_profesi_ta_detail.ID_Asosiasi_Profesi')
            ->join('personal_profesi_ta_detail_1', 'administrations.nama_unsur_1', '=','personal_profesi_ta_detail_1.ID_Asosiasi_Profesi')
            ->join('personal_profesi_ta_detail_2', 'administrations.nama_unsur_2', '=','personal_profesi_ta_detail_2.ID_Asosiasi_Profesi')
            ->select('permohonans.*', 'administrations.*', 'organization_structures.*', 'personal_profesi_ta_detail.nama_0','personal_profesi_ta_detail_1.nama_1' ,'personal_profesi_ta_detail_2.nama_2')
            ->get();

        if(count($detail) == 0){
            return view('pages.admin.portal.perbaikan');
        }
        
        $ruangLingkup = DB::table('permohonans')
                        ->where('permohonans.id_izin', $idIzin)
                        ->join('qualifications', function($join){
                            $join->on('permohonans.id_izin', '=', 'qualifications.id_izin')
                                ->whereNull('qualifications.deleted_at');
                        })
                        ->select('permohonans.id_izin', 'qualifications.*')
                        ->get();

        $skema = DB::table('permohonans')
                    ->where('permohonans.id_izin', $idIzin)
                    ->join('lsp_certificates', function($join){
                        $join->on('permohonans.id_izin', '=', 'lsp_certificates.id_izin')
                            ->whereNull('lsp_certificates.deleted_at');
                    })
                    ->select('permohonans.id_izin', 'lsp_certificates.*')
                    ->get();

        $tuk = DB::table('permohonans')
                    ->where('permohonans.id_izin', $idIzin)
                    ->join('tuks', function($join){
                        $join->on('permohonans.id_izin', '=', 'tuks.id_izin')
                            ->whereNull('tuks.deleted_at');
                    })
                    ->select('permohonans.id_izin', 'tuks.*')
                    ->get();

                    

        $asesor = Asesor::where('id_izin', $idIzin)->whereNull('deleted_at')->get();

        return view('pages.admin.portal.validasi', [
            'id_permohonan' => $permohonan->id,
            'detail' => $detail[0],
            'lingkup' => $ruangLingkup,
            'skema' => $skema,
            'tuk' => $tuk,
            'asesor' => $asesor
        ]);
    }

    public function submitValidasi(Request $request){
        $data = $request->all();
        Verification::create($data);

        $idIzin = $data['id_izin'];
        $nama_lsp = $data['nama_lsp'];

        $permohonanUpdate = Permohonan::where('id_izin', $idIzin)->firstOrFail();
        $permohonanUpdate->status_verifikasi = Carbon::now();
        $permohonanUpdate->save();

        $logData['id_izin'] = $idIzin;
        $logData['nama_lsp'] = $nama_lsp;
        $logData['status'] = 49;
        $logData['tgl_status'] = Carbon::now();
        $logData['keterangan'] = "Permohonan Selesai Proses Validasi";
        LogStatus::create($logData);

        return redirect()->route('home')->with('success', 'Data Permohonan Berhasil Kirim Perbaikan');
    }

    public function tolakPermohonan($idIzin){
        $updatePermohonan['status_permohonan'] = 90;
        $updatePermohonan['updated_at'] = Carbon::now();
        $permohonan = TerimaPermohonan::where('id_izin', $idIzin)->firstOrFail();
        $permohonan->update($updatePermohonan);

        $permohonanUpdate = Permohonan::where('id_izin', $idIzin)->firstOrFail();
        $permohonanUpdate->status_tolak = Carbon::now();
        $permohonanUpdate->save();

        $logData['id_izin'] = $idIzin;
        $logData['nama_lsp'] = $permohonan->nama_lsp;
        $logData['status'] = 90;
        $logData['tgl_status'] = Carbon::now();
        $logData['keterangan'] = "Surat Rekomendasi Terbit";
        LogStatus::create($logData);

        Http::withHeaders([
            'app_id' => 'lisensijakon_001',
            'app_key' => '2398ffb8a517d3c77c228f5b71d68591d1f761ef3ae430b424bea194'
                ])->send('POST', 'http://api.pu.go.id/oss/staging/services/app/terimaStatusPersyaratan', [
                    'body' => '{
                        "IZINREQUEST" : {
                            "id_izin" : "'.$idIzin.'",
                            "kd_status" : "90",
                            "tgl_status" : " '. Carbon::now().'",
                            "nama_status" : "Sekretariat LPJK",
                            "keterangan" : "Dokumen Permohonan Di Tolak"
                        }
                    }'
                ])->json();

        return redirect()->route('home')->with('success', 'Data Permohonan Berhasil di Tolak');
    }

    public function SuratRekomendasi($idIzin){

        $suratRekomendasi = Letter::where('id_izin', $idIzin)->firstOrFail();
        $suratTerbit = $suratRekomendasi->surat_rekomendasi;

        $updatePermohonan['status_permohonan'] = 50;
        $updatePermohonan['updated_at'] = Carbon::now();
        $permohonan = TerimaPermohonan::where('id_izin', $idIzin)->firstOrFail();
        $permohonan->update($updatePermohonan);

        $permohonanUpdate = Permohonan::where('id_izin', $idIzin)->firstOrFail();
        $permohonanUpdate->status_permohonan = Carbon::now();
        $permohonanUpdate->save();
           
        $logData['id_izin'] = $idIzin;
        $logData['nama_lsp'] = $permohonan->nama_lsp;
        $logData['status'] = 50;
        $logData['tgl_status'] = Carbon::now();
        $logData['keterangan'] = "Surat Rekomendasi Terbit";
        LogStatus::create($logData);

        Http::withHeaders([
            'app_id' => 'lisensijakon_001',
            'app_key' => '2398ffb8a517d3c77c228f5b71d68591d1f761ef3ae430b424bea194'
                ])->send('POST', 'http://api.pu.go.id/oss/staging/services/app/terimaIzinFinal', [
                    'body' => '{
                        "IZINFINAL" : {
                            "id_izin" : "'.$idIzin.'",
                            "status_izin" : "50",
                            "keterangan" : "Surat Rekomendasi Terbit",
                            "file_lampiran" : "https://lisensijakon.pu.go.id/lsp/laravel/storage/app/public/"'. $suratTerbit .'",
                        }
                    }'
                ])->json();

        return redirect()->route('home')->with('success', 'Data Surat Rekomendasi Berhasil Kirim Ke Portal');
    }

    public function permohonanPerpanjangan($id){
        $response = Http::withHeaders([
            'app_id' => 'lisensijakon_001',
            'app_key' => '2398ffb8a517d3c77c228f5b71d68591d1f761ef3ae430b424bea194'
                ])->send('POST', 'http://api.pu.go.id/oss/staging/services/app/getPermohonan', [
                    'body' => '{
                        "dataRequest" : {
                            "id_izin" : "'.$id.'"
                        }
                    }'
                ])->json();

        $emailPermohonan = $response['LSP Unsur Pembentuk'][0]["creator"];

        $cekUser = DB::table('users')->where('email', $emailPermohonan)->first();
        $permohonan=DB::table('api_terima_permohonan')->where('id_izin', $id)->first();

        if(empty($cekUser)){

        $user = new User();
        $user->nama_lsp = $permohonan[0]->nama_lsp;
        $user->id_izin = $permohonan[0]->id_izin;
        $user->email = $response['LSP Unsur Pembentuk'][0]["creator"];
        $user->asosiasi_pendiri = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['asosiasi_pendiri_satu'];
        $user->asosiasi_pendiri_1 = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['asosiasi_pendiri_dua'];
        $user->asosiasi_pendiri_2 = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['asosiasi_pendiri_tiga'];
        $user->alamat = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['alamat'];
        $user->save();
            

        $userId= DB::table('users')->where('email', $emailPermohonan)->first();
        
        $apt = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'];
        if (!empty($apt)){
            $apt = new Administration();
            $apt->no_akta = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['no_akta'];
            $apt->nama = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['nama_lsp'];
            $apt->unsur_pembentuk = $response['LSP Unsur Pembentuk'][0]['nama_unsur'];
            $apt->nama_unsur  = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['asosiasi_pendiri_satu'];
            $apt->nama_unsur_1  = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['asosiasi_pendiri_dua'];
            $apt->nama_unsur_2  = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['asosiasi_pendiri_tiga'];
            $apt->kategori_lsp  = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['kategori_asosiasi'];
            $apt->jenis_lsp  = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['jenis_lsp'];
            $apt->provinsi = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['propinsi'];
            $apt->alamat  = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['alamat'];
            $apt->kode_pos  = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['kode_pos'];
            $apt->status_kepemilikan  = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['status_kepemilikan'];
            $apt->ketersediaan_sistem  = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['ketersediaan_sistem'];
            // sk asosiasi
            $apt->upload_persyaratan  = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['sk_akreditasi'];
            $apt->no_telp  = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['no_telpon'];
            $apt->website  = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['website'];
            $apt->email  = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['email'];
            $apt->jumlah_skema  = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['jumlah_skema'];
            $apt->akta_pendirian  = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['akta_pendirian'];
            $apt->bukti_kepemilikan  = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['bukti_kepemilikan_kantor'];
            $apt->komitmen_asesor  = $response['Surat Pernyataan Komitmen Asesor '][0]['surat_komitmen_asesor'];
            $apt->users_id  = $userId->id;
            $apt->id_izin = $permohonan->id_izin;
            $apt->save();
        }

        $lppk = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'];
        if (!empty($lppk)){
            $lppk = new Administration();
            $lppk->no_registrasi = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['no_registrasi'];
            $lppk->no_akta = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['no_sk'];
            $lppk->nama = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['nama_lsp'];
            $lppk->unsur_pembentuk = $response['LSP Unsur Pembentuk'][0]['nama_unsur'];
            $lppk->nama_unsur  = 999;
            $lppk->nama_unsur_1  = 999;
            $lppk->nama_unsur_2  = 999;
            $lppk->kategori_lsp  = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['jenis_lp'];
            $lppk->jenis_lsp  = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['jenis_lsp'];
            $lppk->provinsi = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['propinsi'];
            $lppk->alamat  = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['alamat'];
            $lppk->kode_pos  = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['kode_pos'];
            $lppk->status_kepemilikan  = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['status_kepemilikan'];
            $lppk->ketersediaan_sistem  = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['ketersediaan_sistem'];
            // sk asosiasi
            $lppk->upload_persyaratan  = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['surat_tanda_registrasi'];
            $lppk->no_telp  = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['no_telpon'];
            $lppk->website  = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['website'];
            $lppk->email  = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['email'];
            $lppk->jumlah_skema  = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['jumlah_skema'];
            $lppk->akta_pendirian  = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['sk_penetapan'];
            $lppk->bukti_kepemilikan  = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['bukti_kepemilikan_kantor'];
            $lppk->surat_akreditasi = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['surat_akreditasi'];
            $lppk->komitmen_asesor  = $response['Surat Pernyataan Komitmen Asesor '][0]['surat_komitmen_asesor'];
            $lppk->users_id  = $userId->id;
            $lppk->id_izin = $permohonan->id_izin;
            $lppk->save();
        }

        $administrasiId = DB::table('administrations')->where('id_izin', $id)->get();

        $organisasi = new OrganizationStructure();
        $organisasi->users_id = $userId->id;
        $organisasi->id_izin = $permohonan->id_izin;

        $jumlah_pengarah = count($response['Data Pengarah LSP']);

        for ($i=0; $i <= $jumlah_pengarah; $i++) { 
            if($i == 0 ){
                if(array_key_exists($i,$response['Data Pengarah LSP'])){
                    $organisasi->pengarah = $response['Data Pengarah LSP'][$i]['nama_pengarah'];
                    $organisasi->no_telp_pengarah = $response['Data Pengarah LSP'][$i]['no_telpon_pengarah'];
                }else{
                    break;
                }
            }else if($i == 1){
                if(array_key_exists($i,$response['Data Pengarah LSP'])){
                    $organisasi->pengarah_1 = $response['Data Pengarah LSP'][$i]['nama_pengarah'];
                    $organisasi->no_telp_pengarah_1 = $response['Data Pengarah LSP'][$i]['no_telpon_pengarah'];
                }else{
                    break;
                }
            }else if($i == 2){
                if(array_key_exists($i,$response['Data Pengarah LSP'])){
                    $organisasi->pengarah_2 = $response['Data Pengarah LSP'][$i]['nama_pengarah'];
                    $organisasi->no_telp_pengarah_2 = $response['Data Pengarah LSP'][$i]['no_telpon_pengarah'];
                }else{
                    break;
                }
            }else if($i == 3){
                if(array_key_exists($i,$response['Data Pengarah LSP'])){
                    $organisasi->pengarah_3 = $response['Data Pengarah LSP'][$i]['nama_pengarah'];
                    $organisasi->no_telp_pengarah_3 = $response['Data Pengarah LSP'][$i]['no_telpon_pengarah'];
                }else{
                    break;
                }
            }else if($i == 4){
                if(array_key_exists($i,$response['Data Pengarah LSP'])){
                    $organisasi->pengarah_4 = $response['Data Pengarah LSP'][$i]['nama_pengarah'];
                    $organisasi->no_telp_pengarah_4 = $response['Data Pengarah LSP'][$i]['no_telpon_pengarah'];
                }else{
                    break;
                }
            }else if($i == 5){
                if(array_key_exists($i,$response['Data Pengarah LSP'])){
                    $organisasi->pengarah_5 = $response['Data Pengarah LSP'][$i]['nama_pengarah'];
                    $organisasi->no_telp_pengarah_5 = $response['Data Pengarah LSP'][$i]['no_telpon_pengarah'];
                }else{
                    break;
                }
            }else{
                break;
            }
        }

        $organisasi->ketua = $response['Data Pengurus LSP'][0]['ketua'];
        $organisasi->no_ketua = $response['Data Pengurus LSP'][0]['no_ketua'];
        $organisasi->umum = $response['Data Pengurus LSP'][0]['umum'];
        $organisasi->no_umum = $response['Data Pengurus LSP'][0]['no_umum'];
        $organisasi->sertifikasi = $response['Data Pengurus LSP'][0]['sertifikasi'];
        $organisasi->no_sertifikasi = $response['Data Pengurus LSP'][0]['no_sertifikasi'];
        $organisasi->manajemen_mutu = $response['Data Pengurus LSP'][0]['manajamen_mutu'];
        $organisasi->no_manajemen = $response['Data Pengurus LSP'][0]['no_manajemen'];
        $organisasi->jumlah_karyawan = $response['Data Pengurus LSP'][0]['jumlah_karyawan'];
        $organisasi->upload_persyaratan = $response['Data Pengurus LSP'][0]['upload_persyaratan'];
        $organisasi->save();

        foreach($response['Ruang Lingkup LSP'] as $qualifications){
            $kualifikasi = new Qualification();
            $kualifikasi->id_izin = $permohonan->id_izin;
            $kualifikasi->users_id = $userId->id;
            $kualifikasi->klasifikasi = $qualifications['klasifikasi'];
            $kualifikasi->sub_klasifikasi = substr($qualifications['sub_klasifikasi'],2,3);
            $kualifikasi->save();
        }
    
        foreach($response['Asesor'] as $data){
            $asesor = new Asesor();
            $asesor->id_izin = $permohonan->id_izin;
            $asesor->users_id = $userId->id;
            $asesor->nama_asesor = $data['nama_asesor'];
            $asesor->slug = Str::slug($data['nama_asesor']);
            $asesor->nik = $data['nik'];
            $asesor->npwp = $data['npwp'];
            $asesor->no_telpon = $data['no_hp'];
            $asesor->alamat = $data['alamat'];
            $asesor->provinsi = $data['propinsi'];
            $asesor->kab_kota = $data['id_kabupaten_kota'];
            $asesor->tgl_lahir = $data['tanggal_lahir'];
            $asesor->tempat_lahir = $data['tempat_lahir'];
            $asesor->pendidikan = $data['pendidikan'];

            if($data['status_asesor'] != 1){
                $asesor->status_asesor = "Tidak Tetap";
            }

            if($data['status_asesor'] == 1){
                $asesor->status_asesor = "Tetap";
            }
            
            // belum ada data tercatat ?
            $asesor->tercatat = $data['status_asesor'];
            $asesor->save();

            $asesorId = Asesor::where('nik', $data['nik'])->get();
            
            $detailAsesor = new DetailAsesor();
            $detailAsesor->asesor_id =  $asesorId[0]->id;
            $detailAsesor->klasifikasi = $data['skema_diampu'];
            $detailAsesor->nrka = $data['nomor_sertifikat_skk'];
            // $detailAsesor->sub_klasifikasi = ?
            // $detailAsesor->kualifikasi = ?
            $detailAsesor->no_sertifikasi_asesor = $data['nomor_sertifikasi_asesor'];
            // $detailAsesor->sub_klasifikasi_sertifikat = ?
            // $detailAsesor->kualifikasi_sertifikat = ?
            $detailAsesor->ska = $data['sertifikat_kompetensi_kerja'];
            $detailAsesor->sertifikat_asesors = $data['sertifikat_asesor_bnsp'];
            $detailAsesor->id_izin = $permohonan->id_izin;
            $detailAsesor->users_id = $userId->id;
            $detailAsesor->save();

            $skemaAsesor = new SkemaAsesor();
            $skemaAsesor->asesor_id = $asesorId[0]->id;
            $skemaAsesor->id_izin = $permohonan->id_izin;
            $skemaAsesor->users_id = $userId->id;
            $skemaAsesor->save();
            $skemaAsesor->skema_sertifikasi = $data['jabker'];
            // $skemaAsesor->kualifikasi = ?
            // $skemaAsesor->subklasifikasi = ?      
        }

        foreach($response['Sarana dan Prasarana serta TUK'] as $tuks){
            $tuk = new Tuk();
            $tuk->users_id = $userId->id;
            $tuk->id_izin = $permohonan->id_izin;
            $tuk->nama_tuk = $tuks['nama_tuk'];
            $tuk->alamat = $tuks['alamat'];
            $tuk->upload_persyaratan = $tuks['daftar_sarana_prasarana'];
            $tuk->save();
        }

        $permohonanPerpanjangan = new Permohonan();
        $permohonanPerpanjangan->id_izin = $permohonan->id_izin;
        $permohonanPerpanjangan->administrations_id = $administrasiId[0]->id;
        $permohonanPerpanjangan->users_id = $userId->id;
        $permohonanPerpanjangan->jenis_permohonan = $permohonan->jenis_permohonan;
        $permohonanPerpanjangan->surat_permohonan = $response['Skema Sertifikasi LSP Perpanjangan'][0]['surat_permohonan'];
        $permohonanPerpanjangan->sk_lisensi = $response['Skema Sertifikasi LSP Perpanjangan'][0]['keputusan_lisensi'];
        $permohonanPerpanjangan->status_submit = $permohonan->created_at;
        
        $permohonanPerpanjangan->save();

        $dokumenPerpanjangan = new Document();
        $dokumenPerpanjangan->users_id = $userId->id;
        $dokumenPerpanjangan->sk_lisensi = $response['Skema Sertifikasi LSP Perpanjangan'][0]['keputusan_lisensi'];
        $dokumenPerpanjangan->laporan_tindak_lanjut = $response['Skema Sertifikasi LSP Perpanjangan'][0]['laporan_tindak_lanjut'];
        $dokumenPerpanjangan->rekapitulasi_laporan = $response['Skema Sertifikasi LSP Perpanjangan'][0]['laporan_penyelenggaraan'];
        $dokumenPerpanjangan->save();

        $permohonanId = DB::table('permohonans')->where('id_izin', $id)->get();

        foreach($response['Skema Sertifikasi'] as $skema){
            $permohonanSkema = new LspCertificate();
            $permohonanSkema->users_id = $userId->id;
            $permohonanSkema->id_izin = $permohonan->id_izin;
            $permohonanSkema->permohonans_id =  $permohonanId[0]->id;
            $permohonanSkema->kode_skema = $skema['kode_skema'];
            $permohonanSkema->nama_skema = $skema['nama_skema'];
            $permohonanSkema->jabker = $skema['jabker'];
            $permohonanSkema->klasifikasi = $skema['klasifikasi'];
            $permohonanSkema->sub_klasifikasi = substr($skema['sub_klasifikasi'], 2,3);
            $permohonanSkema->jenjang = $skema['jenjang'];
            $permohonanSkema->jumlah_unit = $skema['jumlah_unit'];
            $permohonanSkema->acuan_skema = $skema['acuan_skema'];
            $permohonanSkema->no_kompetensi = $skema['nomor_kompetensi'];
            $permohonanSkema->upload_persyaratan = $skema['upload_persyaratan'];
            $permohonanSkema->standar_kompetensi = $skema['standar_kompetensi'];

            if($skema['jenjang'] >= 1){
                $permohonanSkema->kualifikasi = "Operator";
            }else if($skema['jenjang'] >= 4){
                $permohonanSkema->kualifikasi = "Teknisi / Analis";
            }else if($skema['jenjang'] >= 7){
                $permohonanSkema->kualifikasi = "Ahli";
            } 

            $permohonanSkema->save();
        }

        $skemaBaru = $response['LSP - Pengajuan Jabatan Kerja Baru'];

        if (!empty($skemaBaru)) {
            foreach($response['LSP - Pengajuan Jabatan Kerja Baru'] as $baru){
                $permohonanSkema = new LspCertificate();
                $permohonanSkema->users_id = $userId->id;
                $permohonanSkema->id_izin = $permohonan->id_izin;
                $permohonanSkema->permohonans_id =  $permohonanId[0]->id;
                $permohonanSkema->kode_skema = $baru['kode_skema'];
                $permohonanSkema->nama_skema = $baru['nama_skema'];
                $permohonanSkema->jabker = $baru['nama_skema'];
                $permohonanSkema->klasifikasi = $baru['klasifikasi'];
                $permohonanSkema->sub_klasifikasi = substr($baru['sub_klasifikasi'], 2,3);
                $permohonanSkema->jenjang = 99;
                $permohonanSkema->jumlah_unit = $baru['jumlah_unit'];
                $permohonanSkema->acuan_skema = $baru['acuan_skema'];
                $permohonanSkema->upload_persyaratan = $baru['upload_persyaratan'];
                $permohonanSkema->standar_kompetensi = $baru['standar_kompetensi'];
                $permohonanSkema->kualifikasi = "Kosong";
    
                $permohonanSkema->save();
    
            }
        }

        $data['status_permohonan'] = 20;
        $data['updated_at'] = Carbon::now();
        $data['read_at'] = Carbon::now();
        $permohonanUpdate = TerimaPermohonan::where('id_izin', $id)->firstOrFail();
        $permohonanUpdate->update($data);

        $logData['id_izin'] = $permohonan->id_izin;
        $logData['nama_lsp'] = $permohonan->nama_lsp;
        $logData['status'] = 20;
        $logData['tgl_status'] = Carbon::now();
        $logData['keterangan'] = "Verifikasi Dokumen Permohonan";

        LogStatus::create($logData);

        Http::withHeaders([
            'app_id' => 'lisensijakon_001',
            'app_key' => '2398ffb8a517d3c77c228f5b71d68591d1f761ef3ae430b424bea194'
                ])->send('POST', 'http://api.pu.go.id/oss/staging/services/app/terimaStatusPersyaratan', [
                    'body' => '{
                        "IZINREQUEST" : {
                            "id_izin" : "'.$id.'",
                            "kd_status" : "20",
                            "tgl_status" : " '. Carbon::now().'",
                            "nama_status" : "Sekretariat LPJK",
                            "keterangan" : "Verifikasi Dokumen"
                        }
                    }'
                ])->json();

        return redirect()->route('portal.index');
        }

        $permohonan=DB::table('api_terima_permohonan')->where('id_izin', $id)->first();
        $userId= DB::table('users')->where('id_izin', $id)->first();

        $apt = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'];
        if (!empty($apt)){
            $apt = new Administration();
            $apt->no_akta = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['no_akta'];
            $apt->nama = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['nama_lsp'];
            $apt->unsur_pembentuk = $response['LSP Unsur Pembentuk'][0]['nama_unsur'];
            $apt->nama_unsur  = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['asosiasi_pendiri_satu'];
            $apt->nama_unsur_1  = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['asosiasi_pendiri_dua'];
            $apt->nama_unsur_2  = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['asosiasi_pendiri_tiga'];
            $apt->kategori_lsp  = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['kategori_asosiasi'];
            $apt->jenis_lsp  = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['jenis_lsp'];
            $apt->provinsi = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['propinsi'];
            $apt->alamat  = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['alamat'];
            $apt->kode_pos  = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['kode_pos'];
            $apt->status_kepemilikan  = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['status_kepemilikan'];
            $apt->ketersediaan_sistem  = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['ketersediaan_sistem'];
            // sk asosiasi
            $apt->upload_persyaratan  = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['sk_akreditasi'];
            $apt->no_telp  = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['no_telpon'];
            $apt->website  = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['website'];
            $apt->email  = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['email'];
            $apt->jumlah_skema  = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['jumlah_skema'];
            $apt->akta_pendirian  = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['akta_pendirian'];
            $apt->bukti_kepemilikan  = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['bukti_kepemilikan_kantor'];
            $apt->komitmen_asesor  = $response['Surat Pernyataan Komitmen Asesor '][0]['surat_komitmen_asesor'];
            $apt->users_id  = $userId->id;
            $apt->id_izin = $permohonan->id_izin;
            $apt->save();
        }

        $lppk = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'];
        if (!empty($lppk)){
            $lppk = new Administration();
            $lppk->no_registrasi = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['no_registrasi'];
            $lppk->no_akta = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['no_sk'];
            $lppk->nama = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['nama_lsp'];
            $lppk->unsur_pembentuk = $response['LSP Unsur Pembentuk'][0]['nama_unsur'];
            $lppk->nama_unsur  = 999;
            $lppk->nama_unsur_1  = 999;
            $lppk->nama_unsur_2  = 999;
            $lppk->kategori_lsp  = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['jenis_lp'];
            $lppk->jenis_lsp  = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['jenis_lsp'];
            $lppk->provinsi = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['propinsi'];
            $lppk->alamat  = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['alamat'];
            $lppk->kode_pos  = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['kode_pos'];
            $lppk->status_kepemilikan  = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['status_kepemilikan'];
            $lppk->ketersediaan_sistem  = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['ketersediaan_sistem'];
            // sk asosiasi
            $lppk->upload_persyaratan  = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['surat_tanda_registrasi'];
            $lppk->no_telp  = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['no_telpon'];
            $lppk->website  = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['website'];
            $lppk->email  = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['email'];
            $lppk->jumlah_skema  = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['jumlah_skema'];
            $lppk->akta_pendirian  = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['sk_penetapan'];
            $lppk->bukti_kepemilikan  = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['bukti_kepemilikan_kantor'];
            $lppk->surat_akreditasi = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['surat_akreditasi'];
            $lppk->komitmen_asesor  = $response['Surat Pernyataan Komitmen Asesor '][0]['surat_komitmen_asesor'];
            $lppk->users_id  = $userId->id;
            $lppk->id_izin = $permohonan->id_izin;
            $lppk->save();
        }   

        $administrasiId = DB::table('administrations')->where('id_izin', $id)->get();

        $organisasi = new OrganizationStructure();
        $organisasi->users_id = $userId->id;
        $organisasi->id_izin = $permohonan[0]->id_izin;

        $jumlah_pengarah = count($response['Data Pengarah LSP']);

        for ($i=0; $i <= $jumlah_pengarah; $i++) { 
            if($i == 0 ){
                if(array_key_exists($i,$response['Data Pengarah LSP'])){
                    $organisasi->pengarah = $response['Data Pengarah LSP'][$i]['nama_pengarah'];
                    $organisasi->no_telp_pengarah = $response['Data Pengarah LSP'][$i]['no_telpon_pengarah'];
                }else{
                    break;
                }
            }else if($i == 1){
                if(array_key_exists($i,$response['Data Pengarah LSP'])){
                    $organisasi->pengarah_1 = $response['Data Pengarah LSP'][$i]['nama_pengarah'];
                    $organisasi->no_telp_pengarah_1 = $response['Data Pengarah LSP'][$i]['no_telpon_pengarah'];
                }else{
                    break;
                }
            }else if($i == 2){
                if(array_key_exists($i,$response['Data Pengarah LSP'])){
                    $organisasi->pengarah_2 = $response['Data Pengarah LSP'][$i]['nama_pengarah'];
                    $organisasi->no_telp_pengarah_2 = $response['Data Pengarah LSP'][$i]['no_telpon_pengarah'];
                }else{
                    break;
                }
            }else if($i == 3){
                if(array_key_exists($i,$response['Data Pengarah LSP'])){
                    $organisasi->pengarah_3 = $response['Data Pengarah LSP'][$i]['nama_pengarah'];
                    $organisasi->no_telp_pengarah_3 = $response['Data Pengarah LSP'][$i]['no_telpon_pengarah'];
                }else{
                    break;
                }
            }else if($i == 4){
                if(array_key_exists($i,$response['Data Pengarah LSP'])){
                    $organisasi->pengarah_4 = $response['Data Pengarah LSP'][$i]['nama_pengarah'];
                    $organisasi->no_telp_pengarah_4 = $response['Data Pengarah LSP'][$i]['no_telpon_pengarah'];
                }else{
                    break;
                }
            }else if($i == 5){
                if(array_key_exists($i,$response['Data Pengarah LSP'])){
                    $organisasi->pengarah_5 = $response['Data Pengarah LSP'][$i]['nama_pengarah'];
                    $organisasi->no_telp_pengarah_5 = $response['Data Pengarah LSP'][$i]['no_telpon_pengarah'];
                }else{
                    break;
                }
            }else{
                break;
            }
        }

        $organisasi->ketua = $response['Data Pengurus LSP'][0]['ketua'];
        $organisasi->no_ketua = $response['Data Pengurus LSP'][0]['no_ketua'];
        $organisasi->umum = $response['Data Pengurus LSP'][0]['umum'];
        $organisasi->no_umum = $response['Data Pengurus LSP'][0]['no_umum'];
        $organisasi->sertifikasi = $response['Data Pengurus LSP'][0]['sertifikasi'];
        $organisasi->no_sertifikasi = $response['Data Pengurus LSP'][0]['no_sertifikasi'];
        $organisasi->manajemen_mutu = $response['Data Pengurus LSP'][0]['manajamen_mutu'];
        $organisasi->no_manajemen = $response['Data Pengurus LSP'][0]['no_manajemen'];
        $organisasi->jumlah_karyawan = $response['Data Pengurus LSP'][0]['jumlah_karyawan'];
        $organisasi->upload_persyaratan = $response['Data Pengurus LSP'][0]['upload_persyaratan'];
        $organisasi->save();

        foreach($response['Ruang Lingkup LSP'] as $qualifications){
            $kualifikasi = new Qualification();
            $kualifikasi->id_izin = $permohonan->id_izin;
            $kualifikasi->users_id = $userId->id;
            $kualifikasi->klasifikasi = $qualifications['klasifikasi'];
            $kualifikasi->sub_klasifikasi = substr($qualifications['sub_klasifikasi'],2,3);
            $kualifikasi->save();
        }
    
        foreach($response['Asesor'] as $data){
            $asesor = new Asesor();
            $asesor->id_izin = $permohonan->id_izin;
            $asesor->users_id = $userId->id;
            $asesor->nama_asesor = $data['nama_asesor'];
            $asesor->slug = Str::slug($data['nama_asesor']);
            $asesor->nik = $data['nik'];
            $asesor->alamat = $data['alamat'];

            if($data['status_asesor'] != 1){
                $asesor->status_asesor = "Tidak Tetap";
            }

            if($data['status_asesor'] == 1){
                $asesor->status_asesor = "Tetap";
            }
            
            // belum ada data tercatat ?
            $asesor->tercatat = $data['status_asesor'];
            $asesor->save();

            $asesorId = Asesor::where('nik', $data['nik'])->get();
            
            $detailAsesor = new DetailAsesor();
            $detailAsesor->asesor_id =  $asesorId[0]->id;
            $detailAsesor->klasifikasi = $data['skema_diampu'];
            // $detailAsesor->nrka = ?
            // $detailAsesor->sub_klasifikasi = ?
            // $detailAsesor->kualifikasi = ?
            // $detailAsesor->no_sertifikasi_asesor = ?
            // $detailAsesor->sub_klasifikasi_sertifikat = ?
            // $detailAsesor->kualifikasi_sertifikat = ?
            $detailAsesor->ska = $data['sertifikat_kompetensi_kerja'];
            $detailAsesor->sertifikat_asesors = $data['sertifikat_asesor_bnsp'];
            $detailAsesor->id_izin = $permohonan->id_izin;
            $detailAsesor->users_id = $userId->id;
            $detailAsesor->save();

            $skemaAsesor = new SkemaAsesor();
            $skemaAsesor->asesor_id = $asesorId[0]->id;
            $skemaAsesor->id_izin = $permohonan->id_izin;
            $skemaAsesor->users_id = $userId->id;
            $skemaAsesor->save();
            // $skemaAsesor->skema_sertifikasi = ?
            // $skemaAsesor->kualifikasi = ?
            // $skemaAsesor->subklasifikasi = ?      
        }

        foreach($response['Sarana dan Prasarana serta TUK'] as $tuks){
            $tuk = new Tuk();
            $tuk->users_id = $userId->id;
            $tuk->id_izin = $permohonan->id_izin;
            $tuk->nama_tuk = $tuks['nama_tuk'];
            $tuk->alamat = $tuks['alamat'];
            $tuk->upload_persyaratan = $tuks['daftar_sarana_prasarana'];
            $tuk->save();
        }
        
        $permohonanPerpanjangan = new Permohonan();
        $permohonanPerpanjangan->id_izin = $permohonan->id_izin;
        $permohonanPerpanjangan->administrations_id = $administrasiId[0]->id;
        $permohonanPerpanjangan->users_id = $userId->id;
        $permohonanPerpanjangan->jenis_permohonan = $permohonan->jenis_permohonan;
        $permohonanPerpanjangan->surat_permohonan = $response['Skema Sertifikasi LSP Perpanjangan'][0]['surat_permohonan'];
        $permohonanPerpanjangan->sk_lisensi = $response['Skema Sertifikasi LSP Perpanjangan'][0]['keputusan_lisensi'];
        $permohonanPerpanjangan->status_submit = $permohonan->created_at;
        
        $permohonanPerpanjangan->save();

        $dokumenPerpanjangan = new Document();
        $dokumenPerpanjangan->users_id = $userId->id;
        $dokumenPerpanjangan->sk_lisensi = $response['Skema Sertifikasi LSP Perpanjangan'][0]['keputusan_lisensi'];
        $dokumenPerpanjangan->laporan_tindak_lanjut = $response['Skema Sertifikasi LSP Perpanjangan'][0]['laporan_tindak_lanjut'];
        $dokumenPerpanjangan->rekapitulasi_laporan = $response['Skema Sertifikasi LSP Perpanjangan'][0]['laporan_penyelenggaraan'];
        $dokumenPerpanjangan->save();


        $permohonanId = DB::table('permohonans')->where('id_izin', $id)->get();

        foreach($response['Skema Sertifikasi'] as $skema){
            $permohonanSkema = new LspCertificate();
            $permohonanSkema->users_id = $userId->id;
            $permohonanSkema->id_izin = $permohonan->id_izin;
            $permohonanSkema->permohonans_id =  $permohonanId[0]->id;
            $permohonanSkema->kode_skema = $skema['kode_skema'];
            $permohonanSkema->nama_skema = $skema['nama_skema'];
            $permohonanSkema->jabker = $skema['jabker'];
            $permohonanSkema->klasifikasi = $skema['klasifikasi'];
            $permohonanSkema->sub_klasifikasi = substr($skema['sub_klasifikasi'], 2,3);
            $permohonanSkema->kualifikasi = $skema['kualifikasi'];
            $permohonanSkema->jenjang = $skema['jenjang'];
            $permohonanSkema->jumlah_unit = $skema['jumlah_unit'];
            $permohonanSkema->acuan_skema = $skema['nomor_kompetensi'];
            $permohonanSkema->upload_persyaratan = $skema['upload_persyaratan'];
            $permohonanSkema->standar_kompetensi = $skema['standar_kompetensi'];

            $permohonanSkema->save();
        }

        $skemaBaru = $response['LSP - Pengajuan Jabatan Kerja Baru'];

        if (!empty($skemaBaru)) {
            foreach($response['LSP - Pengajuan Jabatan Kerja Baru'] as $baru){
                $permohonanSkema = new LspCertificate();
                $permohonanSkema->users_id = $userId->id;
                $permohonanSkema->id_izin = $permohonan->id_izin;
                $permohonanSkema->permohonans_id =  $permohonanId[0]->id;
                $permohonanSkema->kode_skema = $baru['kode_skema'];
                $permohonanSkema->nama_skema = $baru['nama_skema'];
                $permohonanSkema->jabker = $baru['nama_skema'];
                $permohonanSkema->klasifikasi = $baru['klasifikasi'];
                $permohonanSkema->sub_klasifikasi = substr($baru['sub_klasifikasi'], 2,3);
                $permohonanSkema->jenjang = 99;
                $permohonanSkema->jumlah_unit = $baru['jumlah_unit'];
                $permohonanSkema->acuan_skema = $baru['acuan_skema'];
                $permohonanSkema->upload_persyaratan = $baru['upload_persyaratan'];
                $permohonanSkema->standar_kompetensi = $baru['standar_kompetensi'];
                $permohonanSkema->kualifikasi = "Kosong";
    
                $permohonanSkema->save();
    
            }
        }

        $data['status_permohonan'] = 20;
        $data['updated_at'] = Carbon::now();
        $data['read_at'] = Carbon::now();
        $permohonanUpdate = TerimaPermohonan::where('id_izin', $id)->firstOrFail();
        $permohonanUpdate->update($data);

        $logData['id_izin'] = $permohonan->id_izin;
        $logData['nama_lsp'] = $permohonan->nama_lsp;
        $logData['status'] = 20;
        $logData['tgl_status'] = Carbon::now();
        $logData['keterangan'] = "Verifikasi Dokumen Permohonan";

        LogStatus::create($logData);

        Http::withHeaders([
            'app_id' => 'lisensijakon_001',
            'app_key' => '2398ffb8a517d3c77c228f5b71d68591d1f761ef3ae430b424bea194'
                ])->send('POST', 'http://api.pu.go.id/oss/staging/services/app/terimaStatusPersyaratan', [
                    'body' => '{
                        "IZINREQUEST" : {
                            "id_izin" : "'.$id.'",
                            "kd_status" : "20",
                            "tgl_status" : " '. Carbon::now().'",
                            "nama_status" : "Sekretariat LPJK",
                            "keterangan" : "Verifikasi Dokumen"
                        }
                    }'
                ])->json();

        return redirect()->route('portal.index');
    }

    public function permohonanPenambahan($id){
        $response = Http::withHeaders([
            'app_id' => 'lisensijakon_001',
            'app_key' => '2398ffb8a517d3c77c228f5b71d68591d1f761ef3ae430b424bea194'
                ])->send('POST', 'http://api.pu.go.id/oss/staging/services/app/getPermohonan', [
                    'body' => '{
                        "dataRequest" : {
                            "id_izin" : "'.$id.'"
                        }
                    }'
                ])->json();

        $emailPermohonan = $response['LSP Unsur Pembentuk'][0]["creator"];

        $cekUser = DB::table('users')->where('email', $emailPermohonan)->first();
        $permohonan=DB::table('api_terima_permohonan')->where('id_izin', $id)->first();

        if(empty($cekUser)){

        $user = new User();
        $user->nama_lsp = $permohonan[0]->nama_lsp;
        $user->id_izin = $permohonan[0]->id_izin;
        $user->email = $response['LSP Unsur Pembentuk'][0]["creator"];
        $user->asosiasi_pendiri = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['asosiasi_pendiri_satu'];
        $user->asosiasi_pendiri_1 = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['asosiasi_pendiri_dua'];
        $user->asosiasi_pendiri_2 = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['asosiasi_pendiri_tiga'];
        $user->alamat = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['alamat'];
        $user->save();
            

        $userId= DB::table('users')->where('email', $emailPermohonan)->first();
        
        $apt = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'];
        if (!empty($apt)){
            $apt = new Administration();
            $apt->no_akta = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['no_akta'];
            $apt->nama = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['nama_lsp'];
            $apt->unsur_pembentuk = $response['LSP Unsur Pembentuk'][0]['nama_unsur'];
            $apt->nama_unsur  = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['asosiasi_pendiri_satu'];
            $apt->nama_unsur_1  = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['asosiasi_pendiri_dua'];
            $apt->nama_unsur_2  = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['asosiasi_pendiri_tiga'];
            $apt->kategori_lsp  = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['kategori_asosiasi'];
            $apt->jenis_lsp  = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['jenis_lsp'];
            $apt->provinsi = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['propinsi'];
            $apt->alamat  = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['alamat'];
            $apt->kode_pos  = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['kode_pos'];
            $apt->status_kepemilikan  = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['status_kepemilikan'];
            $apt->ketersediaan_sistem  = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['ketersediaan_sistem'];
            // sk asosiasi
            $apt->upload_persyaratan  = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['sk_akreditasi'];
            $apt->no_telp  = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['no_telpon'];
            $apt->website  = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['website'];
            $apt->email  = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['email'];
            $apt->jumlah_skema  = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['jumlah_skema'];
            $apt->akta_pendirian  = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['akta_pendirian'];
            $apt->bukti_kepemilikan  = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['bukti_kepemilikan_kantor'];
            $apt->komitmen_asesor  = $response['Surat Pernyataan Komitmen Asesor '][0]['surat_komitmen_asesor'];
            $apt->users_id  = $userId->id;
            $apt->id_izin = $permohonan->id_izin;
            $apt->save();
        }

        $lppk = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'];
        if (!empty($lppk)){
            $lppk = new Administration();
            $lppk->no_registrasi = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['no_registrasi'];
            $lppk->no_akta = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['no_sk'];
            $lppk->nama = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['nama_lsp'];
            $lppk->unsur_pembentuk = $response['LSP Unsur Pembentuk'][0]['nama_unsur'];
            $lppk->nama_unsur  = 999;
            $lppk->nama_unsur_1  = 999;
            $lppk->nama_unsur_2  = 999;
            $lppk->kategori_lsp  = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['jenis_lp'];
            $lppk->jenis_lsp  = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['jenis_lsp'];
            $lppk->provinsi = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['propinsi'];
            $lppk->alamat  = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['alamat'];
            $lppk->kode_pos  = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['kode_pos'];
            $lppk->status_kepemilikan  = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['status_kepemilikan'];
            $lppk->ketersediaan_sistem  = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['ketersediaan_sistem'];
            // sk asosiasi
            $lppk->upload_persyaratan  = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['surat_tanda_registrasi'];
            $lppk->no_telp  = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['no_telpon'];
            $lppk->website  = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['website'];
            $lppk->email  = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['email'];
            $lppk->jumlah_skema  = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['jumlah_skema'];
            $lppk->akta_pendirian  = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['sk_penetapan'];
            $lppk->bukti_kepemilikan  = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['bukti_kepemilikan_kantor'];
            $lppk->surat_akreditasi = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['surat_akreditasi'];
            $lppk->komitmen_asesor  = $response['Surat Pernyataan Komitmen Asesor '][0]['surat_komitmen_asesor'];
            $lppk->users_id  = $userId->id;
            $lppk->id_izin = $permohonan->id_izin;
            $lppk->save();
        }

        $administrasiId = DB::table('administrations')->where('id_izin', $id)->get();

        $organisasi = new OrganizationStructure();
        $organisasi->users_id = $userId->id;
        $organisasi->id_izin = $permohonan->id_izin;

        $jumlah_pengarah = count($response['Data Pengarah LSP']);

        for ($i=0; $i <= $jumlah_pengarah; $i++) { 
            if($i == 0 ){
                if(array_key_exists($i,$response['Data Pengarah LSP'])){
                    $organisasi->pengarah = $response['Data Pengarah LSP'][$i]['nama_pengarah'];
                    $organisasi->no_telp_pengarah = $response['Data Pengarah LSP'][$i]['no_telpon_pengarah'];
                }else{
                    break;
                }
            }else if($i == 1){
                if(array_key_exists($i,$response['Data Pengarah LSP'])){
                    $organisasi->pengarah_1 = $response['Data Pengarah LSP'][$i]['nama_pengarah'];
                    $organisasi->no_telp_pengarah_1 = $response['Data Pengarah LSP'][$i]['no_telpon_pengarah'];
                }else{
                    break;
                }
            }else if($i == 2){
                if(array_key_exists($i,$response['Data Pengarah LSP'])){
                    $organisasi->pengarah_2 = $response['Data Pengarah LSP'][$i]['nama_pengarah'];
                    $organisasi->no_telp_pengarah_2 = $response['Data Pengarah LSP'][$i]['no_telpon_pengarah'];
                }else{
                    break;
                }
            }else if($i == 3){
                if(array_key_exists($i,$response['Data Pengarah LSP'])){
                    $organisasi->pengarah_3 = $response['Data Pengarah LSP'][$i]['nama_pengarah'];
                    $organisasi->no_telp_pengarah_3 = $response['Data Pengarah LSP'][$i]['no_telpon_pengarah'];
                }else{
                    break;
                }
            }else if($i == 4){
                if(array_key_exists($i,$response['Data Pengarah LSP'])){
                    $organisasi->pengarah_4 = $response['Data Pengarah LSP'][$i]['nama_pengarah'];
                    $organisasi->no_telp_pengarah_4 = $response['Data Pengarah LSP'][$i]['no_telpon_pengarah'];
                }else{
                    break;
                }
            }else if($i == 5){
                if(array_key_exists($i,$response['Data Pengarah LSP'])){
                    $organisasi->pengarah_5 = $response['Data Pengarah LSP'][$i]['nama_pengarah'];
                    $organisasi->no_telp_pengarah_5 = $response['Data Pengarah LSP'][$i]['no_telpon_pengarah'];
                }else{
                    break;
                }
            }else{
                break;
            }
        }

        $organisasi->ketua = $response['Data Pengurus LSP'][0]['ketua'];
        $organisasi->no_ketua = $response['Data Pengurus LSP'][0]['no_ketua'];
        $organisasi->umum = $response['Data Pengurus LSP'][0]['umum'];
        $organisasi->no_umum = $response['Data Pengurus LSP'][0]['no_umum'];
        $organisasi->sertifikasi = $response['Data Pengurus LSP'][0]['sertifikasi'];
        $organisasi->no_sertifikasi = $response['Data Pengurus LSP'][0]['no_sertifikasi'];
        $organisasi->manajemen_mutu = $response['Data Pengurus LSP'][0]['manajamen_mutu'];
        $organisasi->no_manajemen = $response['Data Pengurus LSP'][0]['no_manajemen'];
        $organisasi->jumlah_karyawan = $response['Data Pengurus LSP'][0]['jumlah_karyawan'];
        $organisasi->upload_persyaratan = $response['Data Pengurus LSP'][0]['upload_persyaratan'];
        $organisasi->save();

        foreach($response['Ruang Lingkup LSP'] as $qualifications){
            $kualifikasi = new Qualification();
            $kualifikasi->id_izin = $permohonan->id_izin;
            $kualifikasi->users_id = $userId->id;
            $kualifikasi->klasifikasi = $qualifications['klasifikasi'];
            $kualifikasi->sub_klasifikasi = substr($qualifications['sub_klasifikasi'],2,3);
            $kualifikasi->save();
        }
    
        foreach($response['Asesor'] as $data){
            $asesor = new Asesor();
            $asesor->id_izin = $permohonan->id_izin;
            $asesor->users_id = $userId->id;
            $asesor->nama_asesor = $data['nama_asesor'];
            $asesor->slug = Str::slug($data['nama_asesor']);
            $asesor->nik = $data['nik'];
            $asesor->npwp = $data['npwp'];
            $asesor->no_telpon = $data['no_hp'];
            $asesor->alamat = $data['alamat'];
            $asesor->provinsi = $data['propinsi'];
            $asesor->kab_kota = $data['id_kabupaten_kota'];
            $asesor->tgl_lahir = $data['tanggal_lahir'];
            $asesor->tempat_lahir = $data['tempat_lahir'];
            $asesor->pendidikan = $data['pendidikan'];

            if($data['status_asesor'] != 1){
                $asesor->status_asesor = "Tidak Tetap";
            }

            if($data['status_asesor'] == 1){
                $asesor->status_asesor = "Tetap";
            }
            
            // belum ada data tercatat ?
            $asesor->tercatat = $data['status_asesor'];
            $asesor->save();

            $asesorId = Asesor::where('nik', $data['nik'])->get();
            
            $detailAsesor = new DetailAsesor();
            $detailAsesor->asesor_id =  $asesorId[0]->id;
            $detailAsesor->klasifikasi = $data['skema_diampu'];
            $detailAsesor->nrka = $data['nomor_sertifikat_skk'];
            // $detailAsesor->sub_klasifikasi = ?
            // $detailAsesor->kualifikasi = ?
            $detailAsesor->no_sertifikasi_asesor = $data['nomor_sertifikasi_asesor'];
            // $detailAsesor->sub_klasifikasi_sertifikat = ?
            // $detailAsesor->kualifikasi_sertifikat = ?
            $detailAsesor->ska = $data['sertifikat_kompetensi_kerja'];
            $detailAsesor->sertifikat_asesors = $data['sertifikat_asesor_bnsp'];
            $detailAsesor->id_izin = $permohonan->id_izin;
            $detailAsesor->users_id = $userId->id;
            $detailAsesor->save();

            $skemaAsesor = new SkemaAsesor();
            $skemaAsesor->asesor_id = $asesorId[0]->id;
            $skemaAsesor->id_izin = $permohonan->id_izin;
            $skemaAsesor->users_id = $userId->id;
            $skemaAsesor->save();
            $skemaAsesor->skema_sertifikasi = $data['jabker'];
            // $skemaAsesor->kualifikasi = ?
            // $skemaAsesor->subklasifikasi = ?      
        }

        foreach($response['Sarana dan Prasarana serta TUK'] as $tuks){
            $tuk = new Tuk();
            $tuk->users_id = $userId->id;
            $tuk->id_izin = $permohonan->id_izin;
            $tuk->nama_tuk = $tuks['nama_tuk'];
            $tuk->alamat = $tuks['alamat'];
            $tuk->upload_persyaratan = $tuks['daftar_sarana_prasarana'];
            $tuk->save();
        }

        $permohonanBaru = new Permohonan();
        $permohonanBaru->id_izin = $permohonan->id_izin;
        $permohonanBaru->administrations_id = $administrasiId[0]->id;
        $permohonanBaru->users_id = $userId->id;
        $permohonanBaru->jenis_permohonan = $permohonan->jenis_permohonan;
        $permohonanBaru->surat_permohonan = $response['Skema Sertifikasi LSP Penambahan'][0]['surat_permohonan'];
        $permohonanBaru->status_submit = $permohonan->created_at;

        $permohonanBaru->save();

        $permohonanId = DB::table('permohonans')->where('id_izin', $id)->get();

        foreach($response['Skema Sertifikasi'] as $skema){
            $permohonanSkema = new LspCertificate();
            $permohonanSkema->users_id = $userId->id;
            $permohonanSkema->id_izin = $permohonan->id_izin;
            $permohonanSkema->permohonans_id =  $permohonanId[0]->id;
            $permohonanSkema->kode_skema = $skema['kode_skema'];
            $permohonanSkema->nama_skema = $skema['nama_skema'];
            $permohonanSkema->jabker = $skema['jabker'];
            $permohonanSkema->klasifikasi = $skema['klasifikasi'];
            $permohonanSkema->sub_klasifikasi = substr($skema['sub_klasifikasi'], 2,3);
            $permohonanSkema->jenjang = $skema['jenjang'];
            $permohonanSkema->jumlah_unit = $skema['jumlah_unit'];
            $permohonanSkema->acuan_skema = $skema['acuan_skema'];
            $permohonanSkema->no_kompetensi = $skema['nomor_kompetensi'];
            $permohonanSkema->upload_persyaratan = $skema['upload_persyaratan'];
            $permohonanSkema->standar_kompetensi = $skema['standar_kompetensi'];

            if($skema['jenjang'] >= 1){
                $permohonanSkema->kualifikasi = "Operator";
            }else if($skema['jenjang'] >= 4){
                $permohonanSkema->kualifikasi = "Teknisi / Analis";
            }else if($skema['jenjang'] >= 7){
                $permohonanSkema->kualifikasi = "Ahli";
            } 

            $permohonanSkema->save();
        }

        $skemaBaru = $response['LSP - Pengajuan Jabatan Kerja Baru'];

        if (!empty($skemaBaru)) {
            foreach($response['LSP - Pengajuan Jabatan Kerja Baru'] as $baru){
                $permohonanSkema = new LspCertificate();
                $permohonanSkema->users_id = $userId->id;
                $permohonanSkema->id_izin = $permohonan->id_izin;
                $permohonanSkema->permohonans_id =  $permohonanId[0]->id;
                $permohonanSkema->kode_skema = $baru['kode_skema'];
                $permohonanSkema->nama_skema = $baru['nama_skema'];
                $permohonanSkema->jabker = $baru['nama_skema'];
                $permohonanSkema->klasifikasi = $baru['klasifikasi'];
                $permohonanSkema->sub_klasifikasi = substr($baru['sub_klasifikasi'], 2,3);
                $permohonanSkema->jenjang = 99;
                $permohonanSkema->jumlah_unit = $baru['jumlah_unit'];
                $permohonanSkema->acuan_skema = $baru['acuan_skema'];
                $permohonanSkema->upload_persyaratan = $baru['upload_persyaratan'];
                $permohonanSkema->standar_kompetensi = $baru['standar_kompetensi'];
                $permohonanSkema->kualifikasi = "Kosong";
    
                $permohonanSkema->save();
    
            }
        }

        $data['status_permohonan'] = 20;
        $data['updated_at'] = Carbon::now();
        $data['read_at'] = Carbon::now();
        $permohonanUpdate = TerimaPermohonan::where('id_izin', $id)->firstOrFail();
        $permohonanUpdate->update($data);

        $logData['id_izin'] = $permohonan->id_izin;
        $logData['nama_lsp'] = $permohonan->nama_lsp;
        $logData['status'] = 20;
        $logData['tgl_status'] = Carbon::now();
        $logData['keterangan'] = "Verifikasi Dokumen Permohonan";

        LogStatus::create($logData);

        Http::withHeaders([
            'app_id' => 'lisensijakon_001',
            'app_key' => '2398ffb8a517d3c77c228f5b71d68591d1f761ef3ae430b424bea194'
                ])->send('POST', 'http://api.pu.go.id/oss/staging/services/app/terimaStatusPersyaratan', [
                    'body' => '{
                        "IZINREQUEST" : {
                            "id_izin" : "'.$id.'",
                            "kd_status" : "20",
                            "tgl_status" : " '. Carbon::now().'",
                            "nama_status" : "Sekretariat LPJK",
                            "keterangan" : "Verifikasi Dokumen"
                        }
                    }'
                ])->json();

        return redirect()->route('portal.index');
        }

        $permohonan=DB::table('api_terima_permohonan')->where('id_izin', $id)->first();
        $userId= DB::table('users')->where('id_izin', $id)->first();

        $apt = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'];
        if (!empty($apt)){
            $apt = new Administration();
            $apt->no_akta = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['no_akta'];
            $apt->nama = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['nama_lsp'];
            $apt->unsur_pembentuk = $response['LSP Unsur Pembentuk'][0]['nama_unsur'];
            $apt->nama_unsur  = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['asosiasi_pendiri_satu'];
            $apt->nama_unsur_1  = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['asosiasi_pendiri_dua'];
            $apt->nama_unsur_2  = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['asosiasi_pendiri_tiga'];
            $apt->kategori_lsp  = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['kategori_asosiasi'];
            $apt->jenis_lsp  = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['jenis_lsp'];
            $apt->provinsi = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['propinsi'];
            $apt->alamat  = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['alamat'];
            $apt->kode_pos  = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['kode_pos'];
            $apt->status_kepemilikan  = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['status_kepemilikan'];
            $apt->ketersediaan_sistem  = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['ketersediaan_sistem'];
            // sk asosiasi
            $apt->upload_persyaratan  = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['sk_akreditasi'];
            $apt->no_telp  = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['no_telpon'];
            $apt->website  = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['website'];
            $apt->email  = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['email'];
            $apt->jumlah_skema  = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['jumlah_skema'];
            $apt->akta_pendirian  = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['akta_pendirian'];
            $apt->bukti_kepemilikan  = $response['Administrasi Asosiasi Profesi Terakreditasi (APT)'][0]['bukti_kepemilikan_kantor'];
            $apt->komitmen_asesor  = $response['Surat Pernyataan Komitmen Asesor '][0]['surat_komitmen_asesor'];
            $apt->users_id  = $userId->id;
            $apt->id_izin = $permohonan->id_izin;
            $apt->save();
        }

        $lppk = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'];
        if (!empty($lppk)){
            $lppk = new Administration();
            $lppk->no_registrasi = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['no_registrasi'];
            $lppk->no_akta = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['no_sk'];
            $lppk->nama = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['nama_lsp'];
            $lppk->unsur_pembentuk = $response['LSP Unsur Pembentuk'][0]['nama_unsur'];
            $lppk->nama_unsur  = 999;
            $lppk->nama_unsur_1  = 999;
            $lppk->nama_unsur_2  = 999;
            $lppk->kategori_lsp  = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['jenis_lp'];
            $lppk->jenis_lsp  = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['jenis_lsp'];
            $lppk->provinsi = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['propinsi'];
            $lppk->alamat  = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['alamat'];
            $lppk->kode_pos  = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['kode_pos'];
            $lppk->status_kepemilikan  = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['status_kepemilikan'];
            $lppk->ketersediaan_sistem  = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['ketersediaan_sistem'];
            // sk asosiasi
            $lppk->upload_persyaratan  = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['surat_tanda_registrasi'];
            $lppk->no_telp  = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['no_telpon'];
            $lppk->website  = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['website'];
            $lppk->email  = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['email'];
            $lppk->jumlah_skema  = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['jumlah_skema'];
            $lppk->akta_pendirian  = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['sk_penetapan'];
            $lppk->bukti_kepemilikan  = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['bukti_kepemilikan_kantor'];
            $lppk->surat_akreditasi = $response['Administrasi Lembaga Pendidikan dan Pelatihan Kerja (LPPK)'][0]['surat_akreditasi'];
            $lppk->komitmen_asesor  = $response['Surat Pernyataan Komitmen Asesor '][0]['surat_komitmen_asesor'];
            $lppk->users_id  = $userId->id;
            $lppk->id_izin = $permohonan->id_izin;
            $lppk->save();
        }   

        $administrasiId = DB::table('administrations')->where('id_izin', $id)->get();

        $organisasi = new OrganizationStructure();
        $organisasi->users_id = $userId->id;
        $organisasi->id_izin = $permohonan[0]->id_izin;

        $jumlah_pengarah = count($response['Data Pengarah LSP']);

        for ($i=0; $i <= $jumlah_pengarah; $i++) { 
            if($i == 0 ){
                if(array_key_exists($i,$response['Data Pengarah LSP'])){
                    $organisasi->pengarah = $response['Data Pengarah LSP'][$i]['nama_pengarah'];
                    $organisasi->no_telp_pengarah = $response['Data Pengarah LSP'][$i]['no_telpon_pengarah'];
                }else{
                    break;
                }
            }else if($i == 1){
                if(array_key_exists($i,$response['Data Pengarah LSP'])){
                    $organisasi->pengarah_1 = $response['Data Pengarah LSP'][$i]['nama_pengarah'];
                    $organisasi->no_telp_pengarah_1 = $response['Data Pengarah LSP'][$i]['no_telpon_pengarah'];
                }else{
                    break;
                }
            }else if($i == 2){
                if(array_key_exists($i,$response['Data Pengarah LSP'])){
                    $organisasi->pengarah_2 = $response['Data Pengarah LSP'][$i]['nama_pengarah'];
                    $organisasi->no_telp_pengarah_2 = $response['Data Pengarah LSP'][$i]['no_telpon_pengarah'];
                }else{
                    break;
                }
            }else if($i == 3){
                if(array_key_exists($i,$response['Data Pengarah LSP'])){
                    $organisasi->pengarah_3 = $response['Data Pengarah LSP'][$i]['nama_pengarah'];
                    $organisasi->no_telp_pengarah_3 = $response['Data Pengarah LSP'][$i]['no_telpon_pengarah'];
                }else{
                    break;
                }
            }else if($i == 4){
                if(array_key_exists($i,$response['Data Pengarah LSP'])){
                    $organisasi->pengarah_4 = $response['Data Pengarah LSP'][$i]['nama_pengarah'];
                    $organisasi->no_telp_pengarah_4 = $response['Data Pengarah LSP'][$i]['no_telpon_pengarah'];
                }else{
                    break;
                }
            }else if($i == 5){
                if(array_key_exists($i,$response['Data Pengarah LSP'])){
                    $organisasi->pengarah_5 = $response['Data Pengarah LSP'][$i]['nama_pengarah'];
                    $organisasi->no_telp_pengarah_5 = $response['Data Pengarah LSP'][$i]['no_telpon_pengarah'];
                }else{
                    break;
                }
            }else{
                break;
            }
        }

        $organisasi->ketua = $response['Data Pengurus LSP'][0]['ketua'];
        $organisasi->no_ketua = $response['Data Pengurus LSP'][0]['no_ketua'];
        $organisasi->umum = $response['Data Pengurus LSP'][0]['umum'];
        $organisasi->no_umum = $response['Data Pengurus LSP'][0]['no_umum'];
        $organisasi->sertifikasi = $response['Data Pengurus LSP'][0]['sertifikasi'];
        $organisasi->no_sertifikasi = $response['Data Pengurus LSP'][0]['no_sertifikasi'];
        $organisasi->manajemen_mutu = $response['Data Pengurus LSP'][0]['manajamen_mutu'];
        $organisasi->no_manajemen = $response['Data Pengurus LSP'][0]['no_manajemen'];
        $organisasi->jumlah_karyawan = $response['Data Pengurus LSP'][0]['jumlah_karyawan'];
        $organisasi->upload_persyaratan = $response['Data Pengurus LSP'][0]['upload_persyaratan'];
        $organisasi->save();

        foreach($response['Ruang Lingkup LSP'] as $qualifications){
            $kualifikasi = new Qualification();
            $kualifikasi->id_izin = $permohonan->id_izin;
            $kualifikasi->users_id = $userId->id;
            $kualifikasi->klasifikasi = $qualifications['klasifikasi'];
            $kualifikasi->sub_klasifikasi = substr($qualifications['sub_klasifikasi'],2,3);
            $kualifikasi->save();
        }
    
        foreach($response['Asesor'] as $data){
            $asesor = new Asesor();
            $asesor->id_izin = $permohonan->id_izin;
            $asesor->users_id = $userId->id;
            $asesor->nama_asesor = $data['nama_asesor'];
            $asesor->slug = Str::slug($data['nama_asesor']);
            $asesor->nik = $data['nik'];
            $asesor->alamat = $data['alamat'];

            if($data['status_asesor'] != 1){
                $asesor->status_asesor = "Tidak Tetap";
            }

            if($data['status_asesor'] == 1){
                $asesor->status_asesor = "Tetap";
            }
            
            // belum ada data tercatat ?
            $asesor->tercatat = $data['status_asesor'];
            $asesor->save();

            $asesorId = Asesor::where('nik', $data['nik'])->get();
            
            $detailAsesor = new DetailAsesor();
            $detailAsesor->asesor_id =  $asesorId[0]->id;
            $detailAsesor->klasifikasi = $data['skema_diampu'];
            // $detailAsesor->nrka = ?
            // $detailAsesor->sub_klasifikasi = ?
            // $detailAsesor->kualifikasi = ?
            // $detailAsesor->no_sertifikasi_asesor = ?
            // $detailAsesor->sub_klasifikasi_sertifikat = ?
            // $detailAsesor->kualifikasi_sertifikat = ?
            $detailAsesor->ska = $data['sertifikat_kompetensi_kerja'];
            $detailAsesor->sertifikat_asesors = $data['sertifikat_asesor_bnsp'];
            $detailAsesor->id_izin = $permohonan->id_izin;
            $detailAsesor->users_id = $userId->id;
            $detailAsesor->save();

            $skemaAsesor = new SkemaAsesor();
            $skemaAsesor->asesor_id = $asesorId[0]->id;
            $skemaAsesor->id_izin = $permohonan->id_izin;
            $skemaAsesor->users_id = $userId->id;
            $skemaAsesor->save();
            // $skemaAsesor->skema_sertifikasi = ?
            // $skemaAsesor->kualifikasi = ?
            // $skemaAsesor->subklasifikasi = ?      
        }

        foreach($response['Sarana dan Prasarana serta TUK'] as $tuks){
            $tuk = new Tuk();
            $tuk->users_id = $userId->id;
            $tuk->id_izin = $permohonan->id_izin;
            $tuk->nama_tuk = $tuks['nama_tuk'];
            $tuk->alamat = $tuks['alamat'];
            $tuk->upload_persyaratan = $tuks['daftar_sarana_prasarana'];
            $tuk->save();
        }
        
        $permohonanBaru = new Permohonan();
        $permohonanBaru->id_izin = $permohonan->id_izin;
        $permohonanBaru->administrations_id = $administrasiId[0]->id;
        $permohonanBaru->users_id = $userId->id;
        $permohonanBaru->jenis_permohonan = $permohonan->jenis_permohonan;
        $permohonanBaru->surat_permohonan = $response['Skema Sertifikasi LSP Penambahan'][0]['surat_permohonan'];
        $permohonanBaru->status_submit = $permohonan->created_at;
        $permohonanBaru->save();


        $permohonanId = DB::table('permohonans')->where('id_izin', $id)->get();

        foreach($response['Skema Sertifikasi'] as $skema){
            $permohonanSkema = new LspCertificate();
            $permohonanSkema->users_id = $userId->id;
            $permohonanSkema->id_izin = $permohonan->id_izin;
            $permohonanSkema->permohonans_id =  $permohonanId[0]->id;
            $permohonanSkema->kode_skema = $skema['kode_skema'];
            $permohonanSkema->nama_skema = $skema['nama_skema'];
            $permohonanSkema->jabker = $skema['jabker'];
            $permohonanSkema->klasifikasi = $skema['klasifikasi'];
            $permohonanSkema->sub_klasifikasi = substr($skema['sub_klasifikasi'], 2,3);
            $permohonanSkema->kualifikasi = $skema['kualifikasi'];
            $permohonanSkema->jenjang = $skema['jenjang'];
            $permohonanSkema->jumlah_unit = $skema['jumlah_unit'];
            $permohonanSkema->acuan_skema = $skema['nomor_kompetensi'];
            $permohonanSkema->upload_persyaratan = $skema['upload_persyaratan'];
            $permohonanSkema->standar_kompetensi = $skema['standar_kompetensi'];

            $permohonanSkema->save();
        }

        $skemaBaru = $response['LSP - Pengajuan Jabatan Kerja Baru'];

        if (!empty($skemaBaru)) {
            foreach($response['LSP - Pengajuan Jabatan Kerja Baru'] as $baru){
                $permohonanSkema = new LspCertificate();
                $permohonanSkema->users_id = $userId->id;
                $permohonanSkema->id_izin = $permohonan->id_izin;
                $permohonanSkema->permohonans_id =  $permohonanId[0]->id;
                $permohonanSkema->kode_skema = $baru['kode_skema'];
                $permohonanSkema->nama_skema = $baru['nama_skema'];
                $permohonanSkema->jabker = $baru['nama_skema'];
                $permohonanSkema->klasifikasi = $baru['klasifikasi'];
                $permohonanSkema->sub_klasifikasi = substr($baru['sub_klasifikasi'], 2,3);
                $permohonanSkema->jenjang = 99;
                $permohonanSkema->jumlah_unit = $baru['jumlah_unit'];
                $permohonanSkema->acuan_skema = $baru['acuan_skema'];
                $permohonanSkema->upload_persyaratan = $baru['upload_persyaratan'];
                $permohonanSkema->standar_kompetensi = $baru['standar_kompetensi'];
                $permohonanSkema->kualifikasi = "Kosong";
    
                $permohonanSkema->save();
    
            }
        }

        $data['status_permohonan'] = 20;
        $data['updated_at'] = Carbon::now();
        $data['read_at'] = Carbon::now();
        $permohonanUpdate = TerimaPermohonan::where('id_izin', $id)->firstOrFail();
        $permohonanUpdate->update($data);

        $logData['id_izin'] = $permohonan->id_izin;
        $logData['nama_lsp'] = $permohonan->nama_lsp;
        $logData['status'] = 20;
        $logData['tgl_status'] = Carbon::now();
        $logData['keterangan'] = "Verifikasi Dokumen Permohonan";

        LogStatus::create($logData);

        Http::withHeaders([
            'app_id' => 'lisensijakon_001',
            'app_key' => '2398ffb8a517d3c77c228f5b71d68591d1f761ef3ae430b424bea194'
                ])->send('POST', 'http://api.pu.go.id/oss/staging/services/app/terimaStatusPersyaratan', [
                    'body' => '{
                        "IZINREQUEST" : {
                            "id_izin" : "'.$id.'",
                            "kd_status" : "20",
                            "tgl_status" : " '. Carbon::now().'",
                            "nama_status" : "Sekretariat LPJK",
                            "keterangan" : "Verifikasi Dokumen"
                        }
                    }'
                ])->json();

        return redirect()->route('portal.index');
    }
}