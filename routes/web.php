<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {return view('index.home');})->name('home');



Route::middleware('guest')->group(function(){
    Route::get('/login',function(){return view('auth.login');})->name('login');
    Route::get('/register',function(){return view('auth.register');})->name('register');
    Route::post('/register',[AuthController::class,'register']);
    Route::post('/login',[AuthController::class,'login']);
});

Route::middleware('auth')->group(function(){
    // Route::post('/logout',[AuthController::class,'logout']);
    Route::get('/dashboard', function () {return view('index.dashboard');})->name('dashboard');
    Route::get('/student', function () {return view('index.student');})->name('student');
    Route::post('/logout',[AuthController::class,'logout'])->name('logout');
});

Route::redirect('/','books');

Route::resource('books',BookController::class);

Route::resource('students',StudentController::class);