<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tuk extends Model
{

    use SoftDeletes;

    protected $fillable = [
        'users_id', 'kode_tuk', 'jenis_tuk', 'nama_tuk', 'alamat' , 'cakupan'
    ];

    protected $hidden = [];

    public function user(){
    return $this->belongsTo(User::class, 'users_id', 'id');
    }

    public function propinsi(){
        return $this->hasOne(Propinsi::class,'id_propinsi_dagri', 'provinsi');
    }
}
