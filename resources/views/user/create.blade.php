@extends('layouts.layout')

@section('title') @parent Register @endsection

@section('content')
<div class="container">
    <form action="{{ route('register.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="item">
            <label for="name">Введите Ваше имя:</label>
            <input type="text" name="name" id="name" placeholder="Enter your name:" value="{{ old('name') }}" @error('name') class="is_invalid" @enderror>
        </div>
        <div class="item">
            <label for="email">Введите Ваш e-mail:</label>
            <input type="text" name="email" id="email" placeholder="Enter your e-mail:" value="{{ old('email') }}" @error('email') class="is_invalid" @enderror>
        </div>
        <div class="item">
            <label for="password">Введите Ваш пароль:</label>
            <input type="password" name="password" id="password" placeholder="Enter your password:" @error('password') class="is_invalid" @enderror>
        </div>
        <div class="item">
            <label for="password_confirmation">Введите пароль ещё раз:</label>
            <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Try password:" @error('password_confirmation') class="is_invalid" @enderror>
        </div>
        <div class="item">
            <label for="avatar">Загрузите аватар:</label>
            <input type="file" name="avatar" id="avatar" placeholder="Try avatar load:">
        </div>

        <button type="submit">Register me</button>


    </form>
</div>
@endsection
