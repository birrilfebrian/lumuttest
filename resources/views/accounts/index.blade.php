@extends('layouts.app')

@section('content')
<h2>Daftar Akun</h2>
<a href="{{ route('accounts.create') }}" class="btn btn-primary">Buat Akun</a>
<table class="table">
    <tr>
        <th>Nama</th>
        <th>Username</th>
        <th>Role</th>
        <th>Aksi</th>
    </tr>
    @foreach ($accounts as $account)
    <tr>
        <td>{{ $account->name }}</td>
        <td>{{ $account->username }}</td>
        <td>{{ $account->role }}</td>
        <td>
            <a href="{{ route('accounts.edit', $account->username) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('accounts.destroy', $account->username) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection