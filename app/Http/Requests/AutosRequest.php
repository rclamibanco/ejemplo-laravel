<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AutosRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'modelo' => 'required|min:3',
            'idmarca' => 'required|numeric',
            'anio' => 'required|numeric|min:1960|max:' . date('Y')
        ];
    }
}
