<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Controller;
use App\Http\Requests\LoginRequest;
use Exception;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(LoginRequest $request ){
        try{
            $user = $request->user;
            if(!$user) throw new Exception( "Dados inválidos!");
            $ability = $user->is_admin?["is-admin"]:[];
            $token = $user->createToken($user->email,$ability)->plainTextToken;
            return compact('token','user');
        }catch(Exception $error){
            return $this->errorHandler(
                $error->getMessage(),
                $error,
                401);
        }
    }
}
