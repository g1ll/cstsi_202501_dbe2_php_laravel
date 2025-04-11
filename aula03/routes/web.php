<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/ola', function(){
    // echo "Olá Mundo!!!";
    return view('ola');
});


Route::get('/hola',[HomeController::class,'index']);

Route::get('/users',[UserController::class,'index']);
Route::get('/users/{id}',[UserController::class,'show']);


Route::get('/produtos',[ProdutoController::class,'index']);
Route::get('/produtos/{id}',[ProdutoController::class,'show']);
