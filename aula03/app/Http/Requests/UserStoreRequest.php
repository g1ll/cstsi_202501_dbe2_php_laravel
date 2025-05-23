<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class UserStoreRequest extends FormRequest
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
    public function rules()
    {
        return [
            'name'      => ' required | string | max:50 | min:3',
            // 'surname'   => ' required | string | max:50 | min:3',
            'email'     => ' required | email | unique:users',
            'password'  => ' required | confirmed | string | min:8',
        ];
    }

    public function messages()
    {
        return [
            'name.require'      => 'O nome é obrigatório!!',
            'name.max'          => 'O nome deve ter no máximo 50 caracteres!',
            // 'surname.require'   => 'O sobrenome é obrigatório!!',
            'email.require'     => 'O email é obrigatório!!',
            'email.email'       => 'Informe um email válido!',
            'email.unique'      => 'Email indiponível, cadastre outro email.',
            'password.min'      => 'A senha deve ter no mínimo oito caracteres!',
            'password.require'  => 'A senha é obrigatória!!',
        ];
    }

    //Não há necessidade deste método, pois o Laravel (+10.10) já faz isso automaticamente
    //A senha é criptografada automaticamente no Model User, usando o método casts e
    //aplicando o Mutator 'hashed' no campo password
    // protected function passedValidation(): void
    // {
    //     $this->merge(['password' => Hash::make($this->input('password'))]);
    // }
}
