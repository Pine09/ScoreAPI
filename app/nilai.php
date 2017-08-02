<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nilai extends Model
{
    protected $table = "nilai";
    protected $hidden=["created_at","updated_at"];
    // ***
    /**
   *      @SWG\Definition(
   *         definition="nilai",
   *         @SWG\Property(
   *            property="mahasiswa_id",
   *            format="int32",
   *            type="integer",
   *         ),
   *         @SWG\Property(
   *            property="jadwal_id",
   *            format="int32",
   *            type="integer",
   *         ),
   *         @SWG\Property(
   *            property="assignment",
   *            format="int32",
   *            type="integer",
   *         ),
   *         @SWG\Property(
   *            property="UTS",
   *            format="int32",
   *            type="integer",
   *         ),
   *         @SWG\Property(
   *            property="UAS",
   *            format="int32",
   *            type="integer",
   *         ),
   *      )
   */
    public function jadwal() {
      return $this->belongsTo(jadwal::class);
    }
    public function mahasiswa() {
      return $this->belongsTo(mahasiswa::class)->select(array("id","nama_depan","nama_belakang","NIM"));
    }
    public function matkul(){
    	// return $this->score;
    }

}
