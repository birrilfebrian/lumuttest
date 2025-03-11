@extends('layouts.app')

@section('title', 'Beranda - Blog Saya')

@section('content')
<div class="row">
    <!-- Daftar Postingan -->
    <div class="col-md-8">
        <h2>Postingan Terbaru</h2>
        <hr>
        @foreach ($posts as $post)
        <div class="mb-4">
            <h3>{{ $post->title }}</h3>
            <p><small>Ditulis oleh <strong>{{ $post->account->name }}</strong> pada {{ date('d M Y', strtotime($post->date)) }}</small></p>
            <p>{{ Str::limit($post->content, 150) }}</p>
            <a href="{{ route('post.show', $post->idpost) }}" class="btn btn-primary btn-sm">Baca Selengkapnya</a>

        </div>
        <hr>
        @endforeach

        <!-- Pagination -->
        <div class="d-flex justify-content-center">
            {{ $posts->links() }}
        </div>
    </div>
</div>
@endsection