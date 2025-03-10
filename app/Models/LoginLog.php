<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoginLog extends Model
{
    protected $fillable = [
        'user_id',
        'fullname',
        'email',
        'ip_address',
        'login_at'
    ];
}
