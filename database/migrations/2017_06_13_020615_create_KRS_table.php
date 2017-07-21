<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKRSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('KRS', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('jadwal_id')->unsigned();
          $table->foreign('jadwal_id')->references('id')->on('jadwal');
          $table->integer('mahasiswa_id')->unsigned();
          $table->foreign('mahasiswa_id')->references('id')->on('mahasiswa');
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
        Schema::dropIfExists('KRS');
    }
}
