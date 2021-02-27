@extends('layouts.layout')


@section('title') @parent {{ $title }} @endsection


@section('content')
    <h1># Content</h1>
    <p>Home blade php</p>
    {!! $excel !!}

    @{{ for anymore tasks }}

    {{-- $title --}}


    @verbatim
    <div class="framework_content">
        <p>Framework content</p>
        Hello, {{ name }}
    </div>
    @endverbatim
@endsection
