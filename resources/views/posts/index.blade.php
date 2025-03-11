@extends('layouts.app')

@section('content')
<h2>Daftar Postingan</h2>
<a href="{{ route('posts.create') }}" class="btn btn-primary">Buat Postingan</a>
<table class="table">
    <tr>
        <th>Judul</th>
        <th>Konten</th>
        <th>Aksi</th>
    </tr>
    @foreach ($posts as $post)
    <tr>
        <td>{{ $post->title }}</td>
        <td>{{ Str::limit($post->content, 50) }}</td>
        <td>

            <a href="{{ route('posts.edit', $post->idpost) }}" class="btn btn-warning">Edit</a>


            <form action="{{ route('posts.destroy', $post->idpost) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection