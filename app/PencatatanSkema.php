<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PencatatanSkema extends Model
{
    use SoftDeletes;

    protected $table = 'pencatatan_skema';

    protected $fillable = [
        'pencatatan_id', 'kode_skema', 'nama_skema', 'jabker',
        'klasifikasi', 'sub_klasifikasi','kualifikasi' ,'jumlah_unit',
        'acuan_skema', 'upload_persyaratan', 'users_id'
    ];

    protected $hidden = [];

    public function pencatatanSkema(){
        return $this->belongsTo(Pencatatan::class, 'pencatatan_id', 'id');
    }
}
