@extends('layouts.app')

@section('title')
    crea un post nuevo
@endsection

@push('styles')
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

@section('content')

    <div class="md:flex md:items-center">
        <div class="md:w-1/2 px-10">
            <form action="/images" method="POST" enctype="multipart/form-data" id="dropzone" 
            class="dropzone border border-black w-full h-96 rounded flex flex-col justify-center items-center">
                @csrf
            </form>
        </div>

        <div class="md:w-1/2 px-10 bg-white p-6 rounded-lg shadow-2xl mt-10 md:mt-0">
            <form action="/posts" method="POST">
                @csrf
                <div class="mb-5">
                    <label for="title" class="mb-2 block uppercase text-gray-500 font-bold">
                        Título
                    </label>
                    <input class="border border-black p-2 w-full rounded @error('title') border-red-500 @enderror"
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
                    <textarea class="border border-black p-2 w-full rounded @error('description') border-red-500 @enderror"
                        id="description" 
                        name="description" 
                        placeholder="Escribe una descripción"
                    >{{ old('description')}}</textarea>
                </div>

                <div>
                    <input name="postImage" type="hidden" value="{{old('postImage')}}">
                </div>

                <input class="bg-green-600 hover:bg-green-700 transition-colors cursor-pointer text-white uppercase w-full font-bold p-3"
                type="submit"
                value="Crear publicación"
                >
            </form>
        </div>
    </div>
@endsection