<?php

namespace App\Http\Controllers;

use App\PencatatanAsesor;
use Illuminate\Http\Request;

class SearchingController extends Controller
{
    public function searchAsesor(){
        $title = 'Searching Asesor';
        return view('pages.admin.searching.asesor', compact('title'));
    }

    public function getAsesor(Request $request){
        $nik = $request->nik;

        $data = PencatatanAsesor::with(['user'])->where('nik', $nik)->get();

        if(count($data) > 0){
            return response()->json($data);
        } else {
            return response()->json('NODATA');
        }
    }
}
