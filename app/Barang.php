<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
        protected $primarykey='id';
        protected $table='barang';
        protected $fillable=['name','description','price','image','stock'];

        static function insert($name, $description, $price, $image, $stock){
            Barang::create([
                'name'=>$name,
                'description'=>$description,
                'price'=>$price,
                'image'=>$image,
                'stock'=>$stock
            ]);
        }
        static function getBarang(){
            return Barang::all();
        }
        static function reduceStock($id, $stock){
            $barang= Barang::where('id',$id)->first();
            if($barang->stock-$stock>=0){
                $barang->stock-=$stock;
                $barang->save();
                return true;
            }
            else{
                return false;
            }
        }
        static function findBarang($id){
            return Barang::where('id',$id)->first();
        }
        static function checkStock($id, $stock){
            $barang= Barang::where('id',$id)->first();
            if($barang->stock-$stock<0){
                return false;
            }
            else
            {
                return true;
            }
        }
        static function deleteBarang($id)
        {
            $barang= Barang::where('id',$id)->first();
            $barang->delete();
        }
        static function updateBarang($id,$name, $description, $price, $image, $stock)
        {
            $barang=Barang::where('id',$id)->first();
            $barang->name=$name;
            $barang->description=$description;
            $barang->price=$price;
            $barang->stock=$stock;
            if($image!=null)
            {
                $barang->image=$image;
            }
            $barang->save();
        }
}
