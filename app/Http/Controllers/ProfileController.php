<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    public function index()
    {
        return view('pages.user.profile.index',[
            'title' => "User Profile"
        ]);
    }

    public function edit(){
        return view('pages.user.profile.edit', [
            'title' => "Edit Profile"
        ]);
    }

    public function update(Request $request){

        $user = User::findOrFail(Auth::user()->id);

        DB::beginTransaction();

        $user->email = $request->email;
        $user->username = $request->username;
        $user->nama_lsp = $request->nama_lsp;

        if($request->password){
            $user->password = Hash::make($request->password);
        }

        $user->save();

        DB::commit();

        return redirect(route('user.profile'))->with('success', 'Update Profile Successfully');
    }
}
