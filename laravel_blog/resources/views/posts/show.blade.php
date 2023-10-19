@extends('demo.layout')

@section('content')

<h1>{{ $post -> title }}</h1>
<i>Szerző: {{ $post -> user -> name }}</i>
<br>
{{ $post -> content }}

Címkék:
@forelse ($post -> tags as $t)
    {{ $t -> name }}
@empty
    Nincsenek címkéi.
@endforelse

@endsection
