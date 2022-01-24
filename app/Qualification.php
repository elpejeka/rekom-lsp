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

// public function administrations(){
//     return $this->belongsTo(Administration::class, 'adminstrations_id', 'id');
// }

}
