<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
/**
*      @SWG\Definition(
*         definition="login",
*         @SWG\Property(
*            property="NI",
*            format="int32",
*            type="integer",
*         ),
*         @SWG\Property(
*            property="password",
*            type="string",
*         ),
*      )
*/

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
    *      @SWG\Definition(
    *         definition="mahasiswa",
    *         @SWG\Property(
    *            property="NIM",
    *            format="int32",
    *            type="integer",
    *         ),
    *         @SWG\Property(
    *            property="foto",
    *            format="int32",
    *            type="string",
    *            description="path to image. nullable field"
    *         ),
    *         @SWG\Property(
    *            property="nama_depan",
    *            type="string",
    *         ),
    *         @SWG\Property(
    *            property="nama_belakang",
    *            type="string",
    *         ),
    *         @SWG\Property(
    *            property="email",
    *            type="string",
    *         ),
    *         @SWG\Property(
    *            property="alamat",
    *            type="text",
    *         ),
    *         @SWG\Property(
    *            property="jenis_kelamin",
    *            type="enum('Laki-Laki', 'Perempuan')",
    *         ),
    *         @SWG\Property(
    *            property="jurusan_id",
    *            format = "int32",
    *            type="integer",
    *         ),
    *         @SWG\Property(
    *            property="konsentrasi_id",
    *            format = "int32",
    *            type="integer",
    *            description="nullable field",
    *         ),
    *         @SWG\Property(
    *            property="angkatan",
    *            type="string",
    *         ),
    *         @SWG\Property(
    *            property="kelas",
    *            type="string",
    *         ),
    *      )
    */
    public function mahasiswa() {
      return $this->belongsTo(mahasiswa::class, 'NI', 'NIM');
    }

    /**
   *      @SWG\Definition(
   *         definition="dosen",
   *         @SWG\Property(
   *            property="NIDN",
   *            format="int32",
   *            type="integer",
   *         ),
   *         @SWG\Property(
   *            property="foto",
   *            format="int32",
   *            type="string",
   *            description="path to image. nullable field"
   *         ),
   *         @SWG\Property(
   *            property="nama_depan",
   *            type="string",
   *         ),
   *         @SWG\Property(
   *            property="nama_belakang",
   *            type="string",
   *         ),
   *         @SWG\Property(
   *            property="email",
   *            type="string",
   *         ),
   *         @SWG\Property(
   *            property="alamat",
   *            type="text",
   *         ),
   *         @SWG\Property(
   *            property="jenis_kelamin",
   *            type="enum('Laki-Laki', 'Perempuan')",
   *         )
   *      )
   */
    public function dosen() {
      return $this->belongsTo(dosen::class, 'NI', 'NIDN');
    }
}
