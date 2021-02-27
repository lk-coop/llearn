@extends('layouts.layout')
@section('title') @parent {{ 'Добавление поста в блог' }} @endsection

@section('content')

    <nav>
        <ul>
            <li><a href="{{ route('home') }}">Вернуться назад</a></li>
        </ul>
    </nav>

    <form action="{{ route('posts.store') }}" method="post">
        @csrf
        <div class="item">
            <label for="title">Post title:</label>
            <input type="text" name="title" id="text" placeholder="Title..." value="{{ old('title') }}" @error('title') class="is_invalid" @enderror>
        </div>
        <div class="item">
            <label for="text">Post text:</label>
            <textarea name="text" id="text" placeholder="Post text..." cols="30" rows="5" {{ old('text') }}></textarea>
            @error('text')
            <div class="error_notify">
                <p>{{ $message }}</p>
            </div>
            @enderror
        </div>
        <div class="item">
            <label for="rubric_id">Rubric:</label>
            <select name="rubric_id" id="rubric_id">
                <option value="rubric_null">Select rubric</option>
                @foreach($rubrics as $k => $v)
                    <option value="{{ $k }}" @if(old('rubric_id') == $k) selected @endif >{{ $v }}</option>
                @endforeach
            </select>
        </div>
        <button>Add post</button>
    </form>
@endsection
