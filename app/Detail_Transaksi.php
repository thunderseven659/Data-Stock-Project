<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}
