<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
*      @SWG\Definition(
*         definition="KRS",
*         @SWG\Property(
*            property="jadwal_id",
*            format="int32",
*            type="integer",
*         ),
*         @SWG\Property(
*            property="mahasiswa_id",
*            format="int32",
*            type="integer",
*         ),
*      )
*/
class KRS extends Model
{
    protected $table = "KRS";
    protected $hidden = ["created_at", "updated_at"];

    public function jadwal() {
      return $this->belongsTo(jadwal::class);
    }

    public function mahasiswa() {
      return $this->belongsTo(mahasiswa::class);
    }
}
