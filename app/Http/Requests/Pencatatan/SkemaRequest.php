<?php

namespace App\Http\Requests\Pencatatan;

use Illuminate\Foundation\Http\FormRequest;

class SkemaRequest extends FormRequest
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
            'pencatatan_id' => 'required',
            'kode_skema' => 'required|max:50',
            'nama_skema' => 'required|max:255',
            'klasifikasi' => 'required|max:50',
            'sub_klasifikasi' => 'required|max:50',
            'kualifikasi' => 'required|max:50',
            'jumlah_unit' => 'required|max:50',
            'acuan_skema' => 'required|max:50',
            'upload_persyaratan' => 'required'
        ];
    }
}
