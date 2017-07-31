<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\mahasiswa;
use App\dosen;


class AdFotoController extends Controller
{
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
