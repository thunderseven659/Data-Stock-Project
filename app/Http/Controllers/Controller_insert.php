<?php

namespace App\Http\Controllers;

use App\Barang;
use Illuminate\Http\Request;

class Controller_insert extends Controller
{
    function show(){
        return view('main.insert');
    }
    function add(Request $request){
        $rule= [
            'item_name'=>'required|unique:barang,name',
            'description'=>'required',
            'price'=>'integer|required',
            'image'=>'mimes:jpeg,png,jpg',
            'stock'=>'integer|required'
        ];
        $attribute =[
            'item_name'=>'Name',
            'description'=>'Description',
            'price'=>'Price',
            'image'=>'Image',
            'stock'=>'Stock'
        ];
        $message=[
            'required'=>':attribute is required',
            'unique'=>':attribute is already made',
            'integer'=>':attribute must be numeric',
            "mimes"=> ':attribute must be :values'
        ];

        $this->validate($request,$rule,$message,$attribute);
        $name=$request->item_name;
        $description=$request->description;
        $price=$request->price;
        $stock=$request->stock;
        $image= '';
        if(empty($request->image))
        {
            $image=null;
        }
        else{
            $image=$request->file('image')->store('img');
        }

        Barang::insert($name,$description,$price,$image,$stock);

        return redirect()->route('insertData')->with("Success","Insert Success");
    }
}
