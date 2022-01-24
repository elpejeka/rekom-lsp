<?php

namespace App\Http\Controllers\Pencatatan;

use App\Http\Controllers\Controller;
use App\Http\Requests\Pencatatan\PencatatanRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Pencatatan;
use App\Administration;
use Auth;
use PDF;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class PencatatanController extends Controller
{
    public function index(){
        $data = Administration::where('users_id', Auth::user()->id)->get();
        return view('pages.user.pencatatan.pencatatan', [
            'data' => $data
        ]);
    }

    public function store(PencatatanRequest $request){
        $item = Administration::where('users_id', Auth::user()->id)->firstOrFail();
        $data = $request->all();
        $data['slug'] = Str::slug($item->nama);
        $data['users_id'] = Auth::user()->id;

        if($request->hasFile('sk_lisensi')){
            $data['sk_lisensi'] = $request->file('sk_lisensi')->store(
                'file/pencatatan/1', 'public'
        );
        }else{
            $data['sk_lisensi'] = 'file/pencatatan/1/nofile.pdf';
        }

        if($request->hasFile('sertifikat')){
            $data['sertifikat'] = $request->file('sertifikat')->store(
                'file/pencatatan/2', 'public'
            );
        }else{
            $data['sk_lisensi'] = 'file/pencatatan/1/nofile.pdf';
        }


        if($request->hasFile('upload_persyaratan')){
            $data['upload_persyaratan'] = $request->file('upload_persyaratan')->store(
                'file/pencatatan/3', 'public'
            );
        }else{
            $data['upload_persyaratan'] = 'file/pencatatan/1/nofile.pdf';
        }

        if($request->hasFile('foto_lsp')){
            $data['foto_lsp'] = $request->file('foto_lsp')->store(
                'file/pencatatan/foto_lsp', 'public'
            );
        }else{
            $data['foto_lsp'] = 'file/pencatatan/1/nofile.pdf';
        }

        
        if($request->hasFile('logo_lsp')){
            $data['logo_lsp'] = $request->file('logo_lsp')->store(
                'file/pencatatan/logo_lsp', 'public'
            );
        }else{
            $data['logo_lsp'] = 'file/pencatatan/1/nofile.pdf';
        }
        
        Pencatatan::create($data);
        return redirect('/')->with('success', 'Permohonan Pencatatan Berhasil diSimpan');
    }

    public function edit($id){
        $data = Pencatatan::findOrFail($id);

        return view('pages.user.pencatatan.edit.edit-pencatatan', [
            'data' => $data
        ]);
    }

    public function update(Request $request, $id){
        $item = Pencatatan::findOrFail($id);

        $data = $request->all();

        if($request->hasFile('sk_lisensi')){
            $data['sk_lisensi'] = $request->file('sk_lisensi')->store(
                'file/pencatatan/1', 'public'
        );
        }else{
            $data['sk_lisensi'] = $item->sk_lisensi;
        }

        if($request->hasFile('sertifikat')){
            $data['sertifikat'] = $request->file('sertifikat')->store(
                'file/pencatatan/2', 'public'
            );
        }else{
            $data['sk_lisensi'] = $item->sertifikat;
        }


        if($request->hasFile('upload_persyaratan')){
            $data['upload_persyaratan'] = $request->file('upload_persyaratan')->store(
                'file/pencatatan/3', 'public'
            );
        }else{
            $data['upload_persyaratan'] = $item->upload_persyaratan;
        }

        if($request->hasFile('foto_lsp')){
            $data['foto_lsp'] = $request->file('foto_lsp')->store(
                'file/pencatatan/foto_lsp', 'public'
            );
        }else{
            $data['foto_lsp'] = $item->foto_lsp;
        }

        
        if($request->hasFile('logo_lsp')){
            $data['logo_lsp'] = $request->file('logo_lsp')->store(
                'file/pencatatan/logo_lsp', 'public'
            );
        }else{
            $data['logo_lsp'] = $item->logo_lsp;
        }

        $item->update($data);

        return redirect()->route('home')->with('success', 'Permohonan Penetapan Berhasil di Update');
    }

    public function surat($slug){
        $data = Pencatatan::with(['administrations', 'asesor', 'skema', 'tuk'])->where('slug', $slug)->firstOrFail();
        $qrcode = base64_encode(QrCode::format('svg')->size(200)->errorCorrection('H')->generate('string'));
        $registeredAt = $data->approve->isoFormat('D MMMM Y');

        // dd($data->administrations->nama);

        $pdf = PDF::loadView('pages.user.pdf.surat_pencatatan', [
            'qrcode' => $qrcode,
            'informasi' => $data,
            'tgl' => $registeredAt
        ]);

        return $pdf->stream('surat-pencatatan');
    }
}
