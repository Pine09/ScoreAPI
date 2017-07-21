<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jadwal extends Model
{
    protected $table = "jadwal";

    public function matkul() {
      return $this->belongsTo(matkul::class);
    }

    public function dosen() {
      return $this->belongsTo(dosen::class);
    }

   //  public function KRS() {
   //    return $this->hasMany(KRS::class);
   //  }

    // ***
    public function nilai() {
      return $this->hasMany(nilai::class);
    }

    // ***
    public function mahasiswa() {
      return $this->belongsToMany(mahasiswa::class, 'KRS');
   }
}
