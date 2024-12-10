<?php

namespace App\Services\Pencatatan;

use App\TxNote;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class NoteService{
    public function noteProcess($processType, $processName, $processDesc, $idProcess, $dataProcess, $description){
        $data = new TxNote();
        $data->process_type = $processType;
        $data->process_name = $processName;
        $data->process_desc = $processDesc;
        $data->id_process = $idProcess;
        $data->data = json_encode($dataProcess);
        $data->description = $description;
        $data->user_id = Auth::user()->id;
        $data->save();
    }
}
