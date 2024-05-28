<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controllers\Middleware;
// use App\Http\Requests\StoreBookRequest;
// use App\Http\Requests\UpdateBookRequest;

class BookController extends Controller implements HasMiddleware
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
        // $books = Book::all();
        return view('index.home',['books'=>$books]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required','max:225'],
            'author'=>['required'],
            'publisher'=>['required'],
            'status'=>['required'],
            'image'=>['nullable','file','max:5000','mimes:jpg,png,webp,jpeg'],
        ]);

        $path = null;
        if($request->hasFile('image')){
            $path = Storage::disk('public')->put('books_image',$request->image);
        }

        Auth::user()->books()->create([
            'title'=>$request -> title,
            'author'=>$request -> author,
            'publisher'=>$request ->publisher,
            'status'=>$request -> status,
            'image'=>$path,
        ]);

        return redirect('dashboard')->with('success','Book added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return view('books.show',['book'=>$book]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        return view('books.edit',['book'=>$book]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
    

        $fields = $request->validate([
            'title' => ['required','max:225'],
            'author'=>['required'],
            'publisher'=>['required'],
            'status'=>['required'],
            // 'image'=>[$path],
            'image'=>['nullable','file','max:5000','mimes:jpg,png,webp,jpeg'],
        ]);

        if($request->hasFile('image')){
            //delete old image from storage
            if($book->image){
                Storage::disk('public')->delete($book->image);
            }

            //Store new image in same destination
            // $path = Storage::disk('images')->put('books_image','public',$request->image);
            $path = $request->file('image')->store('books_image','public');

            //update the image in $fields
            $fields['image'] = $path;
        }

        $book->update($fields);

        
        // Auth::user()->books()->update([
        //     'title'=>$request->title,
        //     'author'=>$request->author,
        //     'publisher'=>$request->publisher,
        //     'status'=>$request->status,
        //     'image'=>$path,
        // ]);

        // $book -> update($fields);
        // dd('updated');


        // dd('updated');

        return redirect('dashboard')->with('success','Book updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect('/')->with('success','Book Deleted Successfully!');
    }
}
