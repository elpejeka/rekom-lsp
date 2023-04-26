<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TerimaPermohonan extends Model
{
    protected $table = 'api_terima_permohonan';

    protected $fillable = [
        'status_permohonan', 'read_at'
    ];
}
