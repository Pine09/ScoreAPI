<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class konsentrasi extends Model
{
    protected $table = "konsentrasi";
    // ***
    public function mahasiswa() {
      return $this->hasMany(mahasiswa::class);
    }

    public function jurusan() {
      return $this->belongsTo(jurusan::class);
   }
}
