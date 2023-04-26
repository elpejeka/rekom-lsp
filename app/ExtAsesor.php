<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExtAsesor extends Model
{
    protected $table = 'ext_asesor';

    protected $fillable = [
        'asesor_id', 'upload_persyaratan', 'tgl_mulai',
        'tgl_akhir', 'lsp_asal', 'user_id'
    ];

    public function asesor(){
        return $this->belongsTo(Asesor::class, 'asesor_id', 'id');
    }
}
