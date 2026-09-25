<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    protected array $roles = ['Admin', 'Kasir', 'Gudang'];
    protected array $statuses = ['Aktif', 'Nonaktif'];

    // Data dummy - belum ada koneksi database.
    protected function data(): array
    {
        return [
            ['no' => 1, 'nama' => 'Dhandiansyah', 'username' => 'Dhandiasyh', 'email' => 'Dhandiasyh@kkp.com', 'role' => 'Admin', 'status' => 'Aktif'],
            ['no' => 2, 'nama' => 'Revayel', 'username' => 'Reva123', 'email' => 'Reva123@kkp.com', 'role' => 'Kasir', 'status' => 'Nonaktif'],
            ['no' => 3, 'nama' => 'Wahyu', 'username' => 'Wahyu123', 'email' => 'Wahyu123@kkp.com', 'role' => 'Kasir', 'status' => 'Nonaktif'],
            ['no' => 4, 'nama' => 'Ahmad', 'username' => 'Ahmad123', 'email' => 'Ahmad123@kkp.com', 'role' => 'Gudang', 'status' => 'Nonaktif'],
            ['no' => 5, 'nama' => 'Sapno', 'username' => 'Sapno123', 'email' => 'Sapno123@kkp.com', 'role' => 'Gudang', 'status' => 'Aktif'],
            ['no' => 6, 'nama' => 'Gilang', 'username' => 'Gilang123', 'email' => 'Gilang123@kkp.com', 'role' => 'Gudang', 'status' => 'Aktif'],
        ];
    }

    public function index()
    {
        $users = $this->data();

        return view('user.index', compact('users'));
    }

    public function edit($no)
    {
        $user = collect($this->data())->firstWhere('no', (int) $no);

        abort_if(! $user, 404);

        return view('user.edit', [
            'user' => $user,
            'roles' => $this->roles,
            'statuses' => $this->statuses,
        ]);
    }

    // Proses update dummy - belum ada koneksi database, hanya redirect + flash message.
    public function update(Request $request, $no)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'username' => 'required|string|max:50',
            'email' => 'required|email|max:100',
            'role' => 'required|in:Admin,Kasir,Gudang',
            'status' => 'required|in:Aktif,Nonaktif',
        ]);

        return redirect()->route('user.index')->with('success', 'Data user berhasil diperbarui.');
    }
}
