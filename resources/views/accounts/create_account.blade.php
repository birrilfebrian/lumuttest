@extends('layouts.app')

@section('title', isset($account) ? 'Edit Akun' : 'Buat Akun')

@section('content')
<div class="container mt-4">
    <h2>{{ isset($account) ? 'Edit Akun' : 'Buat Akun' }}</h2>

    <form action="{{ isset($account) ? route('accounts.update', $account->username) : route('accounts.store') }}" method="POST">
        @csrf
        @if (isset($account))
        @method('PUT')
        @endif

        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" name="username" id="username" class="form-control"
                value="{{ isset($account) ? $account->username : old('username') }}"
                required {{ isset($account) ? 'readonly' : '' }}>
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Nama Lengkap</label>
            <input type="text" name="name" id="name" class="form-control"
                value="{{ isset($account) ? $account->name : old('name') }}" required>
        </div>

        <div class="mb-3">
            <label for="role" class="form-label">Role</label>
            <select name="role" id="role" class="form-select">
                <option value="admin" {{ isset($account) && $account->role == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="user" {{ isset($account) && $account->role == 'user' ? 'selected' : '' }}>User</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password (kosongkan jika tidak ingin diubah)</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">{{ isset($account) ? 'Update Akun' : 'Buat Akun' }}</button>
        <a href="{{ route('accounts.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection