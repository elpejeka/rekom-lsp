<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Penambahan extends Model
{
    use SoftDeletes;

    protected $table = 'penambahan' ;

    protected $fillable  = [
        'permohonans_id', 'no_sk', 'users_id',
        'no_lisensi', 'masa_berlaku', 'administration_id', 'organisasi_id'
    ];

    protected $hidden = [];
}
