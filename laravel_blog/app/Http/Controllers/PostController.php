<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $kiskutya = Post::all();
        $kiskutya = Post::with('user') -> get();
        return view('posts.index', [
            'posts' => $kiskutya
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this -> authorize('create', Post::class);

        return view('posts.create', [
            'users' => User::all(),
            'tags' => Tag::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this -> authorize('create', Post::class);

        $validated = $request -> validate( [
            'title' => 'required|string|min:3',
            'content' => 'required|string|min:20',
            // 'user_id' => 'required|integer|exists:users,id',
            'tags[]' => 'array',
            'tags.*' => 'distinct|integer|exists:tags,id'
        ], [
            'title.required' => 'A cím megadása kötelező!',
            'title.min' => 'A cím min 3 karakter!'
        ]);

        // mi történjen, ha minden jó :)

        $validated['user_id'] = Auth::user() -> id;
        $post = Post::create($validated);
        $post -> tags() -> sync($validated['tags'] ?? []);

        Session::flash('post-created', true);
        return redirect() -> route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts.show', [ 'post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('posts.edit', [
            'users' => User::all(),
            'tags' => Tag::all(),
            'post' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $validated = $request -> validate( [
            'title' => 'required|string|min:3',
            'content' => 'required|string|min:20',
            'user_id' => 'required|integer|exists:users,id',
            'tags[]' => 'array',
            'tags.*' => 'distinct|integer|exists:tags,id'
        ], [
            'title.required' => 'A cím megadása kötelező!',
            'title.min' => 'A cím min 3 karakter!'
        ]);

        // mi történjen, ha minden jó :)

        $post -> update($validated);
        $post -> tags() -> sync($validated['tags'] ?? []);

        Session::flash('post-updated', true);
        return redirect() -> route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
