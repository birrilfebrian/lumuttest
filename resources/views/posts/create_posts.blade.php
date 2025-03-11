@extends('layouts.app')

@section('title', isset($post) ? 'Edit Post' : 'Buat Post')

@section('content')
<div class="container">
    <h2>{{ isset($post) ? 'Edit Post' : 'Buat Post' }}</h2>
    <form action="{{ isset($post) ? route('posts.update', $post->idpost) : route('posts.store') }}" method="POST">
        @csrf
        @if(isset($post))
        @method('PUT')
        @endif

        <div class="mb-3">
            <label for="title" class="form-label">Judul</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ isset($post) ? $post->title : old('title') }}" required>
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Konten</label>
            <textarea class="form-control" id="content" name="content" rows="4" required>{{ isset($post) ? $post->content : old('content') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">{{ isset($post) ? 'Update' : 'Simpan' }}</button>
        <a href="{{ route('posts.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection