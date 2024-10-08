<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthorController extends Controller
{
    public function show(User $user)
    {
        return view('posts', ['title' => count($user->posts) . ' Articles by ' . $user->name, 'posts' => $user->posts->load('category', 'author')]);
    }
    public function edit()
    {
        $user = Auth::user();
        // if (!$user) {
        //     dd('No user is authenticated');
        // }
        $posts = Post::where('author_id', $user->id)->latest()->paginate(10)->withQueryString();
        $categories = Category::all();
        return view('edit', ['title' => 'Blog', 'posts' => $posts, 'categories' => $categories]);
    }
}
