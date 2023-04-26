<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogStatus extends Model
{
    protected $table = 'log_status';

    protected $fillable = [
        'id_izin', 'nama_lsp', 'status', 'keterangan', 'tgl_status'
    ];
}
