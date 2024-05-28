<x-layout>
    <div class="text-center font-bold text-2xl">
        <h1 class="py-2">List of Books</h1>
        <p>Welcome Student, {{Auth::user()->username}}</p>
    </div>

    <div class="grid grid-cols-3 gap-5 justify-center mx-52 mt-8">
        <div class="mx-auto text-center">
            <img src="https://picsum.photos/200" alt="">
            <h1 class="text-xl font-bold">Title Name</h1>
            <p>Author Name</p>
            <p>Status</p>
        </div>
    </div>
</x-layout>