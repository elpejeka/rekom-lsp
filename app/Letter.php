<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Letter extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'permohonans_id', 'surat_rekomendasi', 'users_id'
    ];

    protected $hidden = [];
    
    public function permohonan(){
        return $this->belongsTo(Permohonan::class, 'permohonans_id', 'id');
    }
    
}
