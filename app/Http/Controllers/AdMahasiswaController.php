<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\mahasiswa;
use App\Http\Requests\StoreMahasiswa;

class AdMahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stud_data = mahasiswa::paginate(5);
        return response()->json($stud_data->toArray());
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
    public function store(StoreMahasiswa $request)
    {
        $new_stud = new mahasiswa();
        $new_stud->NIM = $request->input('NIM');
        $new_stud->nama_depan = $request->input('nama_depan');
        $new_stud->nama_belakang = $request->input('nama_belakang');
        if($request->hasFile('foto')){
          if($request->foto->isValid()){
              $path = $request->foto->store('public');
                // $stud = mahasiswa::where('NIM', $nim);
              $new_stud->foto = $path;
          }
        }
        $new_stud->email = $request->input('email');
        $new_stud->alamat = $request->input('alamat');
        $new_stud->jenis_kelamin = $request->input('jenis_kelamin');
        $new_stud->jurusan_id = $request->input('jurusan_id');
        $new_stud->konsentrasi_id = $request->input('konsentrasi_id');
        $new_stud->angkatan = $request->input('angkatan');
        $new_stud->kelas = $request->input('kelas');
        $new_stud->save();

        return response()->json($new_stud);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $spec_stud = mahasiswa::find($id);
        if ($spec_stud == null) {
          echo "No student with the specified description";
        }
        else {
          return response()->json($spec_stud->toArray());
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
    public function update(StoreNilai $request, $id)
    {
      $old_stud = mahasiswa::find($id);

      $old_stud->NIM = $request->input('NIM');
      $old_stud->nama_depan = $request->input('nama_depan');
      $old_stud->nama_belakang = $request->input('nama_belakang');
      $old_stud->email = $request->input('email');
      $old_stud->alamat = $request->input('alamat');
      $old_stud->jenis_kelamin = $request->input('jenis_kelamin');
      $old_stud->jurusan_id = $request->input('jurusan_id');
      $old_stud->konsentrasi_id = $request->input('konsentrasi_id');
      $old_stud->angkatan = $request->input('angkatan');
      $old_stud->save();

      return response()->json($old_stud);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $del_stud = mahasiswa::find($id);
      $del_stud->delete();

      return response()->json("Student Data of ". $del_stud->nama_depan . " " . $del_stud->nama_belakang ." has been deleted");
    }
}
