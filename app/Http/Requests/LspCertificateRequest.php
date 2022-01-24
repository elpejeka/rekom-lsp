<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LspCertificateRequest extends FormRequest
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
            'permohonans_id' => 'required',
            'kode_skema' => 'required|max:100',
            'nama_skema' => 'required|max:100',
            'jabker' => 'required|max:100',
            'klasifikasi' => 'required|max:100',
            'sub_klasifikasi' => 'required|max:100',
            'kualifikasi' => 'required|max:100',
            'jumlah_unit' => 'required|max:100',
            'acuan_skema' => 'required|max:100',
            'upload_persyaratan' => 'required',
            'standar_kompetensi' => 'required',
        ];
    }
}
