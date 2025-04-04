<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $usersList = User::all();
        // dd($usersList);
        return view('users.index',['listUsers'=>$usersList]);
    }
}
