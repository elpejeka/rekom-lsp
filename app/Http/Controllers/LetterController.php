<?php

namespace App\Http\Controllers;

use App\Http\Requests\LetterRequest;
use Illuminate\Http\Request;
use App\Notifications\RekomendasiNotification;
use App\Permohonan;
use App\Letter;
use App\User;
use Notification;

class LetterController extends Controller
{
    public function index($id){
        $permohonan = Permohonan::findOrFail($id);
        return view('pages.user.rekomendasi', [
            'permohonan' => $permohonan
        ]);
    }

    public function store(LetterRequest $request){
        $data = $request->all();
        $data['surat_rekomendasi'] = $request->file('surat_rekomendasi')->store(
            'file/sk_asosiasi/surat_rekomendasi', 'public'
        );

        $users_id = $request->input('users_id');

        $user = User::findOrFail($users_id);

        Notification::send($user, new RekomendasiNotification($data));
    
    
        Letter::create($data);
        return redirect('/validasi')->with('success', 'Surat Rekomendasi Lisensi Berhasil di upload');
    }


}
