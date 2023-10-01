@extends('layouts.app')

@section('title')
    {{$post->title}}
@endsection

@section('content')
    <div class="container mx-auto md:flex">
        <div class="md:w-1/2">
            <img src="{{ asset('uploads') . '/' . $post->image }}" alt="Post image">
            <div class="p-3">
                <p>likes</p>
            </div>
            <div>
                <p class="font-bold">{{$post->user->username}}</p>
                <p class="text-sm text-gray-500">{{ $post->created_at->diffForHumans() }}</p>
                <p class="mt-5">{{ $post->description }}</p>
            </div>
        </div>

        <div class="md:w-1/2 p-5">
            
            <div class="shadow bg-white p-5 mb-5">

                @auth
                
                <p class="text-2xl font-bold text-center mb-4">Escribe un comentario</p>

                @if (session('commentMessage'))
                    <div class="bg-green-400 p-2 rounded mb-6 text-white text-center uppercase font-bold">
                        {{session('commentMessage')}}
                    </div>
                @endif

                <form action="{{ route('comments.store', ['post' => $post, 'user' => $user])}}" method="POST">
                    @csrf
                    <div class="mb-5">
                        {{-- <label for="comment" class="mb-2 block uppercase text-gray-500 font-bold">
                            Añadir comentario
                        </label> --}}
                        <textarea class="border border-black p-2 w-full rounded"
                            id="comment" 
                            name="comment" 
                            placeholder="Agrega un comentario"
                        ></textarea>
                    </div>

                    <input class="bg-green-600 hover:bg-green-700 transition-colors cursor-pointer text-white uppercase w-full font-bold p-3"
                    type="submit"
                    value="Crear comentario"
                    >

                </form>

                @endauth

                <div class="bg-white shadow mb-5 mt-10 max-h-96 overflow-y-scroll">
                    @if ($post->comments->count())
                        @foreach ($post->comments as $comment)
                            <div class="p-5 border-gray-400 border-b">
                                <a href="{{ route('posts.index', $comment->user )}}" class="font-bold" >
                                    {{$comment->user->username}}
                                </a>
                                <p>{{$comment->comment}}</p>
                                <p class="text-sm text-gray-500">{{$comment->created_at->diffForHumans()}}</p>
                            </div>
                        @endforeach
                    @else
                        <p class="p-10 text-center">No hay comentarios aún</p>
                    @endif
                </div>
            </div>

        </div>
    </div>
@endsection