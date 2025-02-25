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
            return back()->withError([
                'email' => 'Invalid Credentials'
            ])->withInput();
            
        }
        $user = Auth::user();
        return redirect()->route('dashboard');
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

        $user = User::where('provider_id', $providerUser->id)->first();

        if(!$user){
            $user = User::create([
                'name' => $providerUser->name,
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
