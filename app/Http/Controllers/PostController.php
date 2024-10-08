<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function store(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'category_id' => 'required|exists:categories,id',
            'body' => 'required',
        ]);
        $validatedData['body'] = strip_tags($request->body);
        $slug = Str::slug($request->title, '-');
        Post::create([
            'title' => $validatedData['title'],
            'slug' => $slug,
            'category_id' => $validatedData['category_id'],
            'author_id' => Auth::user()->id, // Logged-in user's ID
            'body' => $validatedData['body'],
        ]);
        // dd($validatedData);
        session()->flash('success', 'Post is succesfully added!!');
        return redirect('/edit');
    }
    public function destroy(Post $post)
{
    // Ensure the logged-in user is the author of the post or has permissions
    if (Auth::id() !== $post->author_id) {
        return redirect('/edit')->with('fail', 'You are not authorized to delete this post');
    }

    // Delete the post
    $post->delete();

    return redirect('/edit')->with('success', 'Post deleted successfully!');
}



}
