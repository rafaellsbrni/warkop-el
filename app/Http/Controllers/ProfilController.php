<?php

namespace App\Http\Controllers;

class ProfilController extends Controller
{
    public function index()
    {
        $profil = [
            'nama' => 'Dhandiansyah',
            'username' => 'Dhandiasyh',
            'email' => 'Dhandiasyh@kkp.com',
            'role' => 'Admin',
            'no_hp' => '0812-3456-7890',
            'bergabung' => 'Januari 2026',
        ];

        return view('profil.index', compact('profil'));
    }
}
