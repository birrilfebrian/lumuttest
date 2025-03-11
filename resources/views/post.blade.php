@extends('layouts.app')

@section('title', $post->title . ' - Blog Saya')

@section('content')
<div class="row">
    <div class="col-md-8">
        <h2>{{ $post->title }}</h2>
        <p><small>Ditulis oleh <strong>{{ $post->account->name }}</strong> pada {{ date('d M Y', strtotime($post->date)) }}</small></p>
        <hr>
        <p>{{ $post->content }}</p>
        <hr>
        <a href="{{ route('home') }}" class="btn btn-secondary">Kembali ke Beranda</a>
    </div>
</div>
@endsection