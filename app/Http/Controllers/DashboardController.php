<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\Post;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }

    public function createAccount()
    {
        return view('dashboard.create_account');
    }

    public function storeAccount(Request $request)
    {

        $validatedData = $request->validate([
            'username' => 'required|string|unique:accounts,username|max:50',
            'password' => 'required|string|min:6',
            'name' => 'required|string|max:100',
            'role' => 'required|in:admin,user',
        ]);

        try {

            Account::create([
                'username' => $validatedData['username'],
                'password' => Hash::make($validatedData['password']),
                'name' => $validatedData['name'],
                'role' => $validatedData['role'],
            ]);

            return redirect()->route('dashboard')->with('success', 'Akun berhasil dibuat!');
        } catch (\Exception $e) {


            return back()->withErrors('Terjadi kesalahan saat membuat akun. Silakan coba lagi.');
        }
    }


    public function createPost()
    {

        return view('dashboard.create_posts');
    }

    public function storePost(Request $request)
    {

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);
        dd('ce');
        try {


            Post::create([
                'title' => $validatedData['title'],
                'content' => $validatedData['content'],
                'date' => now('Y-m-d'),
                'username' => auth()->user()->username, // auth()->user() bukan auth()->username
            ]);

            return redirect()->route('dashboard')->with('success', 'Postingan berhasil dibuat!');
        } catch (\Exception $e) {


            return back()->withErrors('Terjadi kesalahan saat menyimpan postingan. Silakan coba lagi.');
        }
    }
}
