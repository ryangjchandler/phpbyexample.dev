@extends('layouts.main', ['title' => $title])

@section('content')
    <h2>
        {{ $title }}
    </h2>

    {!! $content !!}

    @if($next)
        <strong>Next: <a href="{{ $next[1] }}">{{ $next[0] }}</a></strong>
    @endif
@endsection