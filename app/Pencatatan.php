<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Alfa6661\AutoNumber\AutoNumberTrait;

class Pencatatan extends Model
{
    use SoftDeletes;
    use AutoNumberTrait;

    protected $table = 'pencatatan';

    protected $fillable = [
        'permohonan','upload_persyaratan', 'sk_lisensi', 'sertifikat', 'users_id', 'no_sk', 'no_lisensi', 'status_sk', 'logo_lsp', 'foto_lsp',
        'submit_pencatatan', 'approve', 'administrations_id', 'slug', 'jumlah_skema', 'nib', 'ss_verif'
    ];

    protected $guarded = [];

    protected $hidden = [

    ];

    protected $casts = [
        'approve' => 'datetime'
    ];

    public function getAutoNumberOptions()
    {
        return [
            'no_urut' => [
                'length' => 3
            ]
        ];
    }

    public function administrations(){
        return $this->belongsTo(Administration::class, 'administrations_id', 'id');
        }

    public function asesor(){
        return $this->hasMany(PencatatanAsesor::class, 'pencatatan_id', 'id');
    }

    public function skema(){
        return $this->hasMany(PencatatanSkema::class, 'pencatatan_id', 'id');
    }

    public function tuk(){
        return $this->hasMany(PencatatanTuk::class, 'pencatatan_id', 'id');
    }

    public function legalitas(){
        return $this->hasMany(SKLisensi::class, 'pencatatan_id', 'id');
    }

    public function akreditasi(){
        return $this->hasMany(LegalitasKAN::class, 'pencatatan_id', 'id');
    }

}
