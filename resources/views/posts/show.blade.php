@extends('layouts.app')

@section('title')
    {{$post->title}}
@endsection

@section('content')
    <div class="container mx-auto flex">
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

        <div class="md:w-1/2">
            Coments
        </div>
    </div>
@endsection