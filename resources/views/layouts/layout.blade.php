<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <title>
        @section('title')@show | Learn Laravel
    </title>
</head>
<body>
<div id="app">
<header style="display: flex; justify-content: space-between;">
    <div class="logo">
        logo-text
    </div>
    <div class="auth">
        @php
        echo 'Authorize: ';
        dump(Auth::check())
        @endphp
    </div>
</header>
<div id="content">

    @include('layouts.alerts')

    @yield('content')

</div>
<footer>
    <div class="container rubrics">

        <ul>
            @foreach($rubrics as $rubric)
                <li><a href="#">{{ $rubric->title }}</a></li>
            @endforeach
        </ul>

    </div>

    <p>footer</p>
</footer>

@yield('scripts')

</div>
</body>
</html>
