<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dosen extends Model
{
    protected $table = "dosen";

    public function credential() {
      return $this->hasOne(user::class, 'NI', 'NIDN');
    }

    public function jadwal() {
      return $this->hasMany(jadwal::class);
    }
}
