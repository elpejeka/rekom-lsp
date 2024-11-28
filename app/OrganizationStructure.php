<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrganizationStructure extends Model
{
    use SoftDeletes;

    protected $fillable = [
          'users_id', 'pengarah', 'pengarah_1', 'pengarah_2', 'pengarah_3', 'pengarah_4', 'pengarah_5',
        'ketua' ,'umum',
        'sertifikasi', 'manajemen_mutu', 'jumlah_karyawan', 'upload_persyaratan',
        'no_telp_pengarah', 'no_telp_pengarah_1', 'no_telp_pengarah_2', 'no_telp_pengarah_3',
        'no_telp_pengarah_4', 'no_telp_pengarah_5', 'no_ketua',
        'no_umum', 'no_sertifikasi', 'no_manajemen'
    ];


    protected $hidden = [];

    protected $guarded =[];

    public function user(){
        return $this->belongsTo(User::class, 'users_id', 'id');
    }

    // public function administrations(){
    //     return $this->belongsTo(Administration::class, 'adminstrations_id', 'id');
    // }
}
