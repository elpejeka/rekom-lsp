<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permohonan;
use App\Penolakan;

class PenolakanController extends Controller
{
    public function show($id){
        $data = Permohonan::find($id);

        return response()->json($data);
        }
        
        public function keterangan($id){
            $data = Penolakan::where('permohonan_id', $id)->firstOrFail();

            return response()->json($data);
        }

    public function store(Request $request){
        $data = new Penolakan();
         $data->permohonan_id = $request->permohonan_id;
         $data->comment = $request->comment; 
        
        $data->save();
        return response()->json($data);
    }
}
