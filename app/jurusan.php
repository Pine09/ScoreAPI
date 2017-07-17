<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jurusan extends Model
{
    protected $table = "jurusan";
    // ***
    public function mahasiswa() {
      return $this->hasMany(mahasiswa::class);
    }
    // ***
    public function konsentrasi() {
      return $this->hasMany(konsentrasi::class);
   }
}
