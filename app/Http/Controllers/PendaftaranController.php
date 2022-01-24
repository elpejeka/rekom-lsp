<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Association;

class PendaftaranController extends Controller
{
    public function RegistrationForm()
    {
        $asosiasi = Association::all();
        return view('auth.register', [
            'asosiasi' => $asosiasi
        ]);
    }
}
