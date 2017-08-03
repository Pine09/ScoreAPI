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
    public function show($id)
    {
      $spec_KRS = KRS::find($id);
      if ($spec_KRS == null) {
        echo "No KRS with the specified description";
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
    public function destroy($id)
    {
      $del_KRS = KRS::find($id);
      $del_KRS->delete();

      return response()->json("KRS Data of Student with ID = ". $del_KRS->mahasiswa_id ." has been deleted");
    }
}
