<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateImtRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $imt = $this->route('imt');
        return [
            'nama' => 'sometimes|string|max:80',
            'phone' => 'unique:imts,phone,' . $imt->id . ',id',
            'berat_badan' => 'sometimes|numeric',
            'tinggi_badan' => 'sometimes|numeric',

        ];
    }
}
