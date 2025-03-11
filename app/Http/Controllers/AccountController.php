<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function index()
    {
        $accounts = Account::all();
        return view('accounts.index', compact('accounts'));
    }

    public function create()
    {
        return view('accounts.create_account');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:accounts',
            'password' => 'required|min:6',
            'role' => 'required'
        ]);

        Account::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => $request->role
        ]);

        return redirect()->route('accounts.index')->with('success', 'Akun berhasil dibuat');
    }

    public function edit($username)
    {
        $account = Account::where('username', $username)->firstOrFail();
        return view('accounts.create_account', compact('account'));
    }

    public function update(Request $request, $username)
    {
        $request->validate([
            'username' => 'required|unique:accounts,username,' . $username . ',username',
            'name' => 'required',
            'role' => 'required',
        ]);

        $account = Account::where('username', $username)->firstOrFail();
        $account->name = $request->name;
        $account->role = $request->role;

        if ($request->filled('password')) {
            $account->password = Hash::make($request->password);
        }

        $account->save();

        return redirect()->route('accounts.index')->with('success', 'Akun berhasil diperbarui!');
    }



    public function destroy(Account $account)
    {
        $account->delete();
        return redirect()->route('accounts.index')->with('success', 'Akun berhasil dihapus');
    }
}
