<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PencatatanSertifikat extends Model
{
    use SoftDeletes;
    
    protected $table = 'sertifikat_asesor';

    protected $fillable = [
        'asesor_id', 'klasifikasi', 'subklasifikasi', 'no_sertifikat', 'nrka', 'masa_berlaku',
        'no_sertifikat_asesor', 'no_blanko', 'masa_berlaku_sertifikat', 'ska' , 'sertifikat_asesors', 'users_id'
    ];

    protected $hidden = [];

    public function asesor(){
        return $this->belongsTo(PencatatanAsesor::class, 'asesor_id', 'id');
    }
}
