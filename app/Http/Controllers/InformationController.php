<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AdministrationRequest;
use Illuminate\Support\Facades\DB;
use App\Administration;
use App\Permohonan;
use App\User;
use App\Association;
use App\Notifications\AdministrationUpdate;
use App\Services\Rekomendasi\AdministrationService;
use illuminate\Support\Str;
use Auth;
use Notification;

class InformationController extends Controller
{

    private $administrationService;

    public function __construct(private AdministrationService $administrationService)
    {
        $this->middleware(['auth','verified']);
        $this->administrationService = $administrationService;
    }

    public function index(Request $request){
        $user_file = User::with(['asosiasi', 'asosiasi1', 'asosiasi2'])
                            ->where('id', Auth::user()->id)->firstOrFail();

        $item = Administration::with(['propinsi', 'unsur', 'unsur1', 'unsur2'])->where('users_id', Auth::user()->id)->get();
        $propinsi = DB::table('propinsi_dagri')->get();

        return view('pages.user.rekomendasi.informasi', [
            // 'item' => $permohonan,
            // 'data' => $user
            'data' => $user_file,
            'item' => $item,
            'informasi' => $item->count(),
            'propinsi' => $propinsi,
            'title' => 'Informasi Umum'
        ]);
    }

    public function store(AdministrationRequest $request){
        try{
            $this->administrationService->save($request);
        }catch (\Exception $e) {
            DB::rollBack();
            return redirect(route('informasi'))->with('error', 'Data administrasi gagal di simpan');
        }

        return redirect('/')->with('success', 'Data Administrasi Berhasil di Simpan');
    }

    public function edit($id){
        $item = Administration::findOrFail($id);
        $asosiasi = Association::all();
        $propinsi = DB::table('propinsi_dagri')->get();
        $user_file = User::with(['administrasi', 'organization', 'sertifikat_lsp', 'asesors', 'permohonan', 'asosiasi', 'asosiasi1', 'asosiasi2'])
                        ->where('id', Auth::user()->id)->firstOrFail();


        return view('pages.user.rekomendasi.edit.informasi')->with([
            'item' => $item,
            'asosiasi' => $asosiasi,
            'data' => $user_file,
            'propinsi' => $propinsi,
            'title' => 'Update Informasi Umum'
        ]);
    }

    public function update(Request $request, $id){
        try{
            $this->administrationService->updated($request, $id);
        }catch (\Exception $e) {
            DB::commit();
        }
        return redirect('/')->with('success', 'Data Administrasi berhasil di update');
    }

     public function revisi($id){
        $item = Administration::findOrFail($id);

        return view('pages.user.edit.edit_sk_menteri', [
            'item' => $item
        ]);
    }

    public function table(){
        $administrasi = Administration::where('users_id', Auth::user()->id)->get();
        $id = Administration::where('users_id', Auth::user()->id)->firstOrFail();
        // $permohonan = Permohonan::where('id', $id->id)->firstOrFail();
        return view('pages.user.table.administrasi', [
            'data' => $administrasi,
            // 'item' => $permohonan
        ]);
    }

}
