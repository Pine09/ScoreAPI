<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNilaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai', function (Blueprint $table){
          $table->increments('id');
          $table->integer('mahasiswa_id')->unsigned();
          $table->foreign('mahasiswa_id')->references('id')->on('mahasiswa');
          $table->integer('jadwal_id')->unsigned();
          $table->foreign('jadwal_id')->references('id')->on('jadwal');
          $table->integer('assignment')->nullable();
          $table->integer('UTS')->nullable();
          $table->integer('UAS')->nullable();
          $table->string('total')->nullable();
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
        Schema::dropIfExists('nilai');
    }
}
