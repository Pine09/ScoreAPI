<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
/**
*      @SWG\Definition(
*         definition="matkul",
*         @SWG\Property(
*            property="matkul_code",
*            type="string",
*         ),
*         @SWG\Property(
*            property="matkul_name",
*            type="string",
*         ),
*         @SWG\Property(
*            property="bobot",
*            type="string",
*         ),
*      )
*/
class matkul extends Model
{
    protected $table = "matkul";
    protected $hidden = ["created_at", "updated_at"];

    public function jadwal() {
      return $this->hasMany(jadwal::class);
    }
}
