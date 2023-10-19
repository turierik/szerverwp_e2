<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

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
        return view('posts.create', [
            'users' => User::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request -> validate( [
            'title' => 'required|string|min:3',
            'content' => 'required|string|min:20',
            'user_id' => 'required|integer|exists:users,id'
        ], [
            'title.required' => 'A cím megadása kötelező!',
            'title.min' => 'A cím min 3 karakter!'
        ]);

        // mi történjen, ha minden jó :)
        return "akármit";
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
