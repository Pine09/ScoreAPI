<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\konsentrasi;
use App\jurusan;
use App\Http\Requests\StoreKonsentrasi;

class AdKonsentrasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
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
    public function store(StoreKonsentrasi $request)
    {
      
            $konsentrasi = new konsentrasi();
            $konsentrasi->konsentrasi_code=$request->input('konsentrasi_code');
            $konsentrasi->konsentrasi_name=$request->input('konsentrasi_name');
            $konsentrasi->jurusan_id=$request->input('jurusan_id');
            $konsentrasi->save();
            return response()->json($konsetrasi);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
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
    public function update(StoreKonsentrasi $request, $id)
    {   
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
    public function destroy($id)
    {
        $konsentrasi = jurusan::find($id);
        $konsentrasi->delete();

        return response()->json("Jurusan Data of ". $jurusan->jurusan_name." has been deleted");
    }
}
