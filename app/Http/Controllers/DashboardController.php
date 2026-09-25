<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'transaksi_hari_ini' => 56,
            'total_item_keluar' => 219,
            'stok_menipis' => 8,
            'total_reject' => 0,
        ];

        $barangTerlaris = [
            ['nama' => 'Kopi Robusta', 'kategori' => 'Minuman', 'terjual' => 10, 'sisa_stok' => 173],
            ['nama' => 'Mie Goreng', 'kategori' => 'Makanan', 'terjual' => 7, 'sisa_stok' => 55],
            ['nama' => 'Susu Coklat', 'kategori' => 'Minuman', 'terjual' => 74, 'sisa_stok' => 16],
        ];

        return view('dashboard', compact('stats', 'barangTerlaris'));
    }
}
