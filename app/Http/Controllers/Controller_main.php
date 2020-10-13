<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Controller_main extends Controller
{
    function logout(){
        Auth::logout();
        return redirect('/');
    }
}
