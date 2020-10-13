<?php

namespace App\Http\Controllers;

use App\Barang;
use Illuminate\Http\Request;

class Controller_read extends Controller
{
    function show(){
        $table=Barang::getBarang();
        return view('main.read',['table'=>$table]);
    }
    function read()
    {

    }
}
