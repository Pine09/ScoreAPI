<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\matkul;
use App\Http\Requests\StoreMatkul;

class AdMatkulController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     /**
     *     @SWG\Get(
     *        path="/api/v1/admin/matkul",
     *        summary="Mengambil semua mata kuliah yang ada.",
     *        produces={"application/json"},
     *        tags={"Admin on Mata Kuliah"},
     *        @SWG\Response(
     *           response=200,
     *           description="data mata kuliah. (max 5 per page)",
     *             @SWG\Schema(
     *                type="array",
     *                @SWG\Items(ref="#/definitions/matkul")
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
      $matkul_data = matkul::paginate(5);
      return response()->json($matkul_data->toArray());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     /**
     *     @SWG\Post(
     *        path="/api/v1/admin/matkul",
     *        summary="Mendaftarkan mata kuliah baru.",
     *        produces={"application/json"},
     *        consumes={"application/json"},
     *        tags={"Admin on Mata Kuliah"},
     *        @SWG\Response(
     *           response=200,
     *           description="data mata kuliah baru.",
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
     *            name="Data Mata Kuliah Baru.",
     *            in="body",
     *            required=true,
     *            type="string",
     *            @SWG\Schema(
     *               type="array",
     *              @SWG\Items(ref="#/definitions/matkul")
     *            ),
     *       )
     *   )
     */
    public function store(StoreMatkul $request)
    {
      $new_matkul = new matkul();
      $new_matkul->matkul_code = $request->input('matkul_code');
      $new_matkul->matkul_name = $request->input('matkul_name');
      $new_matkul->bobot = $request->input('bobot');
      $new_matkul->save();

      return response()->json($new_matkul);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     /**
     *     @SWG\Get(
     *        path="/api/v1/admin/matkul/{id}",
     *        summary="Mengambil data mata kuliah spesifik",
     *        produces={"application/json"},
     *        tags={"Admin on Mata Kuliah"},
     *        @SWG\Response(
     *           response=200,
     *           description="data mata kuliah yang dicari",
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
      $spec_matkul = matkul::find($id);
      if ($spec_matkul == null) {
         $a=array("error"=>"Matkul not found");
        return response()->json($a,404);
      }
      else {
        return response()->json($spec_matkul->toArray());
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
     *        path="/api/v1/admin/matkul/{id}",
     *        summary="Mengedit data mata kuliah.",
     *        produces={"application/json"},
     *        tags={"Admin on Mata Kuliah"},
     *        @SWG\Response(
     *           response=200,
     *           description="data mata kuliah edited.",
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
     *            name="Data Mata Kuliah (Edit).",
     *            in="body",
     *            required=true,
     *            type="string",
     *            @SWG\Schema(
     *               type="array",
     *              @SWG\Items(ref="#/definitions/matkul")
     *            ),
     *         ),
     *   )
     */
    public function update(StoreMatkul $request, $id)
    {
      $old_matkul = matkul::find($id);

      $old_matkul->matkul_code = $request->input('matkul_code');
      $old_matkul->matkul_name = $request->input('matkul_name');
      $old_matkul->bobot = $request->input('bobot');
      $old_matkul->save();

      return response()->json($old_matkul);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     /**
     *     @SWG\Delete(
     *        path="/api/v1/admin/matkul/{id}",
     *        summary="Men-delete data mata kuliah.",
     *        produces={"application/json"},
     *        tags={"Admin on Mata Kuliah"},
     *        @SWG\Response(
     *           response=200,
     *           description="data mata kuliah deleted.",
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
      $del_matkul = matkul::find($id);
      $del_matkul->delete();

      return response()->json("Matkul Data of ". $del_matkul->matkul_name ." has been deleted");
    }
}
