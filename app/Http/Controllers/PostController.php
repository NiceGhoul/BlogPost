<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::filter($request->only(['search', 'category', 'author']))->latest()->paginate(9)->withQueryString();
        return view('posts', ['title' => 'Blog', 'posts' => $posts]);
    }

    public function show(Post $post)
    {
        return view('post', ['title' => 'Single Post', 'post' => $post]);
    }

    public function edit(Request $request)
    {
        $posts = Post::filter($request->only(['search', 'category', 'author']))->latest()->paginate(10)->withQueryString();
        return view('edit', ['title' => 'Blog', 'posts' => $posts]);
    }
}
