<?php

namespace App\Http\Controllers\Pencatatan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Pencatatan;
use App\User;
use App\Administration;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Notifications\SubmitPencatatan;
use App\Notifications\ApprovePencatatan;
use Notification;

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

    public function submit($slug){
        $data = Pencatatan::with(['administrations', 'asesor', 'skema', 'tuk'])->where('slug', $slug)->firstOrFail();
          $user_file = User::with(['administrasi'])->where('id', $data->users_id)->firstOrFail();

        return view('pages.user.pencatatan.submit', [
            'data' => $data,
              'item' => $user_file
        ]);
    }

     public function setStatusSubmit(Request $request, $id)
    {

        $info = Administration::where('id', Auth::user()->id)->firstOrFail();
        
        $request->validate([
            'submit_pencatatan' => 'required'
        ]);

        $item = Pencatatan::findOrFail($id);
        $item->submit_pencatatan = Carbon::now();
        $item->no_pencatatan = $info->unsur_pembentuk. '-'. $item->no_urut;

        $user  = User::where('id', $item->users_id)->get();
        Notification::send($user, new SubmitPencatatan());

        $item->save();

        return redirect('/')->with('success', 'Pencatatan berhasil di submit');
    }
    
      public function listApprove(){
        $data = Pencatatan::with('administrations')->whereNotNull('submit_pencatatan')->get();
   
        return view('pages.admin.pencatatan.list', [
            'permohonan' => $data,
        ]);
    }

    public function approve($slug){
        $data = Pencatatan::with(['administrations', 'asesor', 'skema', 'tuk'])->where('slug', $slug)->firstOrFail();
        $user_file = User::with(['administrasi'])->where('id', $data->users_id)->firstOrFail();

        return view('pages.admin.pencatatan.approve', [
            'data' => $data,
            'item' => $user_file
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
        Notification::send($user, new ApprovePencatatan());

        $item->save();

        return redirect('/')->with('success', 'Pencatatan berhasil di submit');
    }
}
