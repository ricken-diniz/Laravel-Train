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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|confirmed|min:8',
        ];
    }

    public function messages() : array
    {
        return [
            'email.required' => 'Obrigatório',
            'name.required' => 'Obrigatório',
            'pasword.required' => 'Obrigatório',
            'email.unique' => 'Usuário já cadastrarado'
        ];
    }
}
