<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDosenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dosen', function (Blueprint $table){
          $table->increments('id');
          $table->string('NIDN')->unique();
          $table->string('nama_dosen');
          $table->string('alamat');
          $table->string('jenis_kelamin');
          $table->string('email')->unique();
          $table->integer('users_id')->unsigned();
          $table->foreign('users_id')->references('id')->on('users');
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
        Schema::dropIfExists('dosen');
    }
}