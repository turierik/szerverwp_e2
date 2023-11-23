@extends('demo.layout')

@section('content')
    @guest
        Szia, Vendég!
        <a href="{{ route('login') }}">Bejelentkezés</a>
    @endguest

    @auth
        Szia, {{ Auth::user() -> name }}!
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <a href="#"
            onclick="event.preventDefault(); document.querySelector('form').submit();"
            >Kijelentkezés</a>
        </form>
    @endauth

    @if (Session::has('post-created'))
        <span class="text-green-500 text-lg">Bejegyzés létrejött!</span>
    @endif

    <ul>
    @foreach ($posts as $p)
        <li>{{ $p -> title }} ({{ $p -> user -> name }})</li>
    @endforeach
    </ul>
@endsection
