@extends('demo.layout')

@section('content')

<h1>{{ $post -> title}} szerkesztése</h1>
<form action="{{ route('posts.update', ['post' => $post] ) }}" method="POST">
    @csrf
    @method('PATCH')
    Cím: <input type="text" name="title" value="{{ old('title', $post -> title) }}">

    @error('title')
    {{ $message }}
    @enderror

    <br>
    Tartalom: <br>
    <textarea name="content">{{ old('content', $post -> content) }} </textarea><br>
    Szerző:
    <select name="user_id">
        @foreach($users as $u)
            <option value="{{ $u -> id }}"
            {{ old('user_id', $post -> user_id) === $u -> id ? 'selected' : '' }}
            >{{ $u -> name }}</option>
        @endforeach
    </select><br>
    Címkék:<br>
    @foreach ($tags as $t)
        <input type="checkbox" name="tags[]" value="{{ $t -> id }}">{{ $t -> name }}<br>
    @endforeach
    <button type="submit">Küldés</button>
</form>

@endsection
