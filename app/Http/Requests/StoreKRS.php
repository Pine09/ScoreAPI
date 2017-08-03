<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreKRS extends FormRequest
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
          'jadwal_id' => 'required|exists:jadwal,id',
          'mahasiswa_id' => 'required|exists:mahasiswa,id'
        ];
    }

    public function messages()
    {
      return [
          'jadwal_id.exists'=>"Jadwal does not exists",
          'mahasiswa_id.exists'=>'Mahasiswa does not exists',
          'jadwal_id.required' => 'jadwal_id of KRS is required',
          'mahasiswa_id.required' => 'mahasiswa_id of KRS is required',
      ];
    }
}
