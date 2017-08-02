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

    public function mahasiswa() {
      return $this->belongsTo(mahasiswa::class, 'NI', 'NIM');
    }

    /**
   *      @SWG\Definition(
   *         definition="dosen",
   *         @SWG\Property(
   *            property="NID",
   *            format="int32",
   *            type="integer",
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
   *            type="string",
   *         ),
   *         @SWG\Property(
   *            property="jenis_kelamin",
   *            type="string",
   *         )
   *      )
   */
    public function dosen() {
      return $this->belongsTo(dosen::class, 'NI', 'NIDN');
    }
}
