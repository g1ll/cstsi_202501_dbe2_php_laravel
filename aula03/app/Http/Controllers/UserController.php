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

    public function show($id){
        $user =  User::find($id);
        // dd([
        //     $user->name,
        //     $user->email
        // ]);

        // return view('users.show',['user'=>$user]);
        return view('users.show',compact('user'));
    }
}
