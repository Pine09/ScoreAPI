<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreNilai extends FormRequest
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
            'mahasiswa_id' => 'required',
            'jadwal_id' => 'required',
            // 'assignment' => 'required',
            // 'UTS' => 'required',
            // 'UAS' => 'required',
        ];
    }

    public function messages()
    {
      return [
          'mahasiswa_id.required' => 'ID of Mahasiswa is required',
          'jadwal_id.required' => 'ID of Jadwal is required',
         //  'assignment.required' => 'Assignment must be defined for insertion. If you do not use this, please insert zero',
         //  'UTS.required' => 'UTS must be defined for insertion',
         //  'UAS.required' => 'UAS must be defined for insertion',
      ];
    }
}
