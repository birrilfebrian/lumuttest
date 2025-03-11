<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->get();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create_posts');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        Post::create([
            'account_id' => Auth::id(),
            'title' => $request->title,
            'content' => $request->content,
            'date' => now(),
            'username' => auth()->user()->username,
        ]);

        return redirect()->route('posts.index')->with('success', 'Postingan berhasil dibuat');
    }
    public function edit(Post $post)
    {

        return view('posts.create_posts', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        $post->update([
            'title' => $request->title,
            'content' => $request->content
        ]);

        return redirect()->route('posts.index')->with('success', 'Postingan berhasil diperbarui!');
    }
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Postingan berhasil dihapus');
    }
}
