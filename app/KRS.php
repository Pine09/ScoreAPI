<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KRS extends Model
{
    protected $table = "KRS";

    public function jadwal() {
      return $this->belongsTo(jadwal::class);
    }

    public function mahasiswa() {
      return $this->belongsTo(mahasiswa::class);
    }
}
