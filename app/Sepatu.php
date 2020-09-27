<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sepatu extends Model
{
    protected $primarykey='id';
    protected $table='sepatu';
    protected $fillable=['name','description','price','image'];
}
