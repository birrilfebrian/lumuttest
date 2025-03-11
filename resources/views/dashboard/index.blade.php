@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-3">
            <div class="list-group">
                <a href="{{ route('dashboard') }}" class="list-group-item list-group-item-action active">Dashboard</a>
                @if (Auth::user()->role === 'admin')
                <a href="{{ route('accounts.index') }}" class="list-group-item list-group-item-action">Buat Akun</a>
                @endif
                <a href="{{ route('posts.index') }}" class="list-group-item list-group-item-action">Buat Post</a>
            </div>
        </div>
        <div class="col-md-9">
            <h2>Selamat Datang, {{Auth::user()->name}}</h2>
            <p>Gunakan menu di samping untuk mengelola postingan.</p>
        </div>
    </div>
</div>
@endsection