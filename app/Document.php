<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Document extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'users_id', 'sk_lisensi', 'laporan_tindak_lanjut', 'rekapitulasi_laporan',
        'id_izin','permohonan_id'
    ];

    protected $hidden = [];

    public function user(){
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
}
