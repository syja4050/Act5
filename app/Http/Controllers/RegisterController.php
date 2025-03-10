<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController
{
    public function ShowRegisterForm(){
        return view('register');
    }
    public function Register(Request $req){
        $validator = Validator::make([$req->all()], [
            'firstname' => 'string|max:255',
            'middlename' => 'string|max:255',
            'lastname' => 'string|max:255',
            'email' => 'email|unique:users',
            'password' => 'min:6|confirmed',
        ]);
        if ($validator->fails()){
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $user = User::create([
            'firstname' => $req->firstname,
            'middlename' => $req->middlename,
            'lastname' => $req->lastname,
            'email' => $req->email,
            'password' => Hash::make($req->password),
        ]);
        $user->save();
        return response()->json(['message' => 'User creater successfully'], 200);
        
    }
}
