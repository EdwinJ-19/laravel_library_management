<x-layout>
    <div class="mx-11 mt-5">
        <a href="{{route('home')}}" class="block mb-2 text-xs text-blue-500">&larr; Go back to your home</a>
    </div>
    
    <div>
        <h1 class="text-center text-zinc-700 font-bold text-xl">Allot Book to Student</h1>
    </div>

    @if (session('success'))
        <p class="text-green-500 border-solid border shadow-xl mx-10 mt-5 p-5">{{session('success')}}</p>
    @else
        <p class="text-red-500">{{session('delete')}}</p>
    @endif
    <div>
        <div class="border-solid border shadow-2xl mx-10 mt-5 p-5">
            {{-- <h1 class="text-zinc-700 text-center font-bold">Add A book in the list</h1> --}}
            <form action="{{route('student.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="name">Student Name</label>
                    <input type="text" name="name" class="w-full border-solid border p-2" placeholder="Student Name">
                </div>
                <div class="mb-4">
                    <label for="title">Title</label>
                    {{-- <input type="text" name="title" class="w-full border-solid border p-2" placeholder="Book Title"> --}}
                    <select name="title" class="w-full border-solid border p-2">
                        @foreach ($get_books as $book)
                            {{-- <option value="title"></option> --}}
                            <option value="{{$book->title}}">{{$book->title}}</option>
                        @endforeach
                    </select>
                </div>
            
                <div class="mb-4">
                    <label for="author">Author</label>
                    {{-- <input type="text" name="author" class="w-full border-solid border p-2" placeholder="Book Author"> --}}
                    <select name="author" class="w-full border-solid border p-2">
                        @foreach ($get_books as $book)
                            <option value="{{$book->author}}">{{$book->author}}</option>
                        @endforeach
                    </select>
                </div>
            
                <div class="mb-4">
                    <label for="publisher">Publisher</label>
                    {{-- <input type="text" name="publisher" class="w-full border-solid border p-2" placeholder="Book Publisher"> --}}
                    <select name="publisher" class="w-full border-solid border p-2">
                        @foreach ($get_books as $book)
                            <option value="{{$book->publisher}}">{{$book->publisher}}</option>
                        @endforeach
                    </select>
                </div>
            
                <div class="mb-4">
                    <label for="r_status">Return Status</label>
                    {{-- <input type="text" name="r_status" class="w-full border-solid border p-2" placeholder="Book Return Status"> --}}
                    <select name="r_status" class="w-full border-solid border p-2">
                        <option value="Pending">Pending</option>
                        <option value="Returned">Returned</option>
                        <option value="Not_Returned">Not Returned</option>
                    </select>
                </div>
            
                <div class="mb-4">
                    <label for="image">Book_Photo:</label>
                    <input type="file" name="image" id="image">
                </div>
            
                <div class="mb-4">
                    <button class="border-solid border px-2 py-1 hover:bg-slate-700 hover:text-white transition-all ease-in-out rounded-md">Allot?</button>
                </div>
            </form>
        </div>
    </div>

    <container>
        <h1 class="text-center text-zinc-700 mt-8 text-xl font-bold">Alloted Books</h1>
        <p class="text-center">Total Student Alloted for the books: {{\App\Models\Student::count()}}</p>
    </container>  
    
    <div>
        <div class="grid grid-cols-3 gap-5 justify-center mx-52 mt-8 mb-14">
            @foreach ($student as $book)
                <div class="border-solid border shadow-xl px-9 py-5 text-center">
                    <img src="{{asset('storage/'. $book->image)}}" alt="{{$book->image}}" class="mx-auto h-40 w-40 object-contain">
                    <h1 class="text-xl font-bold">{{$book->title}}</h1>
                    <h1 class="text-xl font-semibold">Alloted to {{$book->name}}</h1>
                    <p>{{$book->author}}</p>
                <div>
                    <h1 class="font-bold text-lg">Status:</h1><p>{{$book->r_status}}</p>
                </div>
                <div class="text-center text-xs font-light mt-3">
                    <span>Book alloted at {{$book->created_at->diffForHumans()}}</span>
                </div>
                <form action="{{route('student.destroy', ['student'=>$book->id])}}" method="POST" class="flex items-center justify-center mt-2">
                    @csrf
                    @method('DELETE')
                    <button class="bg-red-500 text-white px-2 py-1 text-md rounded-md">Delete</button>
                </form>
                </div>
            @endforeach
        </div>
    </div>

</x-layout>