@extends('layouts.app')

@section('title')
    <p>Editar perfil: {{auth()->user()->username}}</p>
@endsection

@section('content')
    <div class="md:flex md:justify-center">
        <div class="md:w-1/2 bg-white shadow p-6">
            <form action="{{ route('profile.store') }}" method="POST" enctype="multipart/form-data" class="mt-10 md:mt-0">
                @csrf
                <div class="mb-5">
                    <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">
                        Nombre de usuario
                    </label>
                    <input 
                    class="border border-black p-2 w-full rounded @error('username') border-red-500 @enderror" 
                    type="text" 
                    id="username" 
                    name="username" 
                    placeholder="Tu nombre de usuario"
                    value="{{ auth()->user()->username }}"
                    >
                    @error('username')
                        <p class="text-red-500 my-2 text-sm p-2 text-center" >{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="image" class="mb-2 block uppercase text-gray-500 font-bold">
                        Imagen de perfil
                    </label>
                    <input 
                    class="border border-black p-2 w-full rounded" 
                    type="file" 
                    id="image" 
                    name="image" 
                    value=""
                    accept=".jpg, .jpeg, .png"
                    >
                </div>

                <input class="bg-green-600 hover:bg-green-700 transition-colors cursor-pointer text-white uppercase w-full font-bold p-3"
                type="submit"
                value="Guardar cambios"
                >

            </form>
        </div>

    </div>
@endsection