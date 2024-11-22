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
        'acuan_skema', 'upload_persyaratan', 'users_id', 'jenjang',
        'is_ajj', 'is_akreditasi', 'is_new', 'is_updated'
    ];

    protected $hidden = [];

    public function user(){
        return $this->belongsTo(User::class, 'users_id', 'id');
    }

    public function pencatatanSkema(){
        return $this->belongsTo(Pencatatan::class, 'pencatatan_id', 'id');
    }

    public function setJenjang($value){
        $this->attributes['jenjang'] = json_encode($value);
    }

    public function getJenjang($value){
        return $this->attributtes['jenjang'] = json_decode($value);
    }
}
