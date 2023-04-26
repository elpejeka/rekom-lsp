<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SKLisensi extends Model
{

    use SoftDeletes;

    protected $table = 'sk_lisensi_lsp';

    protected $fillable = [
        'pencatatan_id', 'sk_lisensi', 'sertifikat_lisensi',
        'no_sk', 'no_lisensi', 'masa_berlaku_sk', 'users_id'
    ];

    public function pencatatan(){
        return $this->belongsTo(Pencatatan::class, 'pencatatan_id', 'id');
    }
}
