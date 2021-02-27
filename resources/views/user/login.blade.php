@extends('layouts.layout')

@section('title') @parent Login @endsection

@section('content')
    <div class="container">

        @if (session('error'))
            {{ session('error') }}
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf

            <div class="item">
                <label for="email">Введите Ваш e-mail:</label>
                <input type="text" name="email" id="email" placeholder="Enter your e-mail:" value="{{ old('email') }}" @error('email') class="is_invalid" @enderror>
            </div>
            <div class="item">
                <label for="password">Введите Ваш пароль:</label>
                <input type="password" name="password" id="password" placeholder="Enter your password:" @error('password') class="is_invalid" @enderror>
            </div>

            <button type="submit">Log-in</button>


        </form>
    </div>
@endsection
