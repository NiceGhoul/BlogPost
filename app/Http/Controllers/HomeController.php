<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        return view('home', ['title' => 'Home Page']);
    }

    public function about()
    {
        return view('about', ['title' => "About", 'name' => 'Wilson']);
    }
}
