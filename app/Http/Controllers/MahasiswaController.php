<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\mahasiswa;
use \App\KRS;
use JWTAuth;
use Auth;
use Tymon\JWTAuth\Exceptions\JWTException;

class MahasiswaController extends Controller
{

    public function index(Request $request)
    {
        $user=Auth::user();
        $user=$user->mahasiswa;
        $user->jurusan->jurusan_name;
        $user->konsentrasi;
        return response()->json($user->toArray());
    }


    public function jadwal()
    {
        $user=Auth::user();
        $jadwal=$user->mahasiswa->jadwal->where('status','On Going');// ingat ganti status jadi on going ato ended
        $jadwal->load('matkul');
        return response()->json($jadwal->toArray());
    }

    public function nilai(){
        $user=Auth::user();
        $nilai=$user->mahasiswa->nilai;
        foreach ($nilai as $nil) {
            $nils=$nil->jadwal->matkul;
        }
        // $nilai->load('matkul');
        return response()->json($nilai);
        // $nilai->load('jadwal');
        // return response()->json($nilai->toArray());
    }

}
