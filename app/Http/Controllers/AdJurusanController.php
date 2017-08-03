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
    public function destroy($id)
    {
       $jurusan = jurusan::find($id);
      $jurusan->delete();

      return response()->json("Jurusan Data of ". $jurusan->jurusan_name." has been deleted");
    }
}
