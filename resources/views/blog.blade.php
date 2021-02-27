@extends('layouts.layout')
@section('title') @parent {{ 'Блог' }} @endsection

@section('content')

    <nav>
        <ul>
            <li><a href="{{ route('posts.create') }}">Создать пост</a></li>

            @if (\Illuminate\Support\Facades\Auth::check())
                <p>{{ auth()->user()->name }}</p>

                @if(auth()->user()->avatar)
                    <img style="width: 50px; height: 50px; border-radius: 50%; object-fit: cover;" src="{{ asset('storage/' . auth()->user()->avatar) }}" alt="Avatar">
                @endif

                <li><a href="{{ route('logout') }}">Выйти</a></li>
            @else
                <li><a href="{{ route('login.create') }}">Авторизоваться</a></li>
                <li><a href="{{ route('user.create') }}">Зарегистрироваться</a></li>
            @endif

        </ul>
    </nav>

    @auth
        <h4>Вы авторизованы</h4>
    @endauth
    @guest
        <h4>Вы не авторизованы
        </h4>
    @endguest

    <h2>Posts</h2>
    <div class="news">

        @foreach($posts as $post)
            <div class="post">
                <div class="title">{{ $post->title }}</div>
                <p>{{ $post->text }}</p>
                <div class="date">
{{--                    <span class="published">{{ $post->created_at }}</span>--}}
{{--                    <span class="published">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:m:s', $post->created_at)->format('j.m.Y') }}</span>--}}
                    <span class="published">{{ $post->getPostDate() }}</span>
                </div>
            </div>
        @endforeach

    </div>
    <div class="pagination">
{{--        {{ $posts->appends(['test' => request()->test])->fragment('anchor')->links() }} Без явного указания, используется шаблон по умолчанию --}}
        {{ $posts->appends(['test' => request()->test])->fragment('anchor')->links('vendor.pagination.bootstrap-4') }}
    </div>
@endsection

@section('scripts')
    <script>
        console.log('Welcome to my blog');
    </script>
@endsection
