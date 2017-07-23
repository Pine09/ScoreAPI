<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests\StoreNilai;

class DosenController extends Controller
{
    public function index(){
      $user=Auth::user();
      $user=$user->dosen;
      return response()->json($user->toArray());
    }

    public function jadwal(){
      $user=Auth::user();
      $jadwal=$user->dosen->jadwal;// ingat ganti status jadi on going ato ended
      $jadwal->load('matkul');
      return response()->json($jadwal->toArray());
    }

    public function insertNilai(StoreNilai $request){
      $user = Auth::user();
      $jadwal = $user->dosen->jadwal->where('id', $request->input('jadwal_id'))->first();
      $nilai = $jadwal->nilai->where('mahasiswa_id', $request->input('mahasiswa_id'))->first();


      // $nilai = $user->dosen->jadwal->load(['nilai' => function($query) use ($request){
      //   $query->where('mahasiswa_id', $request->input('mahasiswa_id'));
      // }])->first();

      // $nilai = Nilai::where([
      //   ['mahasiswa_id', $request->input('mahasiswa_id')],
      //   ['jadwal_id', $request->input('jadwal_id')],
      // ])->first();

      // $nilai = $nilai::where('mahasiswa_id', $request->input('mahasiswa_id'))->first();

      $nilai->score = $request->input('score');
      $nilai->save();

      return response()->json($nilai->toArray());
    }
}
