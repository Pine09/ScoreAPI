<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mahasiswa extends Model
{
    protected $table = "mahasiswa";

    public function credential() {
      return $this->hasOne(User::class, 'NI', 'NIM');
    }

    public function jurusan() {
      return $this->belongsTo(jurusan::class);
    }

    public function konsentrasi() {
      return $this->belongsTo(konsentrasi::class);
    }

    public function nilai() {
      return $this->hasMany(nilai::class);
    }

    public function KRS() {
      return $this->hasMany(KRS::class);
    }
}
