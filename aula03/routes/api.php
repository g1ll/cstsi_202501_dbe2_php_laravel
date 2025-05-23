<?php

use App\Http\Controllers\Api\ProdutoController;
use App\Http\Controllers\Api\UserController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware("auth:sanctum");

// Route::get('produtos',[ProdutoController::class,'index']);
// Route::get('produtos/{produto}',[ProdutoController::class,'show']);

Route::prefix('v1')->group(function () {
    Route::apiResource('produtos', ProdutoController::class);

    // Route::get('users',function(){
    //     return User::all();
    // })->middleware("force-json");

    Route::get('users',function(){
        return User::all();
    });

    Route::apiResource("users",UserController::class);
});


