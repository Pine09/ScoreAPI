<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jurusan extends Model
{
    protected $table = "jurusan";
    
    protected $hidden = ["created_at", "updated_at"];

    // ***
    public function mahasiswa() {
      return $this->hasMany(mahasiswa::class);
    }
    // ***
    public function konsentrasi() {
      return $this->hasMany(konsentrasi::class);
   }
}
