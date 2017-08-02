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

    /**
   *      @SWG\Definition(
   *         definition="jadwal",
   *         @SWG\Property(
   *            property="dosen_id",
   *            format="int32",
   *            type="integer",
   *         ),
   *         @SWG\Property(
   *            property="matkul_id",
   *            format="int32",
   *            type="integer",
   *         ),
   *         @SWG\Property(
   *            property="day",
   *            type="string",
   *         ),
   *         @SWG\Property(
   *            property="status",
   *            type="string",
   *         ),
   *      )
   */
    public function jadwal() {
      return $this->hasMany(jadwal::class);
    }
}
