<?php

namespace App\Http\Controllers\Pencatatan;

use App\Http\Controllers\Controller;
use App\Http\Requests\Pencatatan\SkemaRequest;
use Illuminate\Http\Request;
use App\Jabker;
use App\Pencatatan;
use App\PencatatanSkema;
use Auth;

class SkemaController extends Controller
{
    public function index(){
        $jabker = Jabker::all();
        $permohonan = Pencatatan::where('users_id', Auth::user()->id)->get();
        $skema = PencatatanSkema::where('users_id', Auth::user()->id)->get();
        return view('pages.user.pencatatan.skema', [
            'items' => $jabker,
            'permohonan' => $permohonan,
            'skema' => $skema
        ]);
    }

    public function store(SkemaRequest $request){
        $data = $request->all();
        $data['users_id'] = Auth::user()->id;

        if($request->hasFile('upload_persyaratan')){
            $data['upload_persyaratan'] = $request->file('upload_persyaratan')->store(
                'file/skema/1', 'public'
        );
        }else{
            $data['upload_persyaratan'] = 'file/pencatatan/1/nofile.pdf';
        }

        // dd($data);

        PencatatanSkema::create($data);
        return redirect('/')->with('success', 'Pencatatan Skema Berhasil diSimpan');
    }

    public function edit($id){
        $data = PencatatanSkema::findOrFail($id);
        $permohonan = Pencatatan::where('users_id', Auth::user()->id)->get();
        $jabker = Jabker::all();
    
        return view('pages.user.pencatatan.edit.edit-skema', [
            'data' => $data,
            'permohonan' => $permohonan,
            'items' => $jabker,
            
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

        $item->update($data);

        return redirect()->route('pencatatan.skema')->with('success', 'Data Skema Berhasil di Update');  
    }

    public function destroy($id){
        $data= PencatatanSkema::findOrFail($id);
        $data->delete();

        return redirect()->route('pencatatan.skema')->with('success', 'Data Skema Berhasil di Hapus');  
    }

}
