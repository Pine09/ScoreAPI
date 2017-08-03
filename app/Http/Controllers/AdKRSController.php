<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KRS;
use App\nilai;
use App\Http\Requests\StoreKRS;
use App\mahasiswa;

class AdKRSController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     /**
     *     @SWG\Get(
     *        path="/api/v1/admin/KRS",
     *        summary="Mengambil semua KRS yang ada.",
     *        produces={"application/json"},
     *        tags={"Admin on KRS"},
     *        @SWG\Response(
     *           response=200,
     *           description="data KRS. (max 5 per page)",
     *             @SWG\Schema(
     *                type="array",
     *                @SWG\Items(ref="#/definitions/KRS")
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
    public function index()
    {
      $KRS_data = KRS::paginate(5);
      return response()->json($KRS_data->toArray());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     /**
      * Store a newly created resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
      */
      /**
      *     @SWG\Post(
      *        path="/api/v1/admin/KRS",
      *        summary="Mendaftarkan KRS baru.",
      *        produces={"application/json"},
      *        consumes={"application/json"},
      *        tags={"Admin on KRS"},
      *        @SWG\Response(
      *           response=200,
      *           description="data KRS baru.",
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
      *            type="string",
      *         ),
      *         @SWG\Parameter(
      *            name="Data KRS Baru.",
      *            in="body",
      *            required=true,
      *            type="string",
      *            @SWG\Schema(
      *               type="array",
      *              @SWG\Items(ref="#/definitions/KRS")
      *            ),
      *       )
      *   )
      */
    public function store(StoreKRS $request)
    {
        if($request->has('kelas')){
          $users = mahasiswa::where('kelas', $request->input('kelas'))->get();
          foreach ($users as $user) {
            $user = $user->id;
            $krs_mhs = new KRS();
            $krs_mhs->jadwal_id = $request->input('jadwal_id');
            $krs_mhs->mahasiswa_id = $user;
            $krs_mhs->save();
            $new_grade = new nilai();
            $new_grade->mahasiswa_id = $user;
            $new_grade->jadwal_id = $request->input('jadwal_id');
            $new_grade->save();
            $record[] = $krs_mhs;
          }
          return response()->json($record);
        }
        elseif ($request->has('mahasiswa_id')) {
          $user = mahasiswa::where('id', $request->input('mahasiswa_id'))->first();
          $user = $user->id;
          $krs_mhs = new KRS();
          $krs_mhs->jadwal_id = $request->input('jadwal_id');
          $krs_mhs->mahasiswa_id = $user;
          $krs_mhs->save();
          $new_grade = new nilai();
          $new_grade->mahasiswa_id = $user;
          $new_grade->jadwal_id = $request->input('jadwal_id');
          $new_grade->save();
          $record = $krs_mhs;
          return response()->json($record);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     /**
     *     @SWG\Get(
     *        path="/api/v1/admin/KRS/{id}",
     *        summary="Mengambil data KRS spesifik",
     *        produces={"application/json"},
     *        tags={"Admin on KRS"},
     *        @SWG\Response(
     *           response=200,
     *           description="data KRS yang dicari",
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
     *       @SWG\Parameter(
     *            name="Authorization",
     *            in="header",
     *            required=true,
     *            type="string"
     *       ),
     *       @SWG\Parameter(
     *            name="id",
     *            in="path",
     *            required=true,
     *            type="integer",
     *       )
     *   )
     */
    public function show($id)
    {
      $spec_KRS = KRS::find($id);
      if ($spec_KRS == null) {
         $a=array("error"=>"KRS not found");
        return response()->json($a,404);
      }
      else {
        return response()->json($spec_KRS->toArray());
      }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     /**
     *     @SWG\Put(
     *        path="/api/v1/admin/KRS/{id}",
     *        summary="Mengedit data KRS.",
     *        produces={"application/json"},
     *        tags={"Admin on KRS"},
     *        @SWG\Response(
     *           response=200,
     *           description="data KRS edited.",
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
     *            type="string",
     *         ),
     *       @SWG\Parameter(
     *            name="id",
     *            in="path",
     *            required=true,
     *            type="integer",
     *       ),
     *         @SWG\Parameter(
     *            name="Data KRS (Edit).",
     *            in="body",
     *            required=true,
     *            type="string",
     *            @SWG\Schema(
     *               type="array",
     *              @SWG\Items(ref="#/definitions/KRS")
     *            ),
     *         ),
     *   )
     */
    public function update(StoreKRS $request, $id)
    {
      $old_KRS = KRS::find($id);
      $old_score = nilai::find($id);
      $user = mahasiswa::where('id', $request->input('mahasiswa_id'))->first();
      $user = $user->id;
      $old_KRS->jadwal_id = $request->input('jadwal_id');
      $old_score->jadwal_id = $request->input('jadwal_id');
      $old_KRS->mahasiswa_id = $user;
      $old_score->mahasiswa_id = $user;
      $old_KRS->save();
      $old_score->save();

      return response()->json($old_KRS);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     /**
     *     @SWG\Delete(
     *        path="/api/v1/admin/KRS/{id}",
     *        summary="Men-delete data KRS.",
     *        produces={"application/json"},
     *        tags={"Admin on KRS"},
     *        @SWG\Response(
     *           response=200,
     *           description="data KRS deleted.",
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
     *            type="string",
     *         ),
     *       @SWG\Parameter(
     *            name="id",
     *            in="path",
     *            required=true,
     *            type="integer",
     *       ),
     *   )
     */
    public function destroy($id)
    {
      $del_KRS = KRS::find($id);
      $del_nilai = nilai::find($id);
      $del_nilai->delete();
      $del_KRS->delete();

      return response()->json("KRS Data and Score Record of Student with ID = ". $del_KRS->mahasiswa_id ." has been deleted");
    }
}
