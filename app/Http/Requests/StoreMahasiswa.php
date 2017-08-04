<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
class StoreMahasiswa extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request $request)
    {
        return [
            'NIM' => 'required|unique:mahasiswa,NIM,' .$this->mahasiswa,
            'nama_depan' => 'required',
            'nama_belakang' => 'required',
            'email' => 'required|unique:mahasiswa,email,' .$this->mahasiswa,
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'jurusan_id' => 'required|exists:jurusan,id',
            'konsentrasi_id' => 'exists:konsentrasi,id',
            'angkatan' => 'required',
            'kelas' => 'required',
        ];
    }

    public function messages()
    {
      return [
          'NIM.required' => 'NIM of Mahasiswa is required',
          'NIM.unique' => 'NIM already exists!',
          'jurusan_id.exists'=>'Jurusan does not exists',
          'konsentrasi_id.exists'=>'Konsentrasi does not exists',
          'nama_depan.required' => 'nama_depan of Mahasiswa is required',
          'nama_belakang.required' => 'nama_belakang of Mahasiswa is required',
          'email.required' => 'email of Mahasiswa is required',
          'email.unique' => 'email already used!',
          'alamat.required' => 'alamat of Mahasiswa is required',
          'jenis_kelamin.required' => 'jenis_kelamin of Mahasiswa is required',
          'jurusan_id.required' => 'jurusan_id of Mahasiswa is required',
          'angkatan.required' => 'angkatan of Mahasiswa is required',
          'kelas.required' => 'kelas of Mahasiswa is required',
      ];
    }
}
