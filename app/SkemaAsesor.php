<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SkemaAsesor extends Model
{
    use SoftDeletes;

    protected $table = 'skema_asesor';

    protected $fillable = [
        'skema_sertifikasi', 'kualifikasi', 'subklasifikasi',
        'asesor_id', 'users_id'
    ];

    public function asesor(){
        return $this->belongsTo(Asesor::class, 'asesor_id', 'id');
    }

}
