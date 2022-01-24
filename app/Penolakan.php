<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Penolakan extends Model
{
    use SoftDeletes;

    protected $table = 'penolakan';

    protected $fillable = [
        'permohonan_id', 'comment'
    ];
    
     public function permohonan_penolakan(){
        return $this->belongsTo(Permohonan::class, 'permohonans', 'id');
    }
}
