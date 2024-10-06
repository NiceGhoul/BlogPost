<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view( 'register', ['title' => 'Home Page', 'active' => 'register']);
    }
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|min:5|max:255|unique:users',
            'email' => 'email:dns|required|unique:users',
            'password' => 'required|min:5|max:255'
        ]);

        // $validateData['password'] = bcrypt($validateData['password']);

        $validateData['password'] = Hash::make($validateData['password']);

        User::create($validateData);

        session()->flash('success', 'Registration successfull! Please Login');

        return redirect('/login');
    }
}
