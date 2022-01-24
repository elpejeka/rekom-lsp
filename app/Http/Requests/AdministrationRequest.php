<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdministrationRequest extends FormRequest
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
            'nama' => 'required|max:255',
            'no_akta' => 'required',
            'jenis_lsp' => 'required|max:255',
            'unsur_pembentuk' => 'required',
            'nama_unsur' => 'required',
            'kategori_lsp' => 'required',
            'ketersediaan_sistem' => 'required',
            'alamat' => 'required',
            'status_kepemilikan' => 'required|max:255',
            'no_telp' => 'required|max:255',
            'website' => 'required|max:255',
            'email' => 'required|max:255',
            'jumlah_skema' => 'required|max:255',
            'upload_persyaratan' => 'required',
            'akta_pendirian' => 'required',
            'bukti_kepemilikan' => 'required'
        ];
    }
}
