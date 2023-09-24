@extends('layouts.app')

@section('title')
    crea un post nuevo
@endsection

@section('content')
    <div class="md:flex md:items-center">
        <div class="md:w-1/2 px-10">
            <label class="flex flex-col justify-center items-center"> 
                <img class='w-80 h-80 cursor-pointer' src="{{ asset('img/puppys.png')}}" alt="add-post" />
                <input type="file" class='hidden' />
            </label>
        </div>

        <div class="md:w-1/2 px-10 bg-white p-6 rounded-lg shadow-2xl mt-10 md:mt-0">
            <form action="#" method="POST">
                @csrf
                <div class="mb-5">
                    <label for="title" class="mb-2 block uppercase text-gray-500 font-bold">
                        Título
                    </label>
                    <input class="border border-black p-2 w-full rounded"
                    type="text" 
                    id="title" 
                    name="title" 
                    placeholder="Título"
                    value="{{ old('title')}}"
                    >
                </div>

                <div class="mb-5">
                    <label for="description" class="mb-2 block uppercase text-gray-500 font-bold">
                        Descripción
                    </label>
                    <textarea class="border border-black p-2 w-full rounded"
                    id="description" 
                    name="description" 
                    placeholder="Escribe una descripción"
                    >{{ old('title')}}</textarea>
                </div>

                <input class="bg-green-600 hover:bg-green-700 transition-colors cursor-pointer text-white uppercase w-full font-bold p-3"
                type="submit"
                value="Crear publicación"
                >
            </form>
        </div>
    </div>
@endsection