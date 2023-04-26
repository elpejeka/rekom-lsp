<?php

namespace App\Http\Controllers\Pencatatan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\KomenPencatatan;

class KomenController extends Controller
{
    public function index($id){
        $item = KomenPencatatan::where('pencatatan_id', $id)->get();

        // dd($item);

        return view('pages.user.pencatatan.list-perbaikan', [
            'item' => $item
        ]);
    }
}
