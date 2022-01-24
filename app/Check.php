<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Check extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'permohonans_id', 'status_surat', 'status_asosiasi' ,'status_organisasi', 'status_skema', 'status_asesor','status_tuk', 'status_klasifikasi', 'status_komitmen', 'status_sk', 'status_laporan', 'status_rekapitulasi', 'status_akta', 'status_acuan',
        'keterangan_surat','keterangan_asosiasi' ,'keterangan_organisasi', 'keterangan_skema', 'keterangan_asesor', 'keterangan_tuk', 'keterangan_klasifikasi', 'keterangan_komitmen', 'keterangan_sk', 'keterangan_laporan', 'keterangan_rekapitulasi', 'keterangan_akta', 'keterangan_acuan'
    ];

    protected $hidden=[];

    public function permohonan_1(){
        return $this->belongsTo(Permohonan::class, 'permohonans', 'id');
    }

}
