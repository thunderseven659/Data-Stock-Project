<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Controller_read extends Controller
{
    function show(){
        return view('read');
    }
}
