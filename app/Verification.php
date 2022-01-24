<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Verification extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'permohonans_id', 'verifikasi_surat', 'verifikasi_asosiasi' ,'verifikasi_organisasi', 'verifikasi_klasifikasi' ,'verifikasi_skema', 'verifikasi_asesor','verifikasi_tuk', 'verifikasi_komitmen', 'verifikasi_sk', 'verifikasi_laporan', 'verifikasi_rekapitulasi','verifikasi_acuan',
         'validasi_surat','validasi_asosiasi' ,'validasi_organisasi', 'validasi_skema', 'validasi_asesor', 'validasi_tuk', 'validasi_klasifikasi',  'validasi_komitmen', 'validasi_sk', 'validasi_laporan', 'validasi_rekapitulasi' , 'verifikasi_akta', 'validasi_akta', 'validasi_acuan'
    ];

    protected $hidden=[];

    public function permohonan_2(){
        return $this->belongsTo(Permohonan::class, 'permohonans_id', 'id');
    }
}
