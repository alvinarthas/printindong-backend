<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePembayaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('trx_id')->unsigned();
            $table->foreign('trx_id')->references('id')->on('transaksi')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('methodbayar_id')->unsigned();
            $table->foreign('methodbayar_id')->references('id')->on('methodbayar')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('bank_id')->nullable();
            $table->integer('harga');
            $table->tinyInteger('status')->default(0);
            $table->dateTime('max_bayar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pembayaran');
    }
}
