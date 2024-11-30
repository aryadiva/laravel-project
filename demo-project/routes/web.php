<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/user', function(){
//     return view ('user');
// });

Route::get('/user1/{id}', function($id){
    return "Something $id";
});

Route::get('/user/{id}', [UserController::class, 'getUser']);