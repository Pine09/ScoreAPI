<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreDosen;
use App\dosen;
use App\User;

class AdDosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     /**
     *     @SWG\Get(
     *        path="/api/v1/admin/dosen",
     *        summary="Mengambil semua data dosen yang ada.",
     *        produces={"application/json"},
     *        tags={"Admin on Dosen"},
     *        @SWG\Response(
     *           response=200,
     *           description="data dosen. (max 5 per page)",
     *             @SWG\Schema(
     *                type="array",
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
      $lec_data = dosen::paginate(5);
      return response()->json($lec_data->toArray());
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
     *     @SWG\Post(
     *        path="/api/v1/admin/dosen",
     *        summary="Mendaftarkan dosen baru.",
     *        produces={"application/json"},
     *        consumes={"application/json"},
     *        tags={"Admin on Dosen"},
     *        @SWG\Response(
     *           response=200,
     *           description="data dosen baru.",
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
     *          response=409,
     *          description="Conflict.",
     *       ),
     *       @SWG\Response(
     *          response=422,
     *          description="Unprocessable Entity.",
     *       ),
     *       @SWG\Parameter(
     *            name="Authorization",
     *            in="header",
     *            required=true,
     *            type="string",
     *         ),
     *         @SWG\Parameter(
     *            name="Data Dosen Baru.",
     *            in="body",
     *            required=true,
     *            type="string",
     *            @SWG\Schema(
     *               type="array",
     *              @SWG\Items(ref="#/definitions/dosen")
     *            ),
     *       )
     *   )
     */
    public function store(StoreDosen $request)
    {
      $new_lec = new dosen();
      $new_lec->NIDN = $request->input('NIDN');
      $new_lec->nama_depan = $request->input('nama_depan');
      $new_lec->nama_belakang = $request->input('nama_belakang');
      $new_lec->email = $request->input('email');
      $new_lec->alamat = $request->input('alamat');
      $new_lec->jenis_kelamin = $request->input('jenis_kelamin');
      $new_lec->save();

      $new_user = new User();
      $new_user->NI = $request->input('NIDN');
      $new_user->password = bcrypt($request->input('nama_depan'));
      $new_user->role = "Lecturer";
      $new_user->save();

      return response()->json($new_lec);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     /**
     *     @SWG\Get(
     *        path="/api/v1/admin/dosen/{id}",
     *        summary="Mengambil data dosen spesifik",
     *        produces={"application/json"},
     *        tags={"Admin on Dosen"},
     *        @SWG\Response(
     *           response=200,
     *           description="data dosen yang dicari",
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
     *            name="id",
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
     *   )
     */
    public function show($id)
    {
      $spec_lec = dosen::find($id);
      if ($spec_lec == null) {
         $a=array("error"=>"Dosen not found");
        return response()->json($a,422);
      }
      else {
        return response()->json($spec_lec->toArray());
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
        //
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
     *        path="/api/v1/admin/dosen/{id}",
     *        summary="Mengedit data diri dosen.",
     *        produces={"application/json"},
     *        tags={"Admin on Dosen"},
     *        @SWG\Response(
     *           response=200,
     *           description="data dosen edited.",
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
     *            name="id",
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
     *            name="Data Dosen (Edit).",
     *            in="body",
     *            required=true,
     *            type="string",
     *            @SWG\Schema(
     *               type="array",
     *              @SWG\Items(ref="#/definitions/dosen")
     *            ),
     *         ),
     *   )
     */
    public function update(StoreDosen $request, $id)
    {
      $old_lec = dosen::find($id);
      $old_user = $old_lec->credential;

      $old_lec->NIDN = $request->input('NIDN');
      $old_user->NI = $request->input('NIDN');
      $old_lec->nama_depan = $request->input('nama_depan');
      $old_user->password = bcrypt($request->input('nama_depan'));
      $old_lec->nama_belakang = $request->input('nama_belakang');
      $old_lec->email = $request->input('email');
      $old_lec->alamat = $request->input('alamat');
      $old_lec->jenis_kelamin = $request->input('jenis_kelamin');
      $old_lec->save();
      $old_user->save();


      return response()->json($old_lec);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     /**
     *     @SWG\Delete(
     *        path="/api/v1/admin/dosen/{id}",
     *        summary="Men-delete data dosen.",
     *        produces={"application/json"},
     *        tags={"Admin on Dosen"},
     *        @SWG\Response(
     *           response=200,
     *           description="data dosen deleted.",
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
     *          description="Unprocessable Entity.",
     *       ),
     *       @SWG\Response(
     *          response=500,
     *          description="Internal Server Error.",
     *       ),
     *       @SWG\Parameter(
     *            name="id",
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
     *   )
     */
    public function destroy($id)
    {
      $del_lec = dosen::find($id);
      // $del_jadwals = $del_lec->jadwal;
      // foreach ($del_jadwals as $del_jadwal) {
      //   $del_jadwal->delete();
      // }
      $del_user = $del_lec->credential;
      $del_lec->delete();
      $del_user->delete();

      // $gender = $del_lec->jenis_kelamin;
      // if ($gender = "Laki-Laki") {
      //   $gen = "his";
      // }
      // elseif ($gender = "Wanita") {
      //   $gen = "her";
      // }


      return response()->json("Lecturer Data and User Data of ". $del_lec->nama_depan . " " . $del_lec->nama_belakang ." has been deleted");
    }
}
