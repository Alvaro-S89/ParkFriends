@extends('layouts.app')

@section('title')
    Regístrate
@endsection

@section('content')
    <div class=" flex items-center justify-center md:flex md:items-center md:justify-center">
        <div class="md:w-4/12 md:flex md:justify-center md:items-center bg-white p-6 rounded-lg shadow-2xl">
            <form action="/create-account" method="POST">
                @csrf
                <div class="mb-5">
                    <label for="name" class="mb-2 block uppercase text-gray-500 font-bold">
                        Nombre
                    </label>
                    <input class="border border-black p-2 rounded @error('name') border-red-500 @enderror" 
                    type="text" 
                    id="name" 
                    name="name" 
                    placeholder="Tu nombre"
                    value="{{ old('name')}}"
                    >
                    @error('name')
                        <p class="text-red-500 my-2 text-sm p-2 text-center" >{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">
                        Nombre de usuario
                    </label>
                    <input class="border border-black p-2 rounded @error('username') border-red-500 @enderror" 
                    type="text" 
                    id="username" 
                    name="username" 
                    placeholder="Tu nombre de usuario"
                    value="{{ old('username')}}"
                    >
                    @error('username')
                        <p class="text-red-500 my-2 text-sm p-2 text-center" >{{ $message }}</p>
                    @enderror
                </div>

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

                <div class="mb-5">
                    <label for="password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold">
                        Repetir contraseña
                    </label>
                    <input class="border border-black p-2 rounded" 
                    type="password" 
                    id="password_confirmation" 
                    name="password_confirmation" 
                    placeholder="Repite tu contraseña"
                    >
                </div>
                <input class="bg-green-600 hover:bg-green-700 transition-colors cursor-pointer text-white uppercase w-full font-bold p-3"
                type="submit"
                value="Crear cuenta"
                >
            </form>
        </div>
    </div>
@endsection