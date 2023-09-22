@extends('layouts.app')

@section('title')
    Inicia sesión
@endsection

@section('content')
    <div class=" flex items-center justify-center md:flex md:items-center md:justify-center">
        <div class="md:w-4/12 md:flex md:justify-center md:items-center bg-white p-6 rounded-lg shadow-2xl">
            <form action="/login" method="POST" novalidate>
                @csrf

                @if(session('mensaje'))
                    <p class="bg-red-500 text-white my-2 rounded text-sm p-2 text-center">{{ session('mensaje') }}</p>
                @endif

                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">
                        Email
                    </label>
                    <input class="border border-black p-2 rounded @error('email') border-red-500 @enderror" 
                    type="email" 
                    id="email" 
                    name="email" 
                    placeholder="Tu email"
                    value="{{ old('email')}}"
                    >
                    @error('email')
                        <p class="text-red-500 my-2 text-sm p-2 text-center" >{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">
                        Contraseña
                    </label>
                    <input class="border border-black p-2 rounded @error('password') border-red-500 @enderror" 
                    type="password" 
                    id="password" 
                    name="password" 
                    placeholder="Tu contraseña"
                    >
                    @error('password')
                        <p class="text-red-500 my-2 text-sm p-2 text-center" >{{ $message }}</p>
                    @enderror
                </div>

                <div class= "mb-5">
                    <input type="checkbox" name="remember"><label class="text-gray-700">Mantener mi sesión abierta</label>
                </div>
                
                <input class="bg-green-600 hover:bg-green-700 transition-colors cursor-pointer text-white uppercase w-full font-bold p-3"
                type="submit"
                value="Iniciar sesión"
                >
            </form>
        </div>
    </div>
@endsection