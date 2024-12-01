<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});
Route::get('unauth', function () {
    return view('unauth');
});

// Route::get('/user', function(){
//     return view ('user');
// });

Route::get('/user1/{id}', function($id){
    return "Something $id";
});

Route::get('/home2', function(){
    return view('layouts.profile');
});

Route::get('/user/{id}', [UserController::class, 'getUser']);
Route::get('/course', [CourseController::class, 'index']);
Route::get('/course/{id}', [CourseController::class, 'findCourse'])->middleware('CheckHeaders');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
