<?php

namespace App\Http\Controllers\Pencatatan;

use Mail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


use App\Pencatatan;
use App\User;
use App\Administration;
use App\KomenPencatatan;
use App\LogPencatatan;
use App\Perbaikan;

use Notification;
use App\Mail\IntegrasiLSP;
use App\Notifications\SubmitPencatatan;
use App\Notifications\ApprovePencatatan;
use App\Notifications\PerbaikanPencatatan;
use App\Notifications\DokumentasiAPI;
use App\Notifications\DraftSertifikat;
use App\Notifications\FormatSertifikat;

class IndexController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    public function index(){
        $data = Pencatatan::with('administrations')->where('users_id', Auth::user()->id)->get();

        return view('pages.user.pencatatan.preview', [
            'permohonan' => $data
        ]);
    }

    public function submit($id){
        $data = Pencatatan::with(['administrations', 'asesor', 'skema', 'tuk', 'legalitas'])->where('id', $id)->firstOrFail();

        $user_file = User::with(['administrasi'])->where('id', $data->users_id)->firstOrFail();

        //   dd($data);

        return view('pages.user.pencatatan.submit', [
            'data' => $data,
            'item' => $user_file
        ]);
    }

     public function setStatusSubmit(Request $request, $id)
    {

        $info = Administration::where('users_id', Auth::user()->id)->firstOrFail();
        $item = Pencatatan::findOrFail($id);
        $item->submit_pencatatan = Carbon::now();

        $tahun = $item->created_at;
        $id_tahun = substr($tahun,0,4);
        $item->no_pencatatan = $info->unsur_pembentuk. '-'. $item->no_urut.$id_tahun;

        $notif = new LogPencatatan;
        $notif->nama_lsp = $info->nama;
        $notif->keterangan = 'Permohonan Pencatatan';
        $notif->created_at = Carbon::now();
        $notif->save();

        $user  = User::where('id', $item->users_id)->get();
        Notification::send($user, new SubmitPencatatan());

        $item->save();

        return redirect('/')->with('success', 'Pencatatan berhasil di submit');
    }
    
    public function listApprove(){
        $data = Pencatatan::with('administrations')
                            ->whereNotNull('submit_pencatatan')
                            ->whereNull('approve')
                            ->get();
   
        return view('pages.admin.pencatatan.list', [
            'permohonan' => $data,
            'title' => "List Permohonan Pencatatan"
        ]);
    }

    public function selesai(){
        $data = Pencatatan::with('administrations')
                            ->whereNotNull('submit_pencatatan')
                            ->whereNotNull('approve')
                            ->get();

        return view('pages.admin.pencatatan.selesai', [
            'permohonan' => $data,
            'title' => "List LSP Pencatatan"
        ]);
    }

    public function approve($slug){
        $data = Pencatatan::with(['administrations', 'asesor', 'skema', 'tuk'])->where('slug', $slug)->firstOrFail();
        $administrasi = DB::table('administrations')
                            ->leftjoin('propinsi_dagri', 'administrations.provinsi', '=', 'propinsi_dagri.id_propinsi_dagri')
                            ->select('propinsi_dagri.Nama')
                            ->where('administrations.id', $data->administrations_id)
                            ->get();

        $user_file = User::with(['administrasi'])->where('id', $data->users_id)->firstOrFail();
        $asesor = DB::table('pencatatan_asesor')
        ->join('propinsi_dagri', 'pencatatan_asesor.provinsi', '=','propinsi_dagri.id_propinsi_dagri')
        ->select('pencatatan_asesor.*', 'propinsi_dagri.Nama')
        ->where('pencatatan_id', $data->id)
        ->get();

        return view('pages.admin.pencatatan.detail', [
            'data' => $data,
            'administrasi' => $administrasi,
            'item' => $user_file,
            'asesor' => $asesor,
            'title' => "Detail Pencatatan"
        ]);
    }

    public function setApprove(Request $request, $id)
    {      
        $request->validate([
            'approve' => 'required'
        ]);

        $item = Pencatatan::findOrFail($id);
        $item->approve = Carbon::now();

        $user  = User::where('id', $item->users_id)->get();
        Mail::to('aliefbagas04@gmail.com')->send(new IntegrasiLSP($item));
        Notification::send($user, new ApprovePencatatan());
        Notification::send($user, new DokumentasiAPI());
        Notification::send($user, new FormatSertifikat());
        Notification::send($user, new DraftSertifikat());

        $item->save();

        $emailUser = $user[0]->email;

        return redirect('/')->with('success', 'Pencatatan berhasil di submit');
    }

    public function setKomen(Request $request){
        $data = $request->all();
        $userId = $request->input('user_id');

        $user = User::where('id', $userId)->get();  
        Notification::send($user, new PerbaikanPencatatan());
     

        KomenPencatatan::create($data);

        return redirect('/pencatatan/sekretariat/list');        
    }

    public function addKomen(Request $request){
        $komen = new Perbaikan;
        $komen->komen = $request->komen;
        $komen->users_id = $request->users_id;
        $komen->save();
        return response()->json($komen);
    }

    public function kirimEmail($id){
        $user = User::find($id);

        // $userEmail = $item->email;

        // // dd($userEmail);

        // Mail::to($userEmail)->send(new IntegrasiLSP($item));

        Notification::send($user, new DokumentasiAPI());
        Notification::send($user, new FormatSertifikat());
        Notification::send($user, new DraftSertifikat());
        
        return redirect('/pencatatan/sekretariat/list')->with('success', 'Email Dokumentasi berhasil di kirim');
    }
}
