<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{env('APP_NAME')}}</title>
    <script src="https://kit.fontawesome.com/daa48e517c.js" crossorigin="anonymous"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <header class="p-6 bg-zinc-700 text-white shadow-lg">
        <nav class="flex items-center justify-between flex-wrap">
            <div class="flex items-center gap-2">
                <i class="fa-solid fa-book-atlas"></i>
                <h1>Library Management</h1>
            </div>
            <div class="flex items-center gap-2">
                <a href="{{route('home')}}" class="hover:bg-white hover:text-black transition-all ease-in-out px-4 py-1 rounded-md">Home</a>
                @auth
                    {{-- dropdown menu --}}
                    <div class="relative grid place-items-center" x-data="{open:false}">
                        {{-- dropdown button --}}
                        <button @click="open = !open" type="button" class="round-btn">
                            <img src="https://picsum.photos/200" alt="dp">
                        </button>
                        {{-- dropdown content --}}
                        <div x-show="open" @click.outside="open-false" class="bg-white shadow-lg absolute top-10 right-0 rounded-lg overflow-hidden font-light">
                            <p class="text-black pl-4 pr-8 py-2 mb-1 text-xs">{{Auth::user()->username}}</p>
                            @if (Auth::user()->role =='teacher')
                                <a href="{{route('dashboard')}}" class="text-black hover:bg-slate-100 pl-4 pr-8 py-2 mb-1">Dashboard</a>
                            @endif                            
                            <form action="{{route('logout')}}" method="POST">
                                @csrf
                                <button class="text-black hover:bg-slate-100 pl-4 pr-8 py-2 mb-1">Logout</button>
                            </form>
                        </div>
                    </div>
                @endauth
                
                @guest
                    <a href="{{route('login')}}" class="hover:bg-white hover:text-black transition-all ease-in-out px-4 py-1 rounded-md">Login</a>
                    <a href="{{route('register')}}" class="hover:bg-white hover:text-black transition-all ease-in-out px-4 py-1 rounded-md">Register</a>                    
                @endguest
            </div>
        </nav>
    </header>

    <main>
        {{$slot}}
    </main>
</body>
</html>