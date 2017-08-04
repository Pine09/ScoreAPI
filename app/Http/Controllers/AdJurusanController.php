<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\jurusan;
use App\Http\Requests\StoreJurusan;
class AdJurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     /**
     *     @SWG\Get(
     *        path="/api/v1/admin/jurusan",
     *        summary="Mengambil semua jurusan yang ada.",
     *        produces={"application/json"},
     *        tags={"Admin on Jurusan"},
     *        @SWG\Response(
     *           response=200,
     *           description="data jurusan. (max 5 per page)",
     *             @SWG\Schema(
     *                type="array",
     *                @SWG\Items(ref="#/definitions/jurusan")
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
    	$jurusan = jurusan::paginate(5);
	    return response()->json($jurusan->toArray());
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
     *        path="/api/v1/admin/jurusan",
     *        summary="Mendaftarkan jurusan baru.",
     *        produces={"application/json"},
     *        consumes={"application/json"},
     *        tags={"Admin on Jurusan"},
     *        @SWG\Response(
     *           response=200,
     *           description="data jurusan baru.",
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
     *            name="Data jurusan Baru.",
     *            in="body",
     *            required=true,
     *            type="string",
     *            @SWG\Schema(
     *               type="array",
     *              @SWG\Items(ref="#/definitions/jurusan")
     *            ),
     *       )
     *   )
     */
    public function store(StoreJurusan $request)
    {
        $jurusan = new jurusan();
      $jurusan->jurusan_code = $request->input('jurusan_code');
      $jurusan->jurusan_name = $request->input('jurusan_name');
      $jurusan->save();

      return response()->json($jurusan);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     /**
     *     @SWG\Get(
     *        path="/api/v1/admin/jurusan/{id}",
     *        summary="Mengambil data jurusan spesifik",
     *        produces={"application/json"},
     *        tags={"Admin on Jurusan"},
     *        @SWG\Response(
     *           response=200,
     *           description="data jurusan yang dicari",
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
           $jurusan = jurusan::find($id);
      if ($jurusan == null) {
         $msg=array("error"=>"Jurusan not found");
        return response()->json($msg,404);
      }
      else {
        return response()->json($jurusan->toArray());
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
     *        path="/api/v1/admin/jurusan/{id}",
     *        summary="Mengedit data jurusan.",
     *        produces={"application/json"},
     *        tags={"Admin on Jurusan"},
     *        @SWG\Response(
     *           response=200,
     *           description="data jurusan edited.",
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
     *            name="Data jurusan (Edit).",
     *            in="body",
     *            required=true,
     *            type="string",
     *            @SWG\Schema(
     *               type="array",
     *              @SWG\Items(ref="#/definitions/jurusan")
     *            ),
     *         ),
     *   )
     */
    public function update(StoreJurusan $request, $id)
    {
        $jurusan=jurusan::find($id);
        $jurusan->jurusan_name=$request->input("jurusan_name");
        $jurusan->jurusan_code=$request->input("jurusan_code");
        $jurusan->save();
        return response()->json($jurusan->toArray());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     /**
     *     @SWG\Delete(
     *        path="/api/v1/admin/jurusan/{id}",
     *        summary="Men-delete data jurusan.",
     *        produces={"application/json"},
     *        tags={"Admin on Jurusan"},
     *        @SWG\Response(
     *           response=200,
     *           description="data jurusan deleted.",
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
       $jurusan = jurusan::find($id);
      $jurusan->delete();

      return response()->json("Jurusan Data of ". $jurusan->jurusan_name." has been deleted");
    }
}
