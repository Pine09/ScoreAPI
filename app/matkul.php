<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class matkul extends Model
{
    protected $table = "matkul";
    protected $hidden = ["created_at", "updated_at"];

    public function jadwal() {
      return $this->hasMany(jadwal::class);
    }
}
