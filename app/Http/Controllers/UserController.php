<?php

namespace App\Http\Controllers;

class UserController extends Controller
{
    public function index()
    {
        $users = [
            ['no' => 1, 'nama' => 'Dhandiansyah', 'username' => 'Dhandiasyh', 'email' => 'Dhandiasyh@kkp.com', 'role' => 'Admin', 'status' => 'Aktif'],
            ['no' => 2, 'nama' => 'Revayel', 'username' => 'Reva123', 'email' => 'Reva123@kkp.com', 'role' => 'Kasir', 'status' => 'Nonaktif'],
            ['no' => 3, 'nama' => 'Wahyu', 'username' => 'Wahyu123', 'email' => 'Wahyu123@kkp.com', 'role' => 'Kasir', 'status' => 'Nonaktif'],
            ['no' => 4, 'nama' => 'Ahmad', 'username' => 'Ahmad123', 'email' => 'Ahmad123@kkp.com', 'role' => 'Gudang', 'status' => 'Nonaktif'],
            ['no' => 5, 'nama' => 'Sapno', 'username' => 'Sapno123', 'email' => 'Sapno123@kkp.com', 'role' => 'Gudang', 'status' => 'Aktif'],
            ['no' => 6, 'nama' => 'Gilang', 'username' => 'Gilang123', 'email' => 'Gilang123@kkp.com', 'role' => 'Gudang', 'status' => 'Aktif'],
        ];

        return view('user.index', compact('users'));
    }
}
