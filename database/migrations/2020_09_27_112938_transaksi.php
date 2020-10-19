<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Transaksi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('nama_penerima');
            $table->string('username');
            $table->foreign('username')->references('username')->on('user')->onUpdate('cascade')->onDelete('cascade');
            $table->string('resi_id')->nullable();
            $table->foreign('resi_id')->references('resi_id')->on('resi')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
            $table->string('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi');
    }
}
