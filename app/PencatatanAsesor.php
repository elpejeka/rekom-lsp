<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PencatatanAsesor extends Model
{

    use SoftDeletes;

    protected $table = 'pencatatan_asesor';

    protected $fillable = [
        'pencatatan_id', 'nama_asesor', 'nik', 'alamat', 'status_asesor','users_id','slug',
        'no_registrasi_asesor'
    ];

    protected $hidden = [
    ];

    public function sertifikat(){
        return $this->hasMany(PencatatanSertifikat::class, 'asesor_id', 'id');
    }

    public function pencatatanAsesor(){
        return $this->belongsTo(Pencatatan::class, 'pencatatan_id', 'id');
    }
    
}
