<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table='transaksi';
    protected $primarykey='id';
    protected $fillable=['date','nama_penerima','username','resiId','status'];

    static function InsertTransaction($date, $username,$nama_penerima){
         $x= Transaksi::create([
            'date'=>$date,
            'nama_penerima'=>$nama_penerima,
            'username'=>$username,
            'status'=>'belum selesai'
        ]);
            return $x;
    }
    static function DeleteTransaction($id){
        $x=Transaksi::where('id',$id)->first();
        $x->delete();
    }
    static function getTransaksi(){
        return Transaksi::all(['id','date','nama_penerima','username','resi_id']);
    }
}
