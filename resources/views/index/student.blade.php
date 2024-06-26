<x-layout>
    <div>
        <p  class="ml-20 mt-8 font-bold text-2xl text-black">Welcome Student, {{Auth::user()->username}}</p>
        <h1 class="font-bold text-zinc-700 text-xl text-center">List of Books</h1>
        <p class="text-center">Total Books in the Library: {{\App\Models\Book::count()}}</p>
    </div>

    <div class="grid grid-cols-3 gap-5 justify-center mx-52 mt-8">
        @foreach ($books as $book)
            <div class="mx-auto text-center">
                <img src="{{asset('storage/'.$book->image)}}" alt="{{$book->title}}" class="mx-auto h-40 w-40 object-contain">
                <h1 class="text-xl font-bold">{{$book ->title}}</h1>
                <p>{{$book ->author}}</p>
                <p><span class="font-bold text-lg">Status:-</span> {{$book ->status}}</p>
            </div>
        @endforeach
    </div>

    <div>
        <div class="mt-10">
            <h1 class="font-bold text-zinc-700 text-xl text-center mb-3">Books Alloted</h1>
            <p class="text-center mb-4">Total Books alloted to you: {{\App\Models\Student::count()}}</p>    
        </div>

        <div class="grid grid-cols-3 gap-5 justify-center mx-52 mt-8">
            {{-- <form action="{{route('allot_student')}}" method="POST"> --}}
                {{-- @foreach ($student as $student) --}}
                    @foreach ($books as $book)
                        <div class="mx-auto text-center">
                            <img src="{{asset('storage/'.$book->image)}}" alt="{{$book->title}}" class="mx-auto h-40 w-40 object-contain">
                            <h1 class="text-xl font-bold">{{$book->title}}</h1>
                            <p class="text-md font-semibold">Alloted to 
                                @if ($book->user->name == null)
                                    {{$book->user->name}}
                                @endif
                                {{-- {{$book->user->username}} --}}
                            </p>
                            <p>{{$book->author}}</p>
                            <p><span class="font-semibold text-lg">Status:- {{$book->user->student->r_status}}</span></p>
                        </div>                    
                    {{-- @endforeach --}}
                @endforeach
            {{-- </form> --}}
        </div>
    </div>
</x-layout>