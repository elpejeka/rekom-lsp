<?php

namespace App\Http\Controllers\Integrasi;

use App\Http\Controllers\Controller;
use App\LSPIntegration;
use App\Pencatatan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class IntegrasiController extends Controller
{
    public function index(){
        $title = 'Detail Permohonan Penggunaan Aplikasi LPJK - LSP';
        $data = LSPIntegration::where('user_id', Auth::user()->id)->first();
        if(!$data){
            $title = 'Permohonan Penggunaan Aplikasi LPJK - LSP';
            return view('integrasi.add', compact('title'));
        }
        return view('integrasi.detail', compact('title', 'data'));
    }

    public function store(Request $request){
        try{
            DB::beginTransaction();
            $data = new LSPIntegration();
            $data->username_bnsp = $request->username_bnsp;
            $data->password_bnsp = $request->password_bnsp;
            $data->nama_ketua = $request->nama_ketua;
            $data->nik_ketua = $request->nik_ketua;
            $data->email_ketua = $request->email_ketua;
            $data->surat_permohonan = $request->file('surat_permohonan')->store('file/'.Auth::user()->id.'/surat_permohonan', 'public');
            $data->list_akun =  $request->file('list_akun')->store('file/'.Auth::user()->id.'/list_akun', 'public');
            $data->format_skema = $request->file('format_skema')->store('file/'.Auth::user()->id.'/format_skema', 'public');
            $data->user_id = Auth::user()->id;
            $data->save();
            DB::commit();

            return redirect(route('integrasi.add'))->with('success', 'Data Integrasi Berhasil di save'); 
        }catch (\Exception $e) {
            DB::rollback();
            return redirect(route('integrasi.add'));
        } 
    }

    public function edit(){
        $title = 'Edit Permohonan Penggunaan Aplikasi LPJK - LSP';
        $data = LSPIntegration::where('user_id', Auth::user()->id)
                                ->whereNull('tgl_permohonan')
                                ->first();
        return view('integrasi.edit', compact('title', 'data'));
    }

    public function update(Request $request){
        $data = LSPIntegration::where('user_id', Auth::user()->id)->first();

        try{
            DB::beginTransaction();
            $data->username_bnsp = $request->username_bnsp;
            $data->password_bnsp = $request->password_bnsp;
            $data->nama_ketua = $request->nama_ketua;
            $data->nik_ketua = $request->nik_ketua;
            $data->email_ketua = $request->email_ketua;
            $data->surat_permohonan = $request->hasFile('surat_permohonan') ? $request->file('surat_permohonan')->store('file/'.Auth::user()->id.'/surat_permohonan', 'public') : $data->surat_permohonan;
            $data->list_akun =  $request->hasFile('list_akun') ? $request->file('list_akun')->store('file/'.Auth::user()->id.'/list_akun', 'public') : $data->list_akun;
            $data->format_skema = $request->hasFile('format_skema') ? $request->file('format_skema')->store('file/'.Auth::user()->id.'/format_skema', 'public') : $data->format_skema;
            $data->user_id = Auth::user()->id; 
            $data->save();
            DB::commit();
            return redirect(route('integrasi.add'))->with('success', 'Data Integrasi Berhasil di Update');  
        }catch (\Exception $e) {
            DB::rollback();
            return redirect(route('integrasi.edit'));
        } 
    }

    public function submitPermohonan()
    {
        $data = LSPIntegration::where('user_id', Auth::user()->id)->first();
        try{
            DB::beginTransaction();
            $data->tgl_permohonan = Carbon::now();
            $data->save();
            DB::commit();
            return redirect(route('integrasi.add'))->with('success', 'Data Permohonan berhasil diajukan');
        }catch (\Exception $e) {
            DB::rollback();
            return redirect(route('integrasi.add'));
        } 
    }

    public function list()
    {
        $title = 'List Permohonan Integrasi LSP';
        $data = LSPIntegration::with(['user'])->whereNotNull('tgl_permohonan')->get();

        return view('integrasi.list', compact('title', 'data'));
    }

    public function detail($idHash)
    {
        $title = 'Detail Permohonan Integrasi LSP';
        $data = LSPIntegration::find(Crypt::decrypt($idHash));
        $pencatatan = Pencatatan::where('users_id', $data->user_id)->first();
        
        return view('integrasi.final', compact('data', 'pencatatan', 'title'));
    }
}
    