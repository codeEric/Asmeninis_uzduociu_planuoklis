<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function create()
    {
        return view('login.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (!auth()->attempt($attributes)) {
            throw ValidationException::withMessages([
                'email' => 'Your provided credentials could not be verified'
            ]);
        }


        session()->regenerate();

        return redirect('/tasks')->with('success', "You have logged in successfully!");
    }

    public function destroy()
    {
        $language = session()->get('lang');
        session()->flush();
        session()->put('lang', $language);
        auth()->logout();
        return redirect('/login');
    }
}
