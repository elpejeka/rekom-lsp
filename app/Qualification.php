<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Qualification extends Model
{
 use SoftDeletes;
 
 protected $fillable = [
    'users_id', 'klasifikasi', 'sub_klasifikasi'
];

protected $hidden = [];

public function user(){
    return $this->belongsTo(User::class, 'users_id', 'id');
}

public function klas(){
    return $this->belongsTo(Klasifikasi::class, 'klasifikasi', 'kode');
}

public function subklas(){
    return $this->belongsTo(Subklasifikasi::class, 'sub_klasifikasi', 'kode_sub');
}

// public function administrations(){
//     return $this->belongsTo(Administration::class, 'adminstrations_id', 'id');
// }

}
