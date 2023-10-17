<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{


    use AuthenticatesUsers;

    protected function redirectTo()
    {
        $user = Auth::user();
        if($user->type=="Admin"){
                return "/admin-client/client";
            } else {
                return "/client/client";
            }
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
