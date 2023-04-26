<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Propinsi extends Model
{
    use SoftDeletes;

    protected $table = 'propinsi_dagri';

    protected $fillable = [
        'id_propinsi_dagri', 'Nama', 'Nama_Singkat', 'Ibu_Kota_Propinsi'
    ];

    public function namaAsesor(){
        return $this->hasMany(PencatatanAsesor::class, 'provinsi', 'id_propinsi_dagri');
    }

    public function permohonan(){
        return $this->hasMany(Permohonan::class, 'administrations_id', 'id');
    }
}
