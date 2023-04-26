<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DetailAsesorRequest extends FormRequest
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
            // 'klasifikasi' => 'required',
            // 'subklasifikasi' => 'required',
            'kualifikasi' => 'required',
            'nrka' => 'required',
            'no_sertifikat_asesor' => 'required',
            'sub_klasifikasi_sertifikat' => 'required',
            'kualifikasi_sertifikat' => 'required',
            'ska' => 'required',
            'sertifikat_asesors' => 'required'
        ];
    }
}
