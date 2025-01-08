<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function viewSignin()
    {
        return view('signin');
    }

    public function signin(Request $request)
    {
        $validated = $request->validate([
            "username" => "required",
            "password" => "required",
        ]);

        if (Auth::attempt($validated)) {
            $request->session()->regenerate();

            return redirect()->intended("/");
        }

        return back()->with("error", "Username atau password tidak valid!");
    }

    public function signout()
    {
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/signin');
    }
}
