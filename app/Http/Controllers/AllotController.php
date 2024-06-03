<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Book;
use App\Models\Student;



class AllotController extends Controller
{
    public function showAllotForm(){
        $users = User::where('role','student')->get();
        $get_books = Book::where('status', 'available')->get();
        return view('index.allot',['users'=>$users],['get_books'=>$get_books]);
    }

    // public function studentAlloted(){
    //     $student = Student::all();
    //     return view('index.allot',['student'=>$student]);
    // }
    public function showStudentView(){
        $students = Student::where('role','student');
        return view('index.student',['students'=>$students]);
    }
}
