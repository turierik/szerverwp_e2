@extends('demo.layout')

@section('content')
    <ul>
    @foreach ($posts as $p)
        <li>{{ $p -> title }} ({{ $p -> user -> name }})</li>
    @endforeach
    </ul>
@endsection
