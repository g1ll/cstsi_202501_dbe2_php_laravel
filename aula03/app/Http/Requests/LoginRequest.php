<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        if(Auth::attempt(["email"=>$this->email,"password"=>$this->password]))
            $this->merge(["user"=>User::where('email',$this->email)->first()]);

        return true;

        // }else{
        //     return false; //403 Forbiden (Não autorizado)
        // }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email'     => ' required ',
            'password'  => ' required ',
        ];
    }
}
