<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\OrganizationRequest;
use App\Notifications\PerbaikanNotif;
use App\OrganizationStructure;
use App\Permohonan;
use App\User;
use App\Administration;
use Auth;
use Notification;
use App\Services\Rekomendasi\OrganizationService;

class StrukturOrganisasiController extends Controller
{

    private $organizationService;

    public function __construct(OrganizationService $organizationService)
    {
        $this->middleware(['auth','verified']);
        $this->organizationService = $organizationService;
    }

    public function index(){
        $pengurus = OrganizationStructure::where('users_id', Auth::user()->id)->first();

        if(!$pengurus){
            $pengurus = null;
        }

        return view('pages.user.rekomendasi.struktur', [
            'item' => $pengurus,
            // 'pengurus' => $pengurus->count(),
            'title' => 'Struktur Organisasi'
        ]);
    }

    public function store(Request $request){
        try{
            $this->organizationService->save($request);
        }catch (\Exception $e) {
            DB::rollBack();
            return redirect(route('informasi'))->with('error', 'Data administrasi gagal di simpan');
        }
        return redirect('/')->with('success', 'Data Struktur Organisasi Berhasil di Simpan');
    }

    public function table(){
        $pengurus = OrganizationStructure::where('users_id', Auth::user()->id)->get();
        $id = OrganizationStructure::where('users_id', Auth::user()->id)->firstOrFail();
        // $permohonan = Permohonan::where('id', $id->id)->firstOrFail();
        return view('pages.user.table.organisasi', [
            'items' => $pengurus,
            // 'item' => $permohonan
        ]);
    }

    public function edit($id){
        $item = OrganizationStructure::findOrFail($id);

        return view('pages.user.rekomendasi.edit.struktur', [
            'items' => $item,
            'title' => 'Edit Struktur Organisasi'
        ]);
    }

    public function update(Request $request, $id){

        try{
            $this->organizationService->updated($request, $id);
            $user = User::where('roles', 'admin')->get();
            $administrasi = Administration::where('users_id', Auth::user()->id)->firstOrFail();
            Notification::send($user, new PerbaikanNotif($administrasi));
        }catch (\Exception $e) {
            DB::rollBack();
            return redirect(route('informasi'))->with('error', 'Data administrasi gagal di simpan');
        }

        return redirect('/')->with('success', 'Data Pengurus berhasil di update');
    }

    public function revisi($id){
        $item = OrganizationStructure::findOrFail($id);

        return view('pages.user.edit.edit_organisasi', [
            'items' => $item
        ]);
    }

}
