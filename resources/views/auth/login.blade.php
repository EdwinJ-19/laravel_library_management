<x-layout>
    <h1 class="text-center p-5">Login for Student or Teacher</h1>

    @session('message')
        <p class="bg-green-200 text-black border-solid border">{{session('message')}}</p>
    @endsession

    <form action="{{route('login')}}" method="POST">
        @csrf
        <div class="flex items-center flex-col p-5 text-center">
            {{-- <div class="pb-4">
                <label for="username">Username</label><br>
                <input class="border-solid border shadow-lg px-2 py-1 mt-2" type="text" name="username" placeholder="Enter your Username">
            </div> --}}
            <div class="pb-4">
                <label for="email">Email</label><br>
                <input class="border-solid border shadow-lg px-2 py-1 mt-2" type="email" name="email" placeholder="Enter your Email">
            </div>
            <div class="pb-4">
                <label for="password">Password</label><br>
                <input class="border-solid border shadow-lg px-2 py-1 mt-2" type="password" name="password" placeholder="Enter your Password">
            </div>
            {{-- <div class="pb-4">
                <label for="password_confirmation">Confirm Password</label><br>
                <input class="border-solid border shadow-lg px-2 py-1 mt-2" type="password" name="password_confirmation" placeholder="Confirm your Password">
            </div> --}}
            <div class="pb-4">
                <label for="role">Role</label><br>
                <select name="role" id="role" class="border-solid border shadow-lg px-2 py-1 mt-2">
                    <option value="student">Student</option>
                    <option value="teacher">Teacher</option>
                </select>
            </div>
            <div class="border-solid border border-black shadow-xl rounded-sm px-2 py-1 hover:bg-zinc-700 hover:text-white transition-all ease-in-out mt-4">
                <button>Login</button>
            </div>
        </div>
    </form>

</x-layout>