<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(){
        $text = "Hola Laravel";//poderia vir do banco
        // dd($text);
        return view('hola',['content'=>$text]); 
    }
}
