<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
        $user = $this->route('user'); // Mendapatkan data pengguna dari rute
        return [
            //Update Logic
            'name' => 'sometimes|string|max:80',
            'email' => 'unique:users,email,' . $user->id.',id',
            'password' => 'sometimes|required',
            'phone' => 'sometimes|string',
            'address' => 'sometimes|string',
            'roles' => 'sometimes|string',
            'profile_images' => 'sometimes|string',
        ];
    }
}
