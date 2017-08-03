<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\nilai;
use App\User;
use App\mahasiswa;
use App\Http\Requests\StoreMahasiswa;
use App\Http\Requests\StoreNilai;

class AdMahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     /**
      *     @SWG\Get(
      *        path="/api/v1/admin/mahasiswa",
      *        summary="Mengambil semua data mahasiswa yang ada.",
      *        produces={"application/json"},
      *        tags={"Admin on Mahasiswa"},
      *        @SWG\Response(
      *           response=200,
      *           description="data mahasiswa. (max 5 per page)",
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
    public function index()
    {
        $stud_data = mahasiswa::paginate(5);
        return response()->json($stud_data->toArray());
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
     *        path="/api/v1/admin/mahasiswa",
     *        summary="Mendaftarkan mahasiswa baru.",
     *        produces={"application/json"},
     *        consumes={"application/json"},
     *        tags={"Admin on Mahasiswa"},
     *        @SWG\Response(
     *           response=200,
     *           description="data mahasiswa baru.",
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
     *            name="Data Mahasiswa Baru.",
     *            in="body",
     *            required=true,
     *            type="string",
     *            @SWG\Schema(
     *               type="array",
     *              @SWG\Items(ref="#/definitions/mahasiswa")
     *            ),
     *       )
     *   )
     */
    public function store(StoreMahasiswa $request)
    {
        $new_stud = new mahasiswa();
        $new_stud->NIM = $request->input('NIM');
        $new_stud->nama_depan = $request->input('nama_depan');
        $new_stud->nama_belakang = $request->input('nama_belakang');
        $new_stud->email = $request->input('email');
        $new_stud->alamat = $request->input('alamat');
        $new_stud->jenis_kelamin = $request->input('jenis_kelamin');
        $new_stud->jurusan_id = $request->input('jurusan_id');
        $new_stud->konsentrasi_id = $request->input('konsentrasi_id');
        $new_stud->angkatan = $request->input('angkatan');
        $new_stud->kelas = $request->input('kelas');
        $new_stud->save();

        $new_user = new User();
        $new_user->NI = $request->input('NIM');
        $new_user->password = bcrypt($request->input('nama_depan'));
        $new_user->role = "Student";
        $new_user->save();

        return response()->json($new_stud);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     /**
     *     @SWG\Get(
     *        path="/api/v1/admin/mahasiswa/{id}",
     *        summary="Mengambil data mahasiswa spesifik",
     *        produces={"application/json"},
     *        tags={"Admin on Mahasiswa"},
     *        @SWG\Response(
     *           response=200,
     *           description="data mahasiswa yang dicari",
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
        $spec_stud = mahasiswa::find($id);
        if ($spec_stud == null) {
           $a=array("error"=>"Mahasiswa not found");
         return response()->json($a,404);
        }
        else {
          return response()->json($spec_stud->toArray());
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
     *        path="/api/v1/admin/mahasiswa/{id}",
     *        summary="Mengedit data diri mahasiswa.",
     *        produces={"application/json"},
     *        tags={"Admin on Mahasiswa"},
     *        @SWG\Response(
     *           response=200,
     *           description="data mahasiswa edited.",
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
     *            type="string",
     *         ),
     *       @SWG\Parameter(
     *            name="id",
     *            in="path",
     *            required=true,
     *            type="integer",
     *       ),
     *         @SWG\Parameter(
     *            name="Data Mahasiswa (Edit).",
     *            in="body",
     *            required=true,
     *            type="string",
     *            @SWG\Schema(
     *               type="array",
     *              @SWG\Items(ref="#/definitions/mahasiswa")
     *            ),
     *         ),
     *   )
     */
    public function update(StoreMahasiswa $request, $id)
    {
      $old_stud = mahasiswa::find($id);
      $old_user = $old_stud->credential;

      $old_stud->NIM = $request->input('NIM');
      $old_user->NI = $request->input('NIM');
      $old_stud->nama_depan = $request->input('nama_depan');
      $old_user->password = bcrypt($request->input('nama_depan'));
      $old_stud->nama_belakang = $request->input('nama_belakang');
      $old_stud->email = $request->input('email');
      $old_stud->alamat = $request->input('alamat');
      $old_stud->jenis_kelamin = $request->input('jenis_kelamin');
      $old_stud->jurusan_id = $request->input('jurusan_id');
      $old_stud->konsentrasi_id = $request->input('konsentrasi_id');
      $old_stud->angkatan = $request->input('angkatan');
      $old_stud->save();
      $old_user->save();

      return response()->json($old_stud);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     /**
     *     @SWG\Delete(
     *        path="/api/v1/admin/mahasiswa/{id}",
     *        summary="Men-delete data mahasiswa.",
     *        produces={"application/json"},
     *        tags={"Admin on Mahasiswa"},
     *        @SWG\Response(
     *           response=200,
     *           description="data mahasiswa deleted.",
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
      $del_stud = mahasiswa::find($id);
      $del_user = $del_stud->credential;
      $del_user->delete();
      $del_stud->delete();

      return response()->json("Student Data and User Data of ". $del_stud->nama_depan . " " . $del_stud->nama_belakang ." has been deleted");
    }
}
