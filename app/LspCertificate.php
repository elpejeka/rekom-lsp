<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LspCertificate extends Model
{
    
    use SoftDeletes;

    protected $fillable = [
         'users_id', 'kode_skema', 'nama_skema', 'jabker', 'permohonans_id',
        'jumlah_unit', 'acuan_skema', 'upload_persyaratan', 'klasifikasi',
        'sub_klasifikasi', 'kualifikasi', 'standar_kompetensi', 'kesesuaian', 'jenjang'
    ];

    protected $hidden = [];

    public function user(){
        return $this->belongsTo(User::class, 'users_id', 'id');
    }

    public function permohonan(){
        return $this->belongsTo(Permohonan::class, 'permohonans_id', 'id');
    }

    // public function administrations(){
    //     return $this->belongsTo(Administration::class, 'adminstrations_id', 'id');
    // }
}
