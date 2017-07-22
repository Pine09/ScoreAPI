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
   
});
