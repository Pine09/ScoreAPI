<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreKonsentrasi extends FormRequest
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
          'jurusan_id'=>'required',
          'konsentrasi_code' => 'required|unique:konsentrasi,konsentrasi_code,'.$this->konsentrasi,
          'konsentrasi_name' => 'required|unique:konsentrasi,konsentrasi_name,'.$this->konsentrasi,
        
        ];
    }

    public function messages()
    {
      return [
          'jurusan_id.required'=>'jurusan_id of konsentrasi is required',
          'konsentrasi_code.unique'=>'konsentrasi_code already exists!',
          'konsentrasi_name.unique'=>'konsentrasi_name already exists!',
          'konsentrasi_code.required' => 'konsentrasi_code of konsentrasi is required',
          'konsentrasi_name.required' => 'konsentrasi_name of konsentrasi is required',
      ];
    }
}
