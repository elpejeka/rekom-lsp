<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class LSPIntegration extends Model
{
    protected $table = 'lsp_integrations';
    
    protected $guarded= [];

    protected $appends = ['id_hash'];

    public function getIdHashAttribute(){
        return Crypt::encrypt($this->id);
    }

    public function scopeDecrypt($query, $id_hash){
        $id = Crypt::decrypt($id_hash);
        return $id;
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
