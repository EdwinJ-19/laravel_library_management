<?php

use App\Http\Controllers\AllotController;
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
    // Route::get('/allot',function(){return view('index.allot');})->name('allot');
    Route::get('/dashboard', function () {return view('index.dashboard');})->name('dashboard');
    Route::get('/student', function () {return view('index.student');})->name('student');
    Route::post('/logout',[AuthController::class,'logout'])->name('logout');
});

Route::redirect('/','books');

Route::resource('books',BookController::class);

Route::resource('/student',StudentController::class);
// Route::get('/allot',[StudentController::class,'create'])->name('allot');
Route::get('/allot_student',[AllotController::class,'showAllotForm'])->name('allot_student');
// Route::get('/show_student',[AllotController::class,'showStudentView'])->name('show_student');
// Route::get('/show_alloted_student_book',[AllotController::class,'studentAlloted'])->name('show_alloted_student_book');