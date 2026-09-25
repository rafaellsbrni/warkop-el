<?php

namespace App\Http\Controllers;

class StokController extends Controller
{
    public function index()
    {
        $barang = [
            ['kode' => 'A001', 'nama' => 'Air Mineral', 'kategori' => 'Minuman', 'stok' => 0, 'satuan' => 'Botol', 'status' => 'Habis'],
            ['kode' => 'B002', 'nama' => 'Mie Goreng', 'kategori' => 'Minuman', 'stok' => 178, 'satuan' => 'Pcs', 'status' => 'Aman'],
            ['kode' => 'A002', 'nama' => 'Susu Coklat', 'kategori' => 'Minuman', 'stok' => 16, 'satuan' => 'Pcs', 'status' => 'Aman'],
            ['kode' => 'C003', 'nama' => 'Sedotan', 'kategori' => 'Perintilan', 'stok' => 7, 'satuan' => 'Pcs', 'status' => 'Menipis'],
            ['kode' => 'A003', 'nama' => 'Kopi Robusta', 'kategori' => 'Minuman', 'stok' => 173, 'satuan' => 'Pcs', 'status' => 'Aman'],
            ['kode' => 'B003', 'nama' => 'Ayam Goreng', 'kategori' => 'Makanan', 'stok' => 42, 'satuan' => 'Pcs', 'status' => 'Aman'],
        ];

        return view('stok.index', compact('barang'));
    }

    public function create()
    {
        $kategori = ['Makanan', 'Minuman', 'Perintilan'];
        $satuan = ['Pcs', 'Botol', 'Bungkus', 'Kg', 'Gelas'];
        $kodeBarang = ['A001', 'A002', 'A003', 'B001', 'B002', 'B003', 'C001', 'C002', 'C003'];

        return view('stok.create', compact('kategori', 'satuan', 'kodeBarang'));
    }
    public function edit($kode = 'A001')
    {
        // Data dummy untuk form edit berdasarkan $kode
        $barang = [
            'kode' => '$kode',
            'nama' => 'Kopi Arabika 1kg',
            'kategori' => 'Bahan Baku',
            'stok' => 15,
            'satuan' => 'Pcs',
            'harga' => 50000,
        ];

        $kategori = ['Bahan Baku', 'Minuman', 'Makanan', 'Kemasan'];
        $satuan = ['Pcs', 'Kg', 'Liter', 'Pack', 'Botol'];

        return view('stok.edit', compact('barang', 'kategori', 'satuan'));
    }

    // Method dummy untuk proses update form
    public function update(Request $request, $kode)
    {
        return redirect()->route('stok.index')->with('success', 'Data berhasil diperbarui');
    }
}
