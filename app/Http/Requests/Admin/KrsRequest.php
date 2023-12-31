<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class KrsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'nim' => 'required',
            'tahun_akademik_id' => 'required',
            'mata_kuliah_id' => 'required',
            'mahasiswa_id' => 'required',
            'nilai' => 'nullable',
        ];
    }
}
