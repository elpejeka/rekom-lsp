<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Asesor extends Model
{
    use SoftDeletes;
   
    protected $fillable = [
        'users_id', 'upload_persyaratan', 'surat_pernyataan',
        'nama_asesor', 'slug', 'nik', 'alamat', 'status_asesor', 'tercatat'
    ];


    protected $hidden = [

    ];

    public function user(){
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
    
     public function sertifikat(){
        return $this->hasMany(DetailAsesor::class, 'asesor_id', 'id');
    }

    // public function administrations(){
    //     return $this->belongsTo(Administration::class, 'adminstrations_id', 'id');
    // }
}
