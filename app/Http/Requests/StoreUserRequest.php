<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            //create logic validation
            'name' => 'required|string|max:80',
            'email' => 'required|unique:users',
            'password' => 'required',
            'phone' => 'string',
            'address' => 'string',
            'roles' => 'string',
            'profile_image' => 'string',
        ];
    }
}
