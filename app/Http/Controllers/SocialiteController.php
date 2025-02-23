<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;


class SocialiteController extends Controller
{
    
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    
    
    public function googleAuthentication()
    {
        $user = Socialite::driver('google')->user();

        dd($user);
    }
}
