<?php

namespace App\Http\Controllers;

use App\Barang;
use Illuminate\Http\Request;

class Controller_updateDelete extends Controller
{

    function show(){
        $table=Barang::getBarang();
        return view('main.updateDelete',['table'=>$table]);
    }
}
