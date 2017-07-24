<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
    public function rules()
    {
        return [
            'NIM' => 'required',
            'nama_depan' => 'required',
            'nama_belakang' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'jurusan_id' => 'required',
            'angkatan' => 'required',
            'kelas' => 'required',
        ];
    }

    public function messages()
    {
      return [
          'NIM.required' => 'NIM of Mahasiswa is required',
          'nama_depan.required' => 'nama_depan of Mahasiswa is required',
          'nama_belakang.required' => 'nama_belakang of Mahasiswa is required',
          'email.required' => 'email of Mahasiswa is required',
          'alamat.required' => 'alamat of Mahasiswa is required',
          'jenis_kelamin.required' => 'jenis_kelamin of Mahasiswa is required',
          'jurusan_id.required' => 'jurusan_id of Mahasiswa is required',
          'angkatan.required' => 'angkatan of Mahasiswa is required',
          'kelas.required' => 'kelas of Mahasiswa is required',
      ];
    }
}
