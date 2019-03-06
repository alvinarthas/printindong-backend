<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFinishingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('finishing', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->integer('jenis_bahan_id')->unsigned();
            $table->foreign('jenis_bahan_id')->references('id')->on('jenis_bahan')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('finishing');
    }
}
