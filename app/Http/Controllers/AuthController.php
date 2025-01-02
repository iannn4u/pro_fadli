<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function viewLogin() {
        return view('index');
    }

    public function login(Request $request) {
        $validated = $request->validate([
            "username_user" => "required",
            "password" => "required",
        ]);

        if(Auth::attempt($validated)) {
            $request->session()->regenerate();

            return redirect()->intended("/daily");
        }
        
        return back()->with("error", "Username atau password tidak valid!");
    }

    public function logout(Request $request) {
        Auth::logout();
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return redirect('/login');
    }
}