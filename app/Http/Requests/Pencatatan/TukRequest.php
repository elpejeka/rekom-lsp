<?php

namespace App\Http\Requests\Pencatatan;

use Illuminate\Foundation\Http\FormRequest;

class TukRequest extends FormRequest
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
            'kode_tuk' => 'required|max:50',
            'jenis_tuk' => 'required|max:50',
            'nama_tuk' => 'required|max:250',
            'alamat' => 'required',
            'upload_persyaratan' => 'required'
        ];
    }
}
