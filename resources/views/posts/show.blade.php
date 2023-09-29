@extends('layouts.app')

@section('title')
    {{$post->title}}
@endsection

@section('content')
    <div class="w-2/6 h-2/6">
        <img src="{{ asset('uploads') . '/' . $post->image }}" alt="Post image">
    </div>
@endsection