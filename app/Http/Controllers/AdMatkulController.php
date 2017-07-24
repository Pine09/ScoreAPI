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
    public function show($id)
    {
      $spec_matkul = matkul::find($id);
      if ($spec_matkul == null) {
        echo "No matkul with the specified description";
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
    public function destroy($id)
    {
      $del_matkul = matkul::find($id);
      $del_matkul->delete();

      return response()->json("Matkul Data of ". $del_matkul->matkul_name ." has been deleted");
    }
}
