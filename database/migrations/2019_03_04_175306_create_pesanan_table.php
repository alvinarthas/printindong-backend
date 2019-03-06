<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePesananTable extends Migration
{

    public function up()
    {
        Schema::create('pesanan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('trx_id')->unsigned();
            $table->foreign('trx_id')->references('id')->on('transaksi')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('jenis_service_id')->unsigned();
            $table->foreign('jenis_service_id')->references('id')->on('jenis_service')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('jenis_bahan_id')->nullable();
            $table->integer('ukuran_bahan_id')->nullable();
            $table->integer('finishing')->nullable();
            $table->integer('qty');
            $table->integer('harga');
            $table->string('keterangan')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pesanan');
    }
}
