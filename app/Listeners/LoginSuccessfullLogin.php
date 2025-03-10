<?php

namespace App\Listeners;

use App\Models\LoginLog;
use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LoginSuccessfullLogin
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(Login $event): void
    {
        $user = $event->user;

        LoginLog::create([
            'user_id' => $user->id,
            'fullname' => $user->lastname,' ', $user->firstname,' ', $user->middlename,
            'email' => $user->email,
            'ip_address' => request()->ip(),
            'login_at' => now(),
        ]);
    }
}
