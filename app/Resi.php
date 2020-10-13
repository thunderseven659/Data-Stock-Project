<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resi extends Model
{
    protected $primarykey='resi_id';
    protected $table='resi';
    protected $fillable=['resi_id','alamat_pengiriman','nama_penerima'];
}
