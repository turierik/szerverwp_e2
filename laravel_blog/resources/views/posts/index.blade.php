@extends('demo.layout')

@section('content')

    @if (Session::has('post-created'))
        <span class="text-green-500 text-lg">Bejegyzés létrejött!</span>
    @endif

    <ul>
    @foreach ($posts as $p)
        <li>{{ $p -> title }} ({{ $p -> user -> name }})</li>
    @endforeach
    </ul>
@endsection
