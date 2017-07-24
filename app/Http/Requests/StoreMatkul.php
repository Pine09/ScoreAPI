<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMatkul extends FormRequest
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
          'matkul_code' => 'required',
          'matkul_name' => 'required',
          'bobot' => 'required',
        ];
    }

    public function messages()
    {
      return [
          'matkul_code.required' => 'matkul_code of Matkul is required',
          'matkul_name.required' => 'matkul_name of Matkul is required',
          'bobot.required' => 'Bobot of Matkul is required',
      ];
    }
}
