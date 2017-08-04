<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
*      @SWG\Definition(
*         definition="jurusan",
*         @SWG\Property(
*            property="jurusan_code",
*            type="string",
*         ),
*         @SWG\Property(
*            property="jurusan_name",
*            type="string",
*         ),
*      )
*/
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
