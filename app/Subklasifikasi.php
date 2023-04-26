<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subklasifikasi extends Model
{
    protected $table = 'subklasifikasi';

    public function kualifikasi(){
        return $this->hasMany(Qualification::class, 'sub_klasifikasi', 'kode_sub');
    }

    public function sertifikat(){
        return $this->hasMany(PencatatanSertifikat::class, 'subklasifikasi', 'kode_sub');
    }
}
