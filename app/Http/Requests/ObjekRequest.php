<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ObjekRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nama_kandidat'         => ['required', 'string', 'max:255', Rule::unique('objek', 'nama_kandidat')->ignore($this->id)],
            'posisi_lamar'          => 'required|string|max:255',
            'pendidikan_terakhir'   => 'required|string|max:255',
            'pengalaman_kerja'      => 'required|string|max:255',
        ];
    }
}
