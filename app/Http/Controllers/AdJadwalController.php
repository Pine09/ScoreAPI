<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\jadwal;
use App\Http\Requests\StoreJadwal;

class AdJadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     /**
     *     @SWG\Get(
     *        path="/api/v1/admin/jadwal",
     *        summary="Mengambil semua data jadwal yang ada.",
     *        produces={"application/json"},
     *        tags={"Admin on Jadwal"},
     *        @SWG\Response(
     *           response=200,
     *           description="data jadwal. (max 5 per page)",
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
    public function index()
    {
      $schdl_data = jadwal::paginate(5);
      return response()->json($schdl_data->toArray());
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
     *        path="/api/v1/admin/jadwal",
     *        summary="Mendaftarkan jadwal baru.",
     *        produces={"application/json"},
     *        consumes={"application/json"},
     *        tags={"Admin on Jadwal"},
     *        @SWG\Response(
     *           response=200,
     *           description="data jadwal baru.",
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
     *            name="Data Jadwal Baru.",
     *            in="body",
     *            required=true,
     *            type="string",
     *            @SWG\Schema(
     *               type="array",
     *              @SWG\Items(ref="#/definitions/jadwal")
     *            ),
     *       )
     *   )
     */
    public function store(Request $request)
    {
      $new_schdl = new jadwal();
      $new_schdl->dosen_id = $request->input('dosen_id');
      $new_schdl->matkul_id = $request->input('matkul_id');
      $new_schdl->day = $request->input('day');
      $new_schdl->status = $request->input('status') ;
      $new_schdl->save();

      return response()->json($new_schdl);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     /**
     *     @SWG\Get(
     *        path="/api/v1/admin/jadwal/{id}",
     *        summary="Mengambil data jadwal spesifik",
     *        produces={"application/json"},
     *        tags={"Admin on Jadwal"},
     *        @SWG\Response(
     *           response=200,
     *           description="data jadwal yang dicari",
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
      $spec_schdl = jadwal::find($id);
      if ($spec_schdl == null) {
         $a=array("error"=>"Jadwal not found");
        return response()->json($a,404);
      }
      else {
        return response()->json($spec_schdl->toArray());
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
     *        path="/api/v1/admin/jadwal/{id}",
     *        summary="Mengedit data jadwal.",
     *        produces={"application/json"},
     *        tags={"Admin on Jadwal"},
     *        @SWG\Response(
     *           response=200,
     *           description="data jadwal edited.",
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
     *            name="Data Jadwal (Edit).",
     *            in="body",
     *            required=true,
     *            type="string",
     *            @SWG\Schema(
     *               type="array",
     *              @SWG\Items(ref="#/definitions/jadwal")
     *            ),
     *         ),
     *   )
     */
    public function update(Request $request, $id)
    {
      $old_schdl = jadwal::find($id);

      $old_schdl->dosen_id = $request->input('dosen_id');
      $old_schdl->matkul_id = $request->input('matkul_id');
      $old_schdl->day = $request->input('day');
      $old_schdl->status = $request->input('status');
      $old_schdl->save();

      return response()->json($old_schdl);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     /**
     *     @SWG\Delete(
     *        path="/api/v1/admin/jadwal/{id}",
     *        summary="Men-delete data jadwal.",
     *        produces={"application/json"},
     *        tags={"Admin on Jadwal"},
     *        @SWG\Response(
     *           response=200,
     *           description="data jadwal deleted.",
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
      $del_stud = jadwal::find($id);
      $del_stud->delete();

      return response()->json("Schedule Data with ID = ". $del_stud->id ." has been deleted");
    }
}
