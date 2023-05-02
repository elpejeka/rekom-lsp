<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PencatatanTuk extends Model
{
    use SoftDeletes;

    protected $table = 'pencatatan_tuk';

    protected $fillable = [
        'pencatatan_id' , 'kode_tuk', 'jenis_tuk', 'nama_tuk',
        'alamat', 'upload_persyaratan', 'users_id', 'provinsi',
        'surat_penghapusan', 'ket_hapus'
    ];

    protected $hidden = [];

    public function pencatatanTuk(){
        return $this->belongsTo(Pencatatan::class, 'pencatatan_id', 'id');
    }

    public function propinsi(){
        return $this->belongsTo(Propinsi::class, 'provinsi', 'id_propinsi_dagri');
    }

}
