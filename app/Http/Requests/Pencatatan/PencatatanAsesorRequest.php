<?php

namespace App\Http\Requests\Pencatatan;

use Illuminate\Foundation\Http\FormRequest;

class PencatatanAsesorRequest extends FormRequest
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
            'nama_asesor' => 'required|max:255',
            'nik' => 'required',
            'alamat' => 'required',
            'status_asesor' => 'required'
        ];
    }
}
