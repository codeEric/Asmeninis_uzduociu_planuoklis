<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => 'required|min:3|max:64',
            'email' => 'required|email|max:64|unique:users,email',
            'password' => 'required|min:7|max:128',
        ]);

        $attributes['password'] = bcrypt($attributes['password']);

        $user = User::create($attributes);

        auth()->login($user);

        return redirect('/tasks')->with('success', 'Your account has been created.');
    }
}
