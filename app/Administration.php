<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Administration extends Model
{
    use SoftDeletes;

    protected $fillable = [
            'nama', 'no_akta', 'jenis_lsp', 'alamat', 'status_kepemilikan' , 'no_telp',
        'website', 'email', 'jumlah_skema', 'users_id', 'unsur_pembentuk', 
        'nama_unsur', 'kategori_lsp', 'ketersediaan_sistem', 'upload_persyaratan', 'nama_unsur_1', 
        'nama_unsur_2', 'no_registrasi',
        'kode_pos', 'akta_pendirian', 'bukti_kepemilikan', 'komitmen_asesor', 'surat_akreditasi', 'provinsi'
    ];

    protected $hidden = [

    ];
    
    public function unsur(){
        return $this->belongsTo(Association::class, 'nama_unsur', 'id');
    }

    public function unsur1(){
        return $this->belongsTo(Association::class, 'nama_unsur_1', 'id');
    }
    public function unsur2(){
        return $this->belongsTo(Association::class, 'nama_unsur_2', 'id');
    }


    public function user(){
        return $this->belongsTo(User::class, 'users_id', 'id');
    }

    // public function organization(){
    //     return $this->hasOne(OrganizationStructure::class, 'adminstrations_id', 'id');
    // }

    public function permohonan(){
        return $this->hasMany(Permohonan::class, 'administrations_id', 'id');
    }
    // public function asesors(){
    //     return $this->hasMany(Asesor::class, 'adminstrations_id', 'id');
    // }
    
    public function propinsi(){
        return $this->hasOne(Propinsi::class,'id_propinsi_dagri', 'provinsi');
    }
}
