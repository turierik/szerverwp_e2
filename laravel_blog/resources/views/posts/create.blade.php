@extends('demo.layout')

@section('content')

<h1>Új bejegyzés</h1>
<form action="{{ route('posts.store') }}" method="POST">
    @csrf
    Cím: <input type="text" name="title" value="{{ old('title') }}">

    @error('title')
    {{ $message }}
    @enderror

    <br>
    Tartalom: <br>
    <textarea name="content"></textarea><br>
    Szerző:
    <select name="user_id">
        @foreach($users as $u)
            <option value="{{ $u -> id }}">{{ $u -> name }}</option>
        @endforeach
    </select><br>
    <button type="submit">Küldés</button>
</form>

@endsection
