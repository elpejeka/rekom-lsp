<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Administration;
use App\Permohonan;
use App\User;
use App\Http\Requests\PermohonanRequest;
use App\Notifications\PerbaikanNotif;
use Carbon\Carbon;
use PDF;
use Auth;
use Notification;



class PermohonanController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    public function index(){
        $data = Administration::where('users_id', Auth::user()->id)->get();
        return view('pages.user.permohonan',[
            'data' => $data
        ]);
    }

    public function store(PermohonanRequest $request){
        $data = $request->all();
        $data['users_id'] = Auth::user()->id;
        $data['surat_permohonan'] = $request->file('surat_permohonan')->store(
            'file/surat_permohonan', 'public'
        );
        
        if($request->hasFile('sk_lisensi')){
            $data['sk_lisensi'] = $request->file('sk_lisensi')->store(
                'file/surat_permohonan/sk_lisensi', 'public'
            );
        }else{
            $data['sk_lisensi'] = 'file/surat_permohonan/sk_lisensi/nofile.pdf';
        }
        
        Permohonan::create($data);

        return redirect('/')->with('success', 'Permohonan Berhasil di Simpan');
    }
    
    public function edit($id){
        $item = Permohonan::findOrFail($id);

        return view('pages.user.edit.edit_permohonan',[
            'item' => $item
        ]);
    }

    public function update(Request $request, $id){
        // $data = $request->all();
        
        $data['surat_permohonan'] = $request->file('surat_permohonan')->store(
            'file/surat_permohonan', 'public'
        );

        $item = Permohonan::findOrFail($id);
        $item->update($data);
        
        
        $user = User::where('roles', 'admin')->get();
        $administrasi = Administration::where('users_id', Auth::user()->id)->firstOrFail();
        Notification::send($user, new PerbaikanNotif($administrasi));

        return redirect('/')->with('success', 'Data Permohonan berhasil di update');
    }

    public function surat_permohonan($id){
        $user = Permohonan::with('administrations', 'user')->where('id', $id)->firstOrFail();
        
        // dd($permohonan);x
        $user_file = User::with(['administrasi', 'organization', 'sertifikat_lsp', 'asesors', 'permohonan'])
                            ->where('id', $user->users_id)->firstOrFail();

        $tgl = Carbon::now()->isoFormat('D MMMM Y');

        $pdf = PDF::loadview('pages.user.pdf.surat_rekomendasi', [
            'data' => $user_file,
            'permohonan' => $user,
            'tgl' => $tgl
        ]);

        return $pdf->download('surat-persetujuan');
    }

}
