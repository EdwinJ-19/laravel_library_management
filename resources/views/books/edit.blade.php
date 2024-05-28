<x-layout>
    @if (session('success'))
        <p class="text-green-500 border-solid border shadow-xl mx-10 mt-5 p-5">{{session('success')}}</p>
    @else
        <p class="text-red-500">{{session('delete')}}</p>
    @endif
    <div class="mx-11 mt-5">
        <a href="{{route('home')}}" class="block mb-2 text-xs text-blue-500">&larr; Go back to your home</a>
    </div>
    <div>
        <div class="border-solid border shadow-2xl mx-10 mt-1 p-5">
            <h1 class="text-zinc-700 text-center font-bold">Update your Book</h1>
            <form action="{{route('books.update',['book'=>$book->id])}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="w-full border-solid border p-2" placeholder="Book Title" value="{{old('title')}}">
                </div>
            
                <div class="mb-4">
                    <label for="author">Author</label>
                    <input type="text" name="author" class="w-full border-solid border p-2" placeholder="Book Author" value="{{old('author')}}">
                </div>
            
                <div class="mb-4">
                    <label for="publisher">Publisher</label>
                    <input type="text" name="publisher" class="w-full border-solid border p-2" placeholder="Book Publisher" value="{{old('publisher')}}">
                </div>
            
                <div class="mb-4">
                    <label for="status">Status</label>
                    <input type="text" name="status" class="w-full border-solid border p-2" placeholder="Book Status" value="{{old('status')}}">
                </div>
            
                <div class="mb-4">
                    <label for="title">Book_Photo:</label>
                    <input type="file" name="image" id="image">
                </div>
            
                <div class="mb-4">
                    <button class="border-solid border px-2 py-1 hover:bg-slate-700 hover:text-white transition-all ease-in-out rounded-md">Submit</button>
                </div>
            </form>
        </div>
    </div>
</x-layout>