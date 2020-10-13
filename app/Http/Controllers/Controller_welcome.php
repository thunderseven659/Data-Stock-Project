<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Controller_welcome extends Controller
{
    function show(){
        return view('login.welcome');
    }
}
