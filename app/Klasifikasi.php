<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Klasifikasi extends Model
{
    protected $table = 'klasifikasi';

    public function kualifikasi(){
        return $this->hasMany(Qualification::class, 'klasifikasi', 'kode');
    }

    public function sertifikat(){
        return $this->hasMany(PencatatanSertifikat::class, 'klasifikasi', 'kode');
    }
}
