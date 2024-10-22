<?php

namespace App\Http\Controllers\Pencatatan;

use App\Http\Controllers\Controller;
use App\LegalitasKAN;
use App\Pencatatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Svg\Tag\Rect;

class KANController extends Controller
{
    public function index(){
        $data = LegalitasKAN::where('user_id', Auth::user()->id)->get();
        $title = 'Legalitas Akreditasi KAN';
        $permohonan = Pencatatan::where('users_id', Auth::user()->id)->get();

        return view('pages.user.catat.kan', compact('data','title', 'permohonan'));
    }

    public function store(Request $request){
        try{
            DB::beginTransaction();
            $data = new LegalitasKAN();
            $data->no_sertifikat_kan= $request->no_sertifikat_kan;
            $data->sertifikat_kan = $request->hasFile('sertifikat_kan') ? $request->file('sertifikat_kan')->store('file/sertifikat_kan', 'public') : null;
            $data->masa_berlaku = $request->masa_berlaku;
            $data->pencatatan_id = $request->pencatatan_id;
            $data->user_id = Auth::user()->id;
            $data->save();
            DB::commit();
        }catch (\Exception $e) {
            DB::rollBack();
        }
        return redirect(route('kan.index'))->with('success', 'Data legalitas Akreditasi KAN successfully');
    }

    public function edit($id_hash){
        $id = Crypt::decrypt($id_hash);
        $data = LegalitasKAN::find($id);
        $title = 'Legalitas Akreditasi KAN';
        return view('pages.user.catat.edit.kan', compact('data', 'title'));
    }

    public function update(Request $request){

        $data = LegalitasKAN::find($request->id);
        try{
            DB::beginTransaction();
            $data->no_sertifikat_kan = $request->no_sertifikat_kan;
            $data->sertifikat_kan = $data->sertifikat_kan = $request->hasFile('sertifikat_kan') ? $request->file('sertifikat_kan')->store('file/sertifikat_kan', 'public') : $data->sertifikat_kan;
            $data->masa_berlaku = $request->masa_berlaku;
            $data->save();
            DB::commit();
        }catch (\Exception $e) {
            DB::rollBack();
        }

        return redirect(route('kan.index'))->with('success', 'Data legalitas Akreditasi KAN successfully');
    }

    public function destroy($id){
        $data = LegalitasKAN::find($id);

        DB::beginTransaction();
        $data->delete();
        DB::commit();

        return redirect(route('kan.index'))->with('success', 'Data legalitas Akreditasi KAN successfully');

    }

}
