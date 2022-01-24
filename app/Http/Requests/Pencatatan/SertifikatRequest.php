<?php

namespace App\Http\Requests\Pencatatan;

use Illuminate\Foundation\Http\FormRequest;

class SertifikatRequest extends FormRequest
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
            'asesor_id' => 'required',
            'klasifikasi' => 'required',
            'subklasifikasi' => 'required',
            'no_sertifikat' => 'required',
            'nrka' => 'required',
            'masa_berlaku' => 'required',
            'no_sertifikat_asesor' => 'required',
            'no_blanko' => 'required',
            'masa_berlaku_sertifikat' => 'required',
            'ska' => 'required',
            'sertifikat_asesor' => 'required'
        ];
    }
}
