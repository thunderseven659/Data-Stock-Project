<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail_Transaksi extends Model
{
    protected $table='detail_transaksi';
    protected $fillable=['id_barang','id_transaksi','quantity'];

}
