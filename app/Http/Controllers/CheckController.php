<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Check;
use PDF;

class CheckController extends Controller
{
    public function store(Request $request){
        $data = $request->all();
        $data['keterangan_skema'] = $request->nama_skema . ' ' .  $request->keterangan_skema;
        $data['keterangan_acuan'] = $request->nama_skema . ' ' .  $request->keterangan_acuan;
        Check::create($data);
        return redirect('/verifikasi')->with('success', 'Data kelengkapan berhasil dicek');
    }

    public function print_pdf($id){
        $kelengkapan = Check::where('permohonans_id', $id)->firstOrFail();

        // return view('pages.user.pdf.vv_berita_acara', [
        //     'data' => $kelengkapan
        // ]);
 
    	$pdf = PDF::loadview('pages.user.pdf.kelengkapan',[
            'data' => $kelengkapan
            ]);
        
            return $pdf->stream('dokumen-cek-kelengkapan.pdf');
        
    }

    
}
