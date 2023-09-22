<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        
        <title>Laravel - @yield('title')</title>
        @vite('resources/css/app.css')

    </head>
    <body class="bg-green-200">
        <header class="p-5 border-b bg-white shadow">
            <div class="container mx-auto flex justify-between items-center">
                <h1 class="text-3xl font-black">
                    <a href="/login">ParkFriends</a>
                    
                </h1>

                <nav class="flex gap-2 items-center">
                    @auth
                    <a href="#">
                        <img src="{{ asset('img/user.png')}}" class="w-10 h-10" alt="user">
                    </a>
                    <form action="/logout" method="POST">
                        @csrf
                        <button type="submit" class="font-bold uppercase text-gray-600 text-sm">Logout</button>
                    </form>
                        @endauth
                    @guest
                        <a href="/login" class="font-bold uppercase text-gray-600 text-sm">Login</a>
                        <a href="/create-account" class="font-bold uppercase text-gray-600 text-sm">Crear cuenta</a>
                    @endguest
                </nav>
                
            </div>
        </header>

        <main class="container mx-auto mt-10">
            <h1 class="font-black text-center text-4xl mb-10">
                @yield('title')
            </h1>
            <div>
            @yield('content')
        </div>

        </main>

        <footer class=" mt-5 text-center p-5 text-gray-500 font-bold">
            
            ParkFriends - ({{ now()->year }})
            
        </footer>

    
    </body>
</html>
