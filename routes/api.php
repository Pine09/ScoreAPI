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

Route::post('/login', 'AuthController@authenticate');

Route::group(['middleware' => 'jwt.auth'], function() {
   Route::group(['prefix'=>'/mahasiswa'],function(){
		Route::get('/', 'MahasiswaController@index');//untuk lihat data diri
		Route::get('/jadwal','MahasiswaController@jadwal');//untuk lihat jadwal
   });

   Route::group(['prefix'=> '/dosen'], function(){
     Route::get('/', 'DosenController@index');
     Route::get('/jadwal', 'DosenController@jadwal');
     Route::post('/nilai', 'DosenController@insertNilai');
   });

   Route::group(['prefix'=> '/admin'], function(){
     Route::resource('/mahasiswa', 'AdMahasiswaController', ['except' => ['create', 'edit']]);
     Route::resource('/dosen', 'AdDosenController', ['except' => ['create', 'edit']]);
     Route::resource('/jadwal', 'AdJadwalController', ['except' => ['create', 'edit']]);
     Route::resource('/matkul', 'AdMatkulController', ['except' => ['create', 'edit']]);
     Route::resource('/KRS', 'AdKRSController', ['except' => ['create', 'edit']]);
   });
});
