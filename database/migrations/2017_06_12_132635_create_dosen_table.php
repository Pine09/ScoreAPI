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
          $table->string('foto')->nullable();
          $table->string('nama_depan');
          $table->string('nama_belakang');
          $table->string('email')->unique();
          $table->text('alamat');
          $table->string('jenis_kelamin');
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
