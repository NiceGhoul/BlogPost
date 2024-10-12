<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home()
    {
        return view('home', ['title' => 'Home Page']);
    }

    public function about()
    {
        $user = Auth::user();
        return view('about', ['title' => "About", 'name' => $user]);
    }
}
