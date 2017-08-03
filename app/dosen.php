<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dosen extends Model
{
    protected $table = "dosen";

    protected $hidden = ["created_at", "updated_at"];

    public function credential() {
      return $this->hasOne(user::class, 'NI', 'NIDN');
    }

    public function jadwal() {
      return $this->hasMany(jadwal::class);
    }
}
