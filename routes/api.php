<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['prefix' => 'v1'], function() {
   Route::post('/login', 'AuthController@authenticate');

   Route::group(['middleware' => 'jwt.auth'], function() {

      Route::group(['prefix'=>'/mahasiswa','middleware'=>'mhs.auth'],function(){
   		Route::get('/', 'MahasiswaController@index');//untuk lihat data diri
   		Route::get('/jadwal','MahasiswaController@jadwal');//untuk lihat jadwal
       Route::get('/nilai','MahasiswaController@nilai');//untuk lihat daftar nilai
      });

      Route::group(['prefix'=> '/dosen','middleware'=>'dosen.auth'], function(){
        Route::get('/', 'DosenController@index');
        Route::get('/jadwal', 'DosenController@jadwal');//untuk melihat jadwal mengajar dosen
        Route::get('/nilai/{idjadwal}','DosenController@detailjadwal');//untuk melihat daftar mahasiswa di jadwal tersebut dan nilainya
        Route::post('/nilai', 'DosenController@insertNilai');//untuk memasukkan nilai kedalam database
      });

      Route::group(['prefix'=> '/admin','middleware'=>'admin.auth'], function(){
        Route::post('/foto/mahasiswa/{id}', 'AdFotoController@insertFotoMhs');
        Route::post('/foto/dosen/{id}', 'AdFotoController@insertFotoDsn');
        Route::resource('/mahasiswa', 'AdMahasiswaController', ['except' => ['create', 'edit']]);
        Route::resource('/dosen', 'AdDosenController', ['except' => ['create', 'edit']]);
        Route::resource('/jadwal', 'AdJadwalController', ['except' => ['create', 'edit']]);
        Route::resource('/matkul', 'AdMatkulController', ['except' => ['create', 'edit']]);
        Route::resource('/KRS', 'AdKRSController', ['except' => ['create', 'edit']]);
        Route::resource('/jurusan', 'AdJurusanController', ['except' => ['create', 'edit']]);
        Route::resource('/konsentrasi', 'AdKonsentrasiController', ['except' => ['create', 'edit']]);
      });
   });
});
