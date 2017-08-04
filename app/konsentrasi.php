<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
*      @SWG\Definition(
*         definition="konsentrasi",
*         @SWG\Property(
*            property="konsentrasi_code",
*            type="string",
*         ),
*         @SWG\Property(
*            property="konsentrasi_name",
*            type="string",
*         ),
*         @SWG\Property(
*            property="jurusan_id",
*            format = "int32",
*            type="integer",
*         ),
*      )
*/
class konsentrasi extends Model
{
    protected $table = "konsentrasi";

    protected $hidden = ["created_at", "updated_at","jurusan_id"];

    // ***
    public function mahasiswa() {
      return $this->hasMany(mahasiswa::class);
    }

    public function jurusan() {
      return $this->belongsTo(jurusan::class)->select(array('id','jurusan_name'));
   }
}
