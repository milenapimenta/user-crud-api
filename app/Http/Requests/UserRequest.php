<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

class UserRequest extends FormRequest
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
        $userId = $this->route('user');

        return [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . ($userId ? $userId->id : null),
            'password' => 'required|min:8',
        ];
    }

    /**
     * Handle a failed validation attempt.
     */
    protected function failedValidation(Validator $validator) {
        throw new ValidationException($validator, response()->json([
            'status' => false,
            'error' => $validator->errors(),
        ], 422));
    }

    public function messages() : array {
        return [
            'name.required' => "Campo nome é obrigatório!",
            'email.required' => "Campo e-mail é obrigatório!",
            'email.email' => "Formato de e-mail inválido!",
            'email.unique' => "O e-mail já está cadastrado!",
            'password.required' =>  "Campo senha é obrigatório!",
            'password.min' => "A senha deve ter no mínimo :min caracteres!",
        ];
    }
}
