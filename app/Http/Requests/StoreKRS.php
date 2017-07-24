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
          'jadwal_id' => 'required',
        ];
    }

    public function messages()
    {
      return [
          'jadwal_id.required' => 'jadwal_id of KRS is required',
      ];
    }
}
