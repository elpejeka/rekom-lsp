<?php

namespace App\Http\Controllers\Pencatatan;

use App\Administration;
use App\Http\Controllers\Controller;
use App\Http\Requests\Pencatatan\SkemaRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Jabker;
use App\Pencatatan;
use App\PencatatanSkema;
use Illuminate\Support\Facades\Auth;
use App\LogPencatatan;
use App\LogSkema;
use Carbon\Carbon;

class SkemaController extends Controller
{

    public function index(){
        $jabker = DB::table('jabker_02')->orderBy('id', 'asc')->get();
        $permohonan = Pencatatan::where('users_id', Auth::user()->id)->get();
        $skema = PencatatanSkema::where('users_id', Auth::user()->id)->get();
        return view('pages.user.catat.skema', [
            'items' => $jabker,
            'permohonan' => $permohonan,
            'skema' => $skema,
            'title' => "Skema Sertifikasi"
        ]);
    }

    public function store(SkemaRequest $request){
        $item = Pencatatan::where('users_id', Auth::user()->id)->first();
        $administrasi = Administration::where('users_id', Auth::user()->id)->first();
        $data = $request->all();
        $data['users_id'] = Auth::user()->id;

        if($request->hasFile('upload_persyaratan')){
            $data['upload_persyaratan'] = $request->file('upload_persyaratan')->store(
                'file/skema/1', 'public'
        );
        }else{
            $data['upload_persyaratan'] = 'file/pencatatan/1/nofile.pdf';
        }

        if($item->approve != null){
            $notif = new LogPencatatan;
            $notif->nama_lsp = $administrasi->nama;
            $notif->keterangan = 'Permohonan Pencatatan Skema';
            $notif->created_at = Carbon::now();
            $notif->save();
        }

        PencatatanSkema::create($data);
        return redirect(route('pencatatan.skema'))->with('success', 'Pencatatan Skema Berhasil diSimpan');
    }

    public function edit($id){
        $data = PencatatanSkema::findOrFail($id);
        $permohonan = Pencatatan::where('users_id', Auth::user()->id)->get();
        $jabker = DB::table('jabker_02')->get();

        return view('pages.user.catat.edit.skema', [
            'data' => $data,
            'permohonan' => $permohonan,
            'items' => $jabker,
            'title' => "Edit Skema"
        ]);
    }

    public function update(Request $request, $id){
        $item = PencatatanSkema::findOrFail($id);
        $data = $request->all();


        if($request->hasFile('upload_persyaratan')){
            $data['upload_persyaratan'] = $request->file('upload_persyaratan')->store(
                'file/skema/1', 'public'
        );
        }else{
            $data['upload_persyaratan'] = $item->upload_persyaratan;
        }


        if($item->approve == 1){
            LogSkema::create([
                'file' => $item->upload_persyaratan,
                'user_id' => Auth::user()->id
            ]);
        }

        $item->update($data);

        return redirect()->route('pencatatan.skema')->with('success', 'Data Skema Berhasil di Update');
    }

    public function destroy($id){
        $data= PencatatanSkema::findOrFail($id);
        $data->delete();

        return redirect()->route('pencatatan.skema')->with('success', 'Data Skema Berhasil di Hapus');
    }

    public function showSkema($id){
        $skema = PencatatanSkema::find($id);

        return response()->json($skema);
    }

    public function approveSkema(Request $request){
        $id = $request->id;
        $skema = PencatatanSkema::find($id);
        $skema->nama_skema = $request->nama_skema;
        $skema->approve = $request->approve == 1 ? 1 : 0;
        $skema->no_pencatatan = $request->approve == 1 ? $request->no_pencatatan : null;

        $skema->save();
        return response()->json($skema);
    }

    public function unapprove($id){
        $skema = PencatatanSkema::find($id);
        $skema->approve = null;
        $skema->no_pencatatan = null;
        $skema->save();

        return redirect()->route('pencatatan.approve.list')->with('success', 'Data Skema Tidak Tayang');
    }

    public function saveAJJ(Request $request){
        $skemaID = $request->skema_id;

        $skema = PencatatanSkema::whereIn('id', $skemaID)->get();

        foreach($skema as $s){
            $s->is_ajj = $s->is_ajj == 1 ? false : true ;
            $s->save();
        }

        return response()->json([
            'status' => "success"
        ]);
    }

}
