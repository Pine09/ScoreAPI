<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreJadwal extends FormRequest
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
          'dosen_id' => 'required',
          'matkul_id' => 'required',
          'day' => 'required',
          'status' => 'required',
        ];
    }

    public function messages()
    {
      return [
          'dosen_id.required' => 'ID of Dosen is required',
          'matkul_id.required' => 'ID of Mata Kuliah (Matkul) is required',
          'day' => 'Day of the class is required',
          'status' => 'Status of the schedule is required',
      ];
    }
}
