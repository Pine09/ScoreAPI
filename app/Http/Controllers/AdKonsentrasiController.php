<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\konsentrasi;
use App\Http\Requests\StoreKonsentrasi;

class AdKonsentrasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     /**
     *     @SWG\Get(
     *        path="/api/v1/admin/konsentrasi",
     *        summary="Mengambil semua Konsentrasi yang ada.",
     *        produces={"application/json"},
     *        tags={"Admin on Konsentrasi"},
     *        @SWG\Response(
     *           response=200,
     *           description="data Konsentrasi. (max 5 per page)",
     *             @SWG\Schema(
     *                type="array",
     *                @SWG\Items(ref="#/definitions/konsentrasi")
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
        $konsentrasi = konsentrasi::paginate(5);
        $konsentrasi->load('jurusan');
        return response()->json($konsentrasi->toArray());
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
     *        path="/api/v1/admin/konsentrasi",
     *        summary="Mendaftarkan Konsentrasi baru.",
     *        produces={"application/json"},
     *        consumes={"application/json"},
     *        tags={"Admin on Konsentrasi"},
     *        @SWG\Response(
     *           response=200,
     *           description="data Konsentrasi baru.",
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
     *            name="Data Konsentrasi Baru.",
     *            in="body",
     *            required=true,
     *            type="string",
     *            @SWG\Schema(
     *               type="array",
     *              @SWG\Items(ref="#/definitions/konsentrasi")
     *            ),
     *       )
     *   )
     */
    public function store(Request $request)
    {
        $idjur=$request->input('jurusan_id');
        $jurusan=jurusan::find($idjur);// untuk cek jurusan ada atau tidak
        if (isset($jurusan)) {
            $konsentrasi=new konsentrasi();
            $konsentrasi->konsetrasi_code=$request->input('konsentrasi_code');
            $konsentrasi->konsetrasi_name=$request->input('konsentrasi_name');
            $konsentrasi->jurusan_id=$request->input('jurusan_id');
            $konsetrasi->save();
            return response()->json($konsetrasi);
        }
        else{
            $msg=array('error'=>'Jurusan does not exists');
            return response()->json($msg,404);
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
     *        path="/api/v1/admin/konsentrasi/{id}",
     *        summary="Mengambil data Konsentrasi spesifik",
     *        produces={"application/json"},
     *        tags={"Admin on Konsentrasi"},
     *        @SWG\Response(
     *           response=200,
     *           description="data Konsentrasi yang dicari",
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
           $konsentrasi = konsentrasi::find($id);
      if (!isset($konsentrasi)) {
         $msg=array("error"=>"Konsentrasi not found");
        return response()->json($msg,404);
      }
      else {
        return response()->json($konsentrasi->toArray());
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
     *        path="/api/v1/admin/konsentrasi/{id}",
     *        summary="Mengedit data Konsentrasi.",
     *        produces={"application/json"},
     *        tags={"Admin on Konsentrasi"},
     *        @SWG\Response(
     *           response=200,
     *           description="data Konsentrasi edited.",
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
     *            name="Data Konsentrasi (Edit).",
     *            in="body",
     *            required=true,
     *            type="string",
     *            @SWG\Schema(
     *               type="array",
     *              @SWG\Items(ref="#/definitions/konsentrasi")
     *            ),
     *         ),
     *   )
     */
    public function update(Request $request, $id)
    {   $idjur=$request->input('jurusan_id');
        $jurusan=jurusan::find($idjur);
        if (!isset($jurusan)) {
            $msg=array('error'=>'Jurusan does not exists!');
            return response()->json($msg);
        }
        $konsentrasi=konsentrasi::find($id);
        $konsentrasi->konsentrasi_name=$request->input("jurusan_name");
        $konsentrasi->konsentrasi_code=$request->input("jurusan_code");
        $konsentrasi->jurusan_id=$request->input("jurusan_id");
        $konsentrasi->save();
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
     *        path="/api/v1/admin/konsentrasi/{id}",
     *        summary="Men-delete data Konsentrasi.",
     *        produces={"application/json"},
     *        tags={"Admin on Konsentrasi"},
     *        @SWG\Response(
     *           response=200,
     *           description="data Konsentrasi deleted.",
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
        $konsentrasi = jurusan::find($id);
        $konsentrasi->delete();

        return response()->json("Jurusan Data of ". $jurusan->jurusan_name." has been deleted");
    }
}
