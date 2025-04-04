<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/ola', function(){
    // echo "Olá Mundo!!!";
    return view('ola');
});

