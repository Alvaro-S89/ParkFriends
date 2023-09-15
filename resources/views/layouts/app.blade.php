<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        
        <title>Laravel</title>
        @vite('resources/css/app.css')

    </head>
    <body class="br-gray-100">
        <header class="p-5 border-b bg-white shadow">
            <div class="container mx-auto flex justify-between items-center">
                <h1 class="text-3xl font-black">
                    ParkFriends
                </h1>
            </div>
        </header>
    


        <h1 class="text-4xl">@yield('title')</h1>
    </body>
</html>
