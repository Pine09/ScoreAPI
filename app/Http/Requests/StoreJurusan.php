<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreJurusan extends FormRequest
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
          'jurusan_code' => 'required|unique:jurusan,jurusan_code,'.$this->jurusan,
          'jurusan_name' => 'required|unique:jurusan,jurusan_name,'.$this->jurusan,
        
        ];
    }

    public function messages()
    {
      return [
          'jurusan_code.unique'=>'jurusan_code already exists!',
          'jurusan_name.unique'=>'jurusan_name already exists!',
          'jurusan_code.required' => 'jurusan_code of jurusan is required',
          'jurusan_name.required' => 'jurusan_name of jurusan is required',
      ];
    }
}
