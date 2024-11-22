<?php

namespace App\Http\Controllers\Pencatatan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\PencatatanTuk;
use App\PencatatanAsesor;
use App\PencatatanSkema;


class PencatatanBaruController extends Controller
{

    public function tuk(){
        $data = PencatatanTuk::with(['user'])
                    ->whereNull('approve')
                    ->whereNull('no_pencatatan')
                    ->where('is_new', 1)
                    ->orWhere('is_updated', 1)
                    ->get();
        $title = 'List TUK';
        return view('pages.admin.approve.tuk', compact('data', 'title'));
    }

    public function asesor(){
        $data = PencatatanAsesor::with(['user'])
                                ->whereNull("approve")
                                ->whereNull('no_pencatatan')
                                ->where('is_new', 1)
                                ->orWhere('is_updated', 1)
                                ->get();
        $title = 'List Asesor';
        return view('pages.admin.approve.asesor', compact('data', 'title'));
    }

    public function skema(){
        $data = PencatatanSkema::with(['user'])
                            ->whereNull('approve')
                            ->whereNull('no_pencatatan')
                            ->where('is_new', 1)
                            ->orWhere('is_updated', 1)
                            ->get();
        $title = 'List Skema';
        return view('pages.admin.approve.skema', compact('data', 'title'));
    }
}
