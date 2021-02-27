@extends('layouts.layout')

@section('title') @parent {{ $title }} @endsection


@section('content')

    <h1>Home</h1>

    <div class="posts">
        <div class="post">
            <p>Заголовок поста</p>
            <span>Текст поста</span>
        </div>
    </div>

@endsection
