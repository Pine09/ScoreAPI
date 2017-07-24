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
    public function show($id)
    {
      $spec_schdl = jadwal::find($id);
      if ($spec_schdl == null) {
        echo "No schedule with the specified description";
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
    public function destroy($id)
    {
      $del_stud = jadwal::find($id);
      $del_stud->delete();

      return response()->json("Schedule Data with ID = ". $del_stud->id ." has been deleted");
    }
}
