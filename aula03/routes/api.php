<?php

use App\Http\Controllers\Api\FornecedorController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\ProdutoController;
use App\Http\Controllers\Api\UserController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// Route::get('produtos',[ProdutoController::class,'index']);
// Route::get('produtos/{produto}',[ProdutoController::class,'show']);


Route::prefix('v1')->group(function () {

   Route::get('/user', function (Request $request) {
    // return $request->user();
    $user =  $request->user();
    $user->currentAccessToken()->delete();
    $token =$user->createToken($user->email)->plainTextToken;
    return compact(['user','token']);
    })->middleware("auth:sanctum");

    Route::apiResource('produtos', ProdutoController::class)
        ->middleware("auth:sanctum");

   Route::apiResource('produtos', ProdutoController::class)
        ->only('update')
        ->middleware(["auth:sanctum","ability:is-admin"]);

    Route::apiResource('produtos', ProdutoController::class)
        ->only('index','show');

    Route::apiResource('fornecedores', FornecedorController::class)
        ->parameter('fornecedores', 'fornecedor')
        ->middleware("auth:sanctum");

    // Route::get('users',function(){
    //     return User::all();
    // })->middleware("force-json");

    Route::get('users',function(){
        return User::all();
    });

    Route::apiResource("users",UserController::class)->middleware("auth:sanctum");

    Route::post('/login',[LoginController::class, 'login']);
});


