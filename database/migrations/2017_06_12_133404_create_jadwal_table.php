<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJadwalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwal', function (Blueprint $table){
          $table->increments('id');
          $table->integer('dosen_id')->unsigned();
          $table->foreign('dosen_id')->references('id')->on('dosen');
          $table->integer('matkul_id')->unsigned();
          $table->foreign('matkul_id')->references('id')->on('matkul');
          $table->string('day');
          $table->string('status');
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
        Schema::dropIfExists('jadwal');
    }
}
