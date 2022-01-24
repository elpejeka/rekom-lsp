<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AsesorRequest extends FormRequest
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
            'nama_asesor' => 'required|max:255',
            'nik' => 'required',
            'tercatat' => 'required',
            'alamat' => 'required',
            'status_asesor' => 'required'
        ];
    }
}
