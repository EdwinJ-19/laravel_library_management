<x-layout>
    <div>
        <p  class="ml-20 mt-8 font-bold text-2xl text-black">Welcome Student, {{Auth::user()->username}}</p>
        <h1 class="font-bold text-zinc-700 text-xl text-center">List of Books</h1>
        <p class="text-center">Total Books in the Library: {{\App\Models\Book::count()}}</p>
    </div>

    <div class="grid grid-cols-3 gap-5 justify-center mx-52 mt-8">
        @foreach ($books as $book)
            <div class="mx-auto text-center">
                <img src="https://picsum.photos/200" alt="" height="150" width="150" class="mx-auto">
                <h1 class="text-xl font-bold">{{$book ->title}}</h1>
                <p>{{$book ->author}}</p>
                <p><span class="font-bold text-lg">Status:-</span> {{$book ->status}}</p>
            </div>
        @endforeach
    </div>

    <div>
        <div class="mt-10">
            <h1 class="font-bold text-zinc-700 text-xl text-center mb-3">Books Alloted</h1>
            <p class="text-center mb-4">Total Books alloted to you:</p>    
        </div>

        <div>
            {{-- @foreach ($student_books as $book) --}}
            <div class="mx-auto text-center">
                <img src="https://picsum.photos/200" alt="" height="150" width="150" class="mx-auto">
                <h1 class="text-xl font-bold">title</h1>
                <p>author</p>
                <p><span class="font-bold text-lg">Status:-</span></p>
            </div>
        {{-- @endforeach --}}
        </div>
    </div>
</x-layout>