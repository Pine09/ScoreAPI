<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nilai extends Model
{
    protected $table = "nilai";
    protected $hidden=["jadwal_id","created_at"];
    // ***
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
