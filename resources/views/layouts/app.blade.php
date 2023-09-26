<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
        
        
        <title>Laravel - @yield('title')</title>
        @stack('styles')
        @vite('resources/css/app.css')
        @vite('resources/js/app.js') 

    </head>
    <body class="bg-green-200">
        <header class="p-5 border-b bg-white shadow">
            <div class="container mx-auto flex justify-between items-center">
                <h1 class="text-3xl font-black">
                    <a href="/login">ParkFriends</a>
                </h1>

                <nav class="flex gap-2 items-center">
                    @auth
                    <a href="/posts/create" class="flex items-center gap-2 bg-white border p-2 mr-4 text-gray-600 rounded text-sm font-bold cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                        </svg>
                        Crear
                    </a>
                    <a href="{{ route('posts.index', auth()->user()->username) }}">
                        <img src="{{ asset('img/user.png')}}" class="w-10 h-10 mr-4" alt="user">
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
