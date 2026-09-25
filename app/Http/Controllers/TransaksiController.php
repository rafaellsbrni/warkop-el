<?php

namespace App\Http\Controllers;

class TransaksiController extends Controller
{
    public function index()
    {
        $ringkasan = [
            'tanggal' => '16-09-2026',
            'jumlah_transaksi' => 2,
            'pendapatan' => 230000,
            'total_stok_keluar' => 57,
        ];

        $pesanan = [
            ['no' => 1, 'waktu' => '02 September 2026 09:45:29', 'jumlah_barang' => 2, 'total_belanja' => 56000],
            ['no' => 2, 'waktu' => '02 September 2026 13:21:01', 'jumlah_barang' => 6, 'total_belanja' => 174000],
        ];
        $produk = [
            'Kopi Susu Warkop EL',
            'Americano Hot/Ice',
            'Kopi Hitam Tubruk',
            'Roti Bakar Cokelat Keju',
            'Indomie Goreng Telur'
        ];

        $kategori = ['Minuman Kopi', 'Minuman Non-Kopi', 'Makanan Berat', 'Cemilan'];

        $metodePembayaran = ['Tunai', 'QRIS', 'Transfer Bank'];
 
        // Kirim semua variabel ke view

        return view('transaksi.index', compact('ringkasan', 'pesanan', 'produk', 'kategori', 'metodePembayaran'));
    }

    public function create()
    {
        $kategori = ['Makanan', 'Minuman', 'Perintilan'];
        $produk = ['Ayam Goreng', 'Kopi Robusta', 'Mie Goreng', 'Susu Coklat', 'Air Mineral'];
        $metodePembayaran = ['Cash', 'QRIS', 'Debit'];

        return view('transaksi.create', compact('kategori', 'produk', 'metodePembayaran'));
    }
}
