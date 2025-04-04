<?php

use App\Http\Controllers\HomeController;
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
