<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
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
*            type="enum('On Going', 'Ended')",
*         ),
*      )
*/
class jadwal extends Model
{
    protected $table = "jadwal";

    protected $hidden = ["created_at", "updated_at"];

    // protected $hidden=["dosen_id"];
    public function matkul() {
      return $this->belongsTo(matkul::class)->select(array('id', 'matkul_name','bobot'));
    }


    public function dosen() {
      return $this->belongsTo(dosen::class);
    }

   //  public function KRS() {
   //    return $this->hasMany(KRS::class);
   //  }

    // ***
    public function nilai() {
      return $this->hasMany(nilai::class);
    }

    // ***
    public function mahasiswa() {
      return $this->belongsToMany(mahasiswa::class, 'KRS');
   }
}
