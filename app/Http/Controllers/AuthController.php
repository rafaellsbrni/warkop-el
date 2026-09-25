<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    /**
     * Tampilkan halaman login (Warkop EL Web Login).
     */
    public function index()
    {
        return view('auth.login');
    }

    /**
     * Proses login dummy - langsung diarahkan ke dashboard.
     * Belum ada validasi/otentikasi sungguhan (fokus UI dulu).
     */
    public function login(Request $request)
    {
        return redirect()->route('dashboard');
    }

    public function logout()
    {
        return redirect()->route('login');
    }
}
