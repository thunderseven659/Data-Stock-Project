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
            return Barang::all(['id','name','description','price','stock']);
        }
}
