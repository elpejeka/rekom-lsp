<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Association extends Model
{
    public function user(){
        return $this->hasMany(User::class, 'asosiasi_pendiri', 'id');
    }

    public function user_1(){
        return $this->hasMany(User::class, 'asosiasi_pendiri_1', 'id');
    }

    public function user_2(){
        return $this->hasMany(User::class, 'asosiasi_pendiri_2', 'id');
    }
    
    public function administrasi(){
        return $this->hasMany(Administration::class, 'nama_unsur', 'id');
    }

    public function administrasi1(){
        return $this->hasMany(Administration::class, 'nama_unsur_1', 'id');
    }

    public function administrasi2(){
        return $this->hasMany(Administration::class, 'nama_unsur_2', 'id');
    }
}
