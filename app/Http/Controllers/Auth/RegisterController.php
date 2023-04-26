<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Association;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use illuminate\Support\Str;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */
    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nama_lsp' => ['required', 'string', 'max:255', 'unique:users'],
            'alamat' => ['required', 'string', 'max:255'],
            'no_kontak' => ['required', 'string', 'max:20'],
            'kategori_pembentuk' => ['required', 'string', 'max:255'],
            'asosiasi_pendiri' => ['required', 'string', 'max:255'],
            'asosiasi_pendiri_1' => ['string', 'max:255'],
            'asosiasi_pendiri_2' => ['string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'nama_penanggung_jawab' => ['required', 'string', 'max:255']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'nama_lsp' => $data['nama_lsp'],
            'alamat' => $data['alamat'],
            'no_kontak' => $data['no_kontak'],
            'kategori_pembentuk' => $data['kategori_pembentuk'],
            'asosiasi_pendiri' => $data['asosiasi_pendiri'],
            'asosiasi_pendiri_2' => $data['asosiasi_pendiri_1'],
            'asosiasi_pendiri_1' => $data['asosiasi_pendiri_2'],
            'email' => $data['email'],
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'nama_penanggung_jawab' => $data['nama_penanggung_jawab']
        ]);

        // if(request()->hasFile('surat_permohonan')){
        //     $surat = request()->file('surat_permohonan')->getClientOriginalName();
        //     request()->file('surat_permohonan')->storeAs('surat_permohonan', $user->id . '/' . $surat, '');
        //     $user->update(['surat_permohonan' => $surat]);
        // }
        return $user;
    }

    
}
