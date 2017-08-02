<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests\StoreNilai;
use App\jadwal;
use App\nilai;

class DosenController extends Controller
{
    public function index(){
      $user=Auth::user();
      $user=$user->dosen;
      return response()->json($user->toArray());
    }

    public function jadwal(){
      $user=Auth::user();
      $jadwal=$user->dosen->jadwal->where('status',"On Going");
      $jadwal->load('matkul');
      return response()->json($jadwal->toArray());
    }

    public function detailjadwal($idjadwal){
      $user=Auth::user();
      $user=$user->dosen->id;
      $jadwal=jadwal::find($idjadwal);
      $jadwal->load('matkul');
      $nilai=$jadwal->nilai->load("mahasiswa");
      return response()->json($jadwal);
      // $jadwal->load('matkul')->matkul_name;
      // $namamatkul=$jadwal;
      // $nilai->load('mahasiswa');

      // $nilai=$jadwal->nilai;
      // // $jadwal->load('matkul');
      // $nilai->load('mahasiswa');
      // return response()->json($jadwal);

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
      $assignment = $nilai->assignment;
      $UTS = $nilai->UTS;
      $UAS = $nilai->UAS;

      if ($assignment == null) {
         $assignment = $request->input('assignment');
         $nilai->assignment = $assignment;
      } else {
         $nilai->assignment = $assignment;
      }

      if ($UTS == null) {
         $UTS = $request->input('UTS');
         $nilai->UTS = $UTS;
      } else {
         $nilai->UTS = $UTS;
      }

      if ($UAS == null) {
         $UAS = $request->input('UAS');
         $nilai->UAS = $UAS;
      } else {
         $nilai->UAS = $UAS;
      }

      $count = $assignment * 0.3 + $UTS * 0.3 + $UAS * 0.4;

      if ($count >= 90) {
         $total = 'A';
      } else if ($count >= 85) {
         $total = 'A-';
      }elseif ($count >= 80) {
         $total = 'B+';
      } else if ($count >= 75) {
         $total = 'B';
      } elseif ($count >= 70) {
         $total = 'B-';
      }elseif ($count >= 65) {
         $total = 'C+';
      } elseif ($count >= 60) {
         $total = 'C';
      } else {
         $total = 'F';
      }
      $nilai->total = $total;
      $nilai->save();

      return response()->json($nilai->toArray());
    }
}
