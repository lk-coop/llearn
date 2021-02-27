@extends('layouts.layout')
@section('title') @parent Send mail @endsection

@section('content')

<div class="container">
    <form method="POST" action="/send">

        @csrf
        <div class="item">
            <label for="name">Your name:</label>
            <input type="text" name="name" id="name" placeholder="Enter your name:" value="{{ old('name') }}" @error('name') class="is_invalid" @enderror>
        </div>
        <div class="item">
            <label for="email">Your name:</label>
            <input type="email" name="email" id="email" placeholder="Enter your e-mail:" value="{{ old('email') }}" @error('email') class="is_invalid" @enderror>
        </div>
        <div class="item">
            <label for="text">Text:</label>
            <textarea name="text" id="text" placeholder="Enter your message:" cols="30" rows="5" {{ old('text') }}></textarea>
            @error('text')
            <div class="error_notify">
                <p>{{ $message }}</p>
            </div>
            @enderror
        </div>

        <button type="submit">Send message</button>

    </form>
</div>

@endsection
