<x-layout>

    <container>
        <h1 class="ml-20 mt-8 font-bold text-2xl text-black">Welcome Teacher, {{Auth::user()->username}}.</h1>
        <h1 class="text-center text-zinc-700 mt-6 text-xl font-bold">Latest Books</h1>
        <p class="text-center">Total Books in the Library: {{\App\Models\Book::count()}}</p>
    </container>

    @if (session('success'))
    <p class="text-green-500 border-solid border shadow-xl mx-10 mt-5 p-5">{{session('success')}}</p>
    @else
        <p class="text-red-500">{{session('delete')}}</p>
    @endif
    <div class="grid grid-cols-3 gap-5 justify-center mx-52 mt-8">
        @foreach ($books as $book)
        <div class="mx-auto text-center border-solid border shadow-lg px-9 py-5">
        <img src="{{asset('public/books_image/'. $book->image)}}" alt="{{$book->image}}" height="150" width="150" class="mx-auto">
            <h1 class="text-xl font-bold">{{$book->title}}</h1>
            <p>{{$book->author}}</p>
            <div>
                <h1 class="font-bold text-lg">Status:</h1><p>{{$book->status}}</p>
            </div>
            <div class="text-center text-xs font-light mt-3">
                <span>Book Uploaded at {{$book->created_at->diffForHumans()}}</span><br>
                <span>Book Updated at {{$book->updated_at->diffForHumans()}}</span>
            </div>
            <div class="flex items-center justify-between mt-3">
                {{-- update post --}}
                <a href="{{route('books.edit',['book'=>$book->id])}}" class="bg-green-500 text-white rounded-md px-2 py-1 text-md">Edit</a>
                {{--delete post  --}}
                <form action="{{route('books.destroy', ['book'=>$book->id])}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="bg-red-500 text-white px-2 py-1 text-md rounded-md">Delete</button>
                </form>
            </div>
        </div>    
        @endforeach
    </div>

    <container>
        <h1 class="text-center text-zinc-700 mt-6 text-xl font-bold">Alloted Books</h1>
        <p class="text-center">Total Student Alloted for the books: "ALLOTED_BOOK_COUNT"</p>
    </container>       
</x-layout>