<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class matkul extends Model
{
    protected $table = "matkul";

    public function jadwal() {
      return $this->hasMany(jadwal::class);
    }
}
