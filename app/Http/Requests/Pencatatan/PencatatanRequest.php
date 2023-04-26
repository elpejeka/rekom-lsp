<?php

namespace App\Http\Requests\Pencatatan;

use Illuminate\Foundation\Http\FormRequest;

class PencatatanRequest extends FormRequest
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
            'upload_persyaratan' => 'required',
            'sk_lisensi' => 'required',
            'sertifikat' => 'required',
            'foto_lsp' => 'required',
            'logo_lsp' => 'required',
            'jumlah_skema' => 'required'
        ];
    }
}
