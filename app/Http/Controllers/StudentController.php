<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Student;
// use App\Http\Requests\StoreStudentRequest;
// use App\Http\Requests\UpdateStudentRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;


class StudentController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('auth', except: ['index','store','edit']),
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::orderBy("created_at","desc")->get();
        return view('index.student',['books'=>$books]);
        // $student_books = Student::orderBy("created_at","desc")->get();
        // $student_books = Book::orderBy("created_at","desc");
        // return view('index.home',['student_books'=>$student_books]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $get_books = Book::where('status', 'available')->get();
        $student = Student::all();
        return view("index.allot", ['get_books' => $get_books],['student'=>$student]);
        // return view('index.allot',['student'=>$student]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>['required','string'],
            'title'=>['required'],
            'author'=>['required'],
            'publisher'=>['required'],
            'r_status'=>['required','string'],
            'image'=>['nullable','file','max:3000','mimes:jpg,png,webp,jpeg'],
        ]);

        $path = null;
        if($request->hasFile('image')){
            $path = Storage::disk('public')->put('student_books_image',$request->image);
        }

        Auth::user()->student()->create([
            'name'=>$request->name,
            'title'=>$request->title,
            'author'=>$request->author,
            'publisher'=>$request->publisher,
            'r_status'=>$request->r_status,
            'image'=>$path,
        ]);

        // dd('book alloted');

        return redirect()->route('allot')->with('success','Book Alloted!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        // $student = Student::all();
        // return view('allot',['student'=>$student]);
        // $alloted_books = $student->alloted_books();
        // return view('index.allot',['alloted_books'=>$alloted_books]);
        $student = Student::all();
        return view('index.show',['student'=>$student]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }
}
