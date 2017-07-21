<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\mahasiswa;
use \App\KRS;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class MahasiswaController extends Controller
{
   public function authenticate(Request $request) {
      // grab credentials from the request
        $credentials = $request->only('NI', 'password');

        try {
             // attempt to verify the credentials and create a token for the user
             if (! $token = JWTAuth::attempt($credentials)) {
                 return response()->json(['error' => 'invalid_credentials'], 401);
             }
        } catch (JWTException $e) {
             // something went wrong whilst attempting to encode the token
             return response()->json(['error' => 'could_not_create_token'], 500);
        }

        // all good so return the token
        return response()->json(compact('token'));
   }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $data = \App\mahasiswa::find(1);
      $data->jurusan->mahasiswa->load('konsentrasi');
      return $data;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function jadwal()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
