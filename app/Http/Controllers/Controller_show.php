<?php

namespace App\Http\Controllers;

use App\Barang;
use Illuminate\Http\Request;

class Controller_show extends Controller
{
    function showGenerateCode(){
        $table=Barang::getBarang();
        return view('main.generate_code',['table'=>$table]);

    }
}
