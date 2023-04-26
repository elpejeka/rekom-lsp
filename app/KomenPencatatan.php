<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KomenPencatatan extends Model
{
    protected $table = 'komen_pencatatan';

    protected $fillable = [
        'pencatatan_id', 'check_surat', 'check_sk', 'check_sk', 'check_lisensi',
        'check_skema' , 'check_asesor', 'check_tuk', 'user_id'
    ];
}
