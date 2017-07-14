<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nilai extends Model
{
    protected $table = "nilai";
    // ***
    public function jadwal() {
      return $this->belongsTo(jadwal::class);
    }
    public function mahasiswa() {
      return $this->belongsTo(mahasiswa::class);
    }
}
