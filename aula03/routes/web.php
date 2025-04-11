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

Route::get('/produto',[ProdutoController::class,'create']);
Route::post('/produto',[ProdutoController::class,'store']);

Route::get('/produto/edit/{id}',[ProdutoController::class,'edit'])->name('produto.edit');
Route::post('/produto/update/{id}',[ProdutoController::class,'update'])->name('produto.update');

Route::get('/produto/delete/{id}',[ProdutoController::class,'delete'])->name('produto.delete');

