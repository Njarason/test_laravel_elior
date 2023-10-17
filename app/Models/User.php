<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;


class User extends Authenticatable implements AuthenticatableContract {
    protected $fillable = [
        'name',
        'email',
        'type',
        'password'
    ];  
}
