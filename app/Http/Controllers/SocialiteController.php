<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;

class SocialiteController
{
    public function ShowLogInForm(){
        return view('login');
    }
    public function login(Request $req){
        $cred = $req -> validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if(!Auth::attempt($cred)){
            return response()->json([
                'email' => 'Invalid Credentials'
            ],401);
            
        }
        return response()->json([
            'message' => 'User logged in successfully',
            'routes' => route('dashboard')
        ]);
        
    }
    public function ridirectToProvider($provider){
        return Socialite::driver($provider)->redirect();
    }

    public function logout(Request $req){
        Auth::logout();
        $req->session()->invalidate();
        $req->session()->regenerateToken();
        return redirect()->route('login');
    }

    public function providerAuth($provider) {

        $providerUser = Socialite::driver($provider)->stateless()->user();

        $arrayName = explode(" ", $providerUser->name);

        $firstname = $arrayName[0];
        $lastname = end($arrayName);

        $user = User::where('provider_id', $providerUser->id)->first();

        if(!$user){
            $user = User::create([
                'firstname' => $firstname,
                'middlename' => $providerUser->middlename,
                'lastname' => $lastname,
                'email' => $providerUser->email,
                'provider' => $provider,
                'provider_id' => $providerUser->id,
                'password' => bcrypt('password')

            ]);
            Auth::login($user);

            $user = Auth::user();

            return redirect()->route('dashboard');
        }
        Auth::login($user);
        $user = Auth::user();
        return redirect()->route('dashboard');
    }
}