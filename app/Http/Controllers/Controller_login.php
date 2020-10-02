<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Controller_login extends Controller
{
    function show(){
        return view('login');
    }
    function login(Request $request){
        return view('main');
    }
}
