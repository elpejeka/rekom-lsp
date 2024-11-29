<?php

namespace App\Services\Rekomendasi;

use App\Qualification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KualificationService {

    public function save(){
        DB::beginTransaction();
        $data = New Qualification();
        $data->klasifikasi = $request->kasifikasi;
        $data->sub_klasifikasi = $request->sub_klasifikasi;
        $data->users_id = Auth::user()->id;
        $data->save();
        DB::commit();
    }
}
