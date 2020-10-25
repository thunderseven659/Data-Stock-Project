<?php

namespace App\Http\Controllers;

use App\Barang;
use App\Detail_Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\PseudoTypes\True_;

class Controller_updateDelete extends Controller
{

    function show(){
        $table=Barang::getBarang();
        return view('main.updateDelete',['table'=>$table]);
    }
    function deleteBarang($id)
    {
        if(Detail_Transaksi::findDetailBarang($id)==true)
        {
            $x=Barang::findBarang($id);
            Storage::delete($x->image);
            Barang::deleteBarang($id);
            return back()->with('success','Delete Success');
        }
        else
        {
            return back()->with('error','Delete Failed because item already sold');
        }
    }
    function updateBarang(Request $request,$id)
    {
        $name=$request->item_name;
        $description=$request->description;
        $price=$request->price;
        $image= '';
        if(empty($request->image))
        {
            $image=null;
        }
        else{
            $image=$request->file('image')->store('img');
            $x =Barang::findBarang($id);
            Storage::delete($x->image);
        }
        $stock=$request->stock;
        Barang::updateBarang($id,$name,$description,$price,$image,$stock);
        return back()->with('success','Update Success');
    }
}
