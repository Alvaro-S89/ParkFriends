@extends('layouts.app')

@section('title')
    Página principal
@endsection

@section('content')

    <x-get-posts :posts="$posts" />

@endsection