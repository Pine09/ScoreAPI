<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mahasiswa extends Model
{
    protected $table = "mahasiswa";
    protected $hidden=["created_at","jurusan_id","konsentrasi_id","updated_at"];

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

   //  public function KRS() {
   //    return $this->hasMany(KRS::class);
   //  }

    public function jadwal() {
      return $this->belongsToMany(jadwal::class, 'KRS');
   }
}
