<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\mahasiswa;
use \App\KRS;
use JWTAuth;
use Auth;
use Tymon\JWTAuth\Exceptions\JWTException;

class MahasiswaController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    /**
     *     @SWG\Get(
     *        path="/api/v1/mahasiswa",
     *        summary="Menampilkan data diri mahasiswa (you).",
     *        produces={"application/json"},
     *        tags={"mahasiswa"},
     *        @SWG\Response(
     *           response=200,
     *           description="Data diri mahasiswa.",
     *             @SWG\Schema(
     *                type="array",
     *                @SWG\Items(ref="#/definitions/mahasiswa")
     *             )
     *       ),
     *       @SWG\Response(
     *          response=401,
     *          description="Unauthorized action.",
     *       ),
     *       @SWG\Response(
     *          response=403,
     *          description="Forbidden action.",
     *       ),
     *       @SWG\Parameter(
     *            name="Authorization",
     *            in="header",
     *            required=true,
     *            type="string"
     *       )
     *   )
     */
    public function index(Request $request)
    {
        $user=Auth::user();
        $user=$user->mahasiswa;
        $user->jurusan->jurusan_name;
        $user->konsentrasi;
        return response()->json($user->toArray());
    }

    /**
     *     @SWG\Get(
     *        path="/api/v1/mahasiswa/jadwal",
     *        summary="Menampilkan jadwal mahasiswa (you).",
     *        produces={"application/json"},
     *        tags={"mahasiswa"},
     *        @SWG\Response(
     *           response=200,
     *           description="Info jadwal mahasiswa.",
     *             @SWG\Schema(
     *                type="array",
     *                @SWG\Items(ref="#/definitions/jadwal")
     *             )
     *       ),
     *       @SWG\Response(
     *          response=401,
     *          description="Unauthorized action.",
     *       ),
     *       @SWG\Response(
     *          response=403,
     *          description="Forbidden action.",
     *       ),
     *       @SWG\Parameter(
     *            name="Authorization",
     *            in="header",
     *            required=true,
     *            type="string"
     *       )
     *   )
     */
    public function jadwal()
    {
        $user=Auth::user();
        $jadwal=$user->mahasiswa->jadwal->where('status','On Going');// ingat ganti status jadi on going ato ended
        $jadwal->load('matkul');
        return response()->json($jadwal->toArray());
    }

    /**
     *     @SWG\Get(
     *        path="/api/v1/mahasiswa/nilai",
     *        summary="Menampilkan semua nilai mahasiswa (you).",
     *        produces={"application/json"},
     *        tags={"mahasiswa"},
     *        @SWG\Response(
     *           response=200,
     *           description="Nilai mahasiswa.",
     *             @SWG\Schema(
     *                type="array",
     *                @SWG\Items(ref="#/definitions/nilai")
     *             )
     *       ),
     *       @SWG\Response(
     *          response=401,
     *          description="Unauthorized action.",
     *       ),
     *       @SWG\Response(
     *          response=403,
     *          description="Forbidden action.",
     *       ),
     *       @SWG\Parameter(
     *            name="Authorization",
     *            in="header",
     *            required=true,
     *            type="string"
     *       )
     *   )
     */
    public function nilai(){
        $user=Auth::user();
        $nilai=$user->mahasiswa->nilai;
        foreach ($nilai as $nil) {
            $nils=$nil->jadwal->matkul;
        }
        // $nilai->load('matkul');
        return response()->json($nilai);
        // $nilai->load('jadwal');
        // return response()->json($nilai->toArray());
    }

}
