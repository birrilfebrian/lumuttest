<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Account;


class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::with('account')->orderBy('date', 'desc')->paginate(5);


        return view('home', compact('posts'));
    }

    public function loginForm()
    {
        return view('login');
    }
    public function show($id)
    {
        $post = Post::with('account')->findOrFail($id);
        return view('post', compact('post'));
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);


        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();


            return redirect('/dashboard');
        }


        return back()->withErrors(['login' => 'Username atau password salah'])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
