<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\PseudoTypes\False_;

class Detail_Transaksi extends Model
{
    protected $table='detail_transaksi';
    protected $fillable=['id_barang','id_transaksi','quantity'];
    static function insertTransaksiDetail($id_barang, $id_transaksi, $quantity){
      Detail_Transaksi::create([
            'id_barang'=>$id_barang,
            'id_transaksi'=>$id_transaksi,
            'quantity'=>$quantity
      ]);
    }
    public static function findDetailBarang($id_barang){
        $detail=Detail_Transaksi::where('id_barang',$id_barang)->first();
        if($detail==null)
        {
            return True;
        }
        else{
            return False;
        }
    }
}
