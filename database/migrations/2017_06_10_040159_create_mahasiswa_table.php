<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateMahasiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahasiswa', function (Blueprint $table) {
          $table->increments('id');
          $table->string('NIM')->unique();
          $table->string('nama_mahasiswa');
          $table->string('alamat');
          $table->string('jenis_kelamin');
          $table->string('email')->unique();
          $table->integer('jurusan_id')->unsigned();
          $table->foreign('jurusan_id')->references('id')->on('jurusan');
          $table->string('angkatan');
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
      DB::statement('SET FOREIGN_KEY_CHECKS = 0');
      Schema::dropIfExists('mahasiswa');
      DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
