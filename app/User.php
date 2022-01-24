<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','username', 'nama_lsp', 'alamat',
        'no_kontak', 'asosiasi_pendiri', 'approve', 'nama_penanggung_jawab',
        'asosiasi_pendiri_1','asosiasi_pendiri_2'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    function administrasi(){
        return $this->hasOne(Administration::class, 'users_id', 'id');
    }

    public function organization(){
        return $this->hasOne(OrganizationStructure::class, 'users_id', 'id');
    }

    public function klasifikasi(){
        return $this->hasMany(Qualification::class, 'users_id', 'id');
    }


    public function sertifikat_lsp(){
        return $this->hasMany(LspCertificate::class, 'users_id', 'id');
    }

    public function asesors(){
        return $this->hasMany(Asesor::class, 'users_id', 'id');
    }
    
    public function locations(){
        return $this->hasMany(Tuk::class, 'users_id', 'id');
    }

    public function status(){
        return $this->hasOne(Status::class, 'users_id', 'id');
    }

    public function permohonan(){
        return $this->hasMany(Permohonan::class, 'users_id', 'id');
    }

    public function dokumen(){
        return $this->hasOne(Document::class,'users_id', 'id');
    }
    
    public function asosiasi(){
        return $this->belongsTo(Association::class, 'asosiasi_pendiri', 'id');
    }

    public function asosiasi1(){
        return $this->belongsTo(Association::class, 'asosiasi_pendiri_1', 'id');
    }
    public function asosiasi2(){
        return $this->belongsTo(Association::class, 'asosiasi_pendiri_2', 'id');
    }
    
}
