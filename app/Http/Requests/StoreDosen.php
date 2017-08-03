<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDosen extends FormRequest
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
          'NIDN' => 'required|unique:dosen,NIDN' .$this->dosen,
          'nama_depan' => 'required',
          'nama_belakang' => 'required',
          'email' => 'required|unique:dosen,email' .$this->dosen,
          'alamat' => 'required',
          'jenis_kelamin' => 'required',
        ];
    }

    public function messages()
    {
      return [
          'NIDN.required' => 'NIDN of Dosen is required',
          'NIDN.unique' => 'NIDN already exists!',
          'nama_depan.required' => 'nama_depan of Dosen is required',
          'nama_belakang.required' => 'nama_belakang of Dosen is required',
          'email.required' => 'email of Dosen is required',
          'email.unique' => 'email already used!',
          'alamat.required' => 'alamat of Dosen is required',
          'jenis_kelamin.required' => 'jenis_kelamin of Dosen is required',
      ];
    }
}
