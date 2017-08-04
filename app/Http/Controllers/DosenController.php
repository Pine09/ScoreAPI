<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests\StoreNilai;
use App\jadwal;
use App\nilai;

class DosenController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    /**
     *     @SWG\Get(
     *        path="/api/v1/dosen",
     *        summary="Menampilkan data diri dosen (you).",
     *        produces={"application/json"},
     *        tags={"dosen"},
     *        @SWG\Response(
     *           response=200,
     *           description="Data diri dosen (you).",
     *             @SWG\Schema(
     *                type="",
     *                @SWG\Items(ref="#/definitions/dosen")
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
     *       @SWG\Response(
     *          response=404,
     *          description="Resource not found.",
     *       ),
     *       @SWG\Response(
     *          response=422,
     *          description="Unprocessable Entity",
     *       ),
     *       @SWG\Response(
     *          response=500,
     *          description="Internal Server Error.",
     *       ),
     *       @SWG\Parameter(
     *            name="Authorization",
     *            in="header",
     *            required=true,
     *            type="string"
     *       )
     *   )
     */
    public function index(){
      $user=Auth::user();
      $user=$user->dosen;
      return response()->json($user->toArray());
    }
    /**
     *     @SWG\Get(
     *        path="/api/v1/dosen/jadwal",
     *        summary="Menampilkan jadwal dosen (yours).",
     *        produces={"application/json"},
     *        tags={"dosen"},
     *        @SWG\Response(
     *           response=200,
     *           description="Informasi jadwal dosen (you)",
     *             @SWG\Schema(
     *                type="array",
     *                @SWG\Items(ref="#/definitions/jadwal")
     *             ),
     *       ),
     *       @SWG\Response(
     *          response=401,
     *          description="Unauthorized action.",
     *       ),
     *       @SWG\Response(
     *          response=403,
     *          description="Forbidden action.",
     *       ),
     *       @SWG\Response(
     *          response=404,
     *          description="Resource not found.",
     *       ),
     *       @SWG\Response(
     *          response=422,
     *          description="Unprocessable Entity",
     *       ),
     *       @SWG\Response(
     *          response=500,
     *          description="Internal Server Error.",
     *       ),
     *       @SWG\Parameter(
     *            name="Authorization",
     *            in="header",
     *            required=true,
     *            type="string"
     *       )
     *   )
     */
    public function jadwal(){
      $user=Auth::user();
      $jadwal=$user->dosen->jadwal->where('status',"On Going");
      $jadwal->load('matkul');
      return response()->json($jadwal->toArray());
    }
    /**
     *     @SWG\Get(
     *        path="/api/v1/dosen/nilai/{idjadwal}",
     *        summary="Menampilkan detail nilai (nilai + matkul + mahasiswa) suatu jadwal.",
     *        produces={"application/json"},
     *        tags={"dosen"},
     *        @SWG\Response(
     *           response=200,
     *            examples={"lala":"string"},
     *           description="Informasi detail nilai semua mahasiswa suatu jadwal",
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
     *       @SWG\Response(
     *          response=404,
     *          description="Resource not found.",
     *       ),
     *       @SWG\Response(
     *          response=422,
     *          description="Unprocessable Entity",
     *       ),
     *       @SWG\Response(
     *          response=500,
     *          description="Internal Server Error.",
     *       ),
     *       @SWG\Parameter(
     *            name="idjadwal",
     *            in="path",
     *            required=true,
     *            type="integer"
     *       ),
     *       @SWG\Parameter(
     *            name="Authorization",
     *            in="header",
     *            required=true,
     *            type="string"
     *       ),
     *   )
     */
    public function detailjadwal($idjadwal){
      // $user=Auth::user();
      // $user=$user->dosen->id;
      // $jadwal=jadwal::find($idjadwal);
      // $jadwal->load('matkul');
      // $nilai=$jadwal->nilai->load("mahasiswa");
      // return response()->json($jadwal);

      $dosen = Auth::user()->dosen;
      $user_id = $dosen->id;
      $jadwal = $dosen->jadwal;

      $id = $idjadwal;
      $jadwal_detail = $jadwal->find($id);

      if ($jadwal_detail == null) {
        $a = array("error"=>"Resource not found");
        return response()->json($a, 404);
      } else {
        $jdn = $jadwal_detail->load('matkul');
        $jdn->nilai->load('mahasiswa');
        return response()->json($jdn);
      }
        // $nilai = $jadwal_detail->nilai

      // $id = $idjadwal;
      // return $jadwal->find($id);

      // $jadwal->load('matkul')->matkul_name;
      // $namamatkul=$jadwal;
      // $nilai->load('mahasiswa');

      // $nilai=$jadwal->nilai;
      // // $jadwal->load('matkul');
      // $nilai->load('mahasiswa');
      // return response()->json($jadwal);

    }

    /**
    *     @SWG\Put(
    *        path="/api/v1/dosen/nilai/{idmahasiswa}",
    *        summary="Menambah nilai.",
    *        produces={"application/json"},
    *        tags={"dosen"},
    *        @SWG\Response(
    *           response=200,
    *           description="data nilai.",
    *       ),
    *       @SWG\Response(
    *          response=401,
    *          description="Unauthorized action.",
    *       ),
    *       @SWG\Response(
    *          response=403,
    *          description="Forbidden action.",
    *       ),
    *       @SWG\Response(
    *          response=404,
    *          description="Resource not found.",
    *       ),
    *       @SWG\Response(
    *          response=409,
    *          description="Conflict.",
    *       ),
    *       @SWG\Response(
    *          response=422,
    *          description="Unprocessable Entity.",
    *       ),
    *       @SWG\Response(
    *          response=500,
    *          description="Internal Server Error.",
    *       ),
    *       @SWG\Parameter(
    *            name="idmahasiswa",
    *            in="path",
    *            required=true,
    *            type="integer",
    *       ),
    *       @SWG\Parameter(
    *            name="Authorization",
    *            in="header",
    *            required=true,
    *            type="string"
    *       ),
    *         @SWG\Parameter(
    *            name="Data Nilai.",
    *            in="body",
    *            required=true,
    *            type="string",
    *            @SWG\Schema(
    *               type="array",
    *              @SWG\Items(ref="#/definitions/nilai")
    *            ),
    *         ),
    *   )
    */
    public function insertNilai(StoreNilai $request, $id){
      $user = Auth::user();
      $jadwal = $user->dosen->jadwal->where('id', $request->input('jadwal_id'))->first();
      $nilai = $jadwal->nilai->where('mahasiswa_id', $id)->first();

      // $nilai = $user->dosen->jadwal->load(['nilai' => function($query) use ($request){
      //   $query->where('mahasiswa_id', $request->input('mahasiswa_id'));
      // }])->first();

      // $nilai = Nilai::where([
      //   ['mahasiswa_id', $request->input('mahasiswa_id')],
      //   ['jadwal_id', $request->input('jadwal_id')],
      // ])->first();

      // $nilai = $nilai::where('mahasiswa_id', $request->input('mahasiswa_id'))->first();
      $assignment = $nilai->assignment;
      $UTS = $nilai->UTS;
      $UAS = $nilai->UAS;

      if ($assignment != null) {
         $assignment = $request->input('assignment');
         $nilai->assignment = $assignment;
      } else {
         $nilai->assignment = $assignment;
      }

      if ($UTS != null) {
         $UTS = $request->input('UTS');
         $nilai->UTS = $UTS;
      } else {
         $nilai->UTS = $UTS;
      }

      if ($UAS != null) {
         $UAS = $request->input('UAS');
         $nilai->UAS = $UAS;
      } else {
         $nilai->UAS = $UAS;
      }

      $count = $assignment * 0.3 + $UTS * 0.3 + $UAS * 0.4;

      if ($count >= 90) {
         $total = 'A';
      } else if ($count >= 85) {
         $total = 'A-';
      }elseif ($count >= 80) {
         $total = 'B+';
      } else if ($count >= 75) {
         $total = 'B';
      } elseif ($count >= 70) {
         $total = 'B-';
      }elseif ($count >= 65) {
         $total = 'C+';
      } elseif ($count >= 60) {
         $total = 'C';
      } else {
         $total = 'F';
      }
      $nilai->total = $total;
      $nilai->save();

      return response()->json($nilai->toArray());
    }
}
