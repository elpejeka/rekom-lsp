<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Perbaikan extends Model
{
    use SoftDeletes;

    protected $table = 'komen_perbaikan';
    
    protected $fillable = [
        'users_id', 'komen', 'status_selesai'
    ];
}
