<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetailAsesor extends Model
{
    use SoftDeletes;

    protected $table = 'detail_asesor';

    protected $fillable = [
        'asesor_id', 'klasifikasi', 'subklasifikasi', 'kualifikasi',
        'nrka','no_sertifikat_asesor', 'sub_klasifikasi_sertifikat',
        'kualifikasi_sertifikat', 'ska' , 'sertifikat_asesors', 'users_id',
        'tgl_akhir_sertifikat_asesor','tgl_akhir_sertifikat_kompetensi',
    ];

    protected $hidden = [];

    public function asesor(){
        return $this->belongsTo(DetailAsesor::class, 'asesor_id', 'id');
    }
    
}
