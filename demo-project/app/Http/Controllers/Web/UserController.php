<?php

namespace App\Http\Controllers;
use App\models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // function getUser($id){
    //     $user = User::find($id);
    //     return view('profile',['user'=>$user]);
    // }
    function index(){
        return view('user');
    }
}
