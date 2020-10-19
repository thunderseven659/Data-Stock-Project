<?php

namespace App\Http\Controllers;

use App\Barang;
use App\Detail_Transaksi;
use App\Transaksi as Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Controller_read extends Controller
{
    function show(){
        $table=Barang::getBarang();
        return view('main.read',['table'=>$table]);
    }
    function insertTransaction(Request $request)
    {

        $rule = [

            'nama_penerima'=> 'required',

        ];
        $attribute = [
            'id'=>'Id',
            'nama_penerima'=>'Nama_penerima',
            'stock'=>'Stock'
        ];
        $message = [
            'required'=> ':attribute is required'

        ];
        $this->validate($request,$rule,$message,$attribute);
        $x= Transaksi::InsertTransaction(date("Y-m-d"),Auth::user()->username,$request->nama_penerima);

        for($i=0;$i<count($request->id);$i++)
        {
            if(Barang::checkStock($request->id[$i],$request->stock[$i])==false)
            {
                Transaksi::DeleteTransaction($x->id);
                return back()->with('error','Out of Stock');
            }
        }




        for($i=0;$i<count($request->id);$i++)
        {
            if(Barang::reduceStock($request->id[$i],$request->stock[$i])==true)
            {
                Detail_Transaksi::insertTransaksiDetail($request->id[$i],$x->id,$request->stock[$i]);
            }
        }

        return back()->with('success','Transaction Success');
    }
}
