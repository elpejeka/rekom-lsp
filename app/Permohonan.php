<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permohonan extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'administrations_id', 'users_id', 'jenis_permohonan',
        'status_submit', ' status_verifikasi', 'status_permohonan','sk_lisensi',
        'pic', 'surat_permohonan', 'vv_berita_acara'
    ];

    protected $hidden = [];

    public function skema(){
        return $this->hasMany(LspCertificate::class, 'permohonans_id', 'id');
    }

    public function administrations(){
        return $this->belongsTo(Administration::class, 'administrations_id', 'id');
        }

    public function user(){
        return $this->belongsTo(User::class, 'users_id', 'id');
    }

    public function check(){
        return $this->hasOne(Check::class, 'permohonans_id', 'id');
    }

    public function validasi(){
        return $this->hasOne(Verification::class, 'permohonans_id', 'id');
    }
    
      public function rekomendasi(){
        return $this->hasOne(Letter::class, 'permohonans_id', 'id');    
    }
    
    public function penolakan(){
        return $this->hasOne(Penolakan::class, 'permohonan_id', 'id');
    }
}
