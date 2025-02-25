<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController
{
    public function ShowRegisterForm(){
        return view('register');
    }
    public function Register(Request $req){
        $req->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $user = User::create([
            'name' => $req->name,
            'email' => $req->email,
            'password' => bcrypt($req->password)
        ]);
        $user->save();
        return redirect()->route('loginForm')->with('status','Successfully Account Created');
    }
}
