<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\mahasiswa;
use App\dosen;


class AdFotoController extends Controller
{
  /**
  *     @SWG\Post(
  *        path="/api/v1/admin/foto/mahasiswa/{id}",
  *        summary="Menambahkan foto ke data mahasiswa.",
  *        produces={"application/json"},
  *        consumes={"multipart/form-data"},
  *        tags={"Admin on MediaFile"},
  *        @SWG\Response(
  *           response=200,
  *           description="data mahasiswa.",
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
  *            name="foto",
  *            in="formData",
  *            required=true,
  *            type="file",
  *       )
  *   )
  */
    public function insertFotoMhs(Request $request, $id){
      if($request->hasFile('foto')){
        if($request->foto->isValid()){
            $path = $request->foto->store('public');
              // $stud = mahasiswa::where('NIM', $nim);
              $stud = mahasiswa::find($id);
              $stud->foto = $path;
              $stud->save();
              return response()->json($stud);

        }
      }
    }

    /**
    *     @SWG\Post(
    *        path="/api/v1/admin/foto/dosen/{id}",
    *        summary="Menambahkan foto ke data dosen.",
    *        produces={"application/json"},
    *        consumes={"multipart/form-data"},
    *        tags={"Admin on MediaFile"},
    *        @SWG\Response(
    *           response=200,
    *           description="data mahasiswa.",
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
    *            name="foto",
    *            in="formData",
    *            required=true,
    *            type="file",
    *       )
    *   )
    */
    public function insertFotoDsn(Request $request, $id){
      if($request->hasFile('foto')){
        if($request->foto->isValid()){
            $path = $request->foto->store('public');
            // $lec = dosen::where('NIDN', $request->input('NIDN'));
            $lec = dosen::find($id);
            $lec->foto = $path;
            $lec->save();
            return response()->json($lec);
        }
      }
    }
}
