@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="mb-8">
        <h1 class="text-2xl font-bold text-white">Selamat Datang, Dhandiansyah</h1>
        <p class="text-gray-400 mt-1">Berikut ringkasan stok dan aktivitas penjualan hari ini.</p>
    </div>

    {{-- Stat Cards --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-8">
        @php
            $cards = [
                ['label' => 'Transaksi hari ini', 'value' => $stats['transaksi_hari_ini'], 'highlight' => false],
                ['label' => 'Total Item Keluar', 'value' => $stats['total_item_keluar'], 'highlight' => true],
                ['label' => 'Stok Menipis', 'value' => $stats['stok_menipis'], 'highlight' => false],
                ['label' => 'Total Reject', 'value' => $stats['total_reject'], 'highlight' => false],
            ];
        @endphp

        @foreach ($cards as $card)
            <div class="rounded-xl bg-wk-panel border {{ $card['highlight'] ? 'border-wk-orange shadow-wk-glow' : 'border-wk-border' }} px-6 py-5">
                <p class="text-3xl font-bold text-white">{{ $card['value'] }}</p>
                <p class="text-sm text-gray-400 mt-1">{{ $card['label'] }}</p>
            </div>
        @endforeach
    </div>

    {{-- Table --}}
    <div class="rounded-xl bg-wk-panel border border-wk-border overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="text-left text-wk-orange-light border-b border-wk-border">
                        <th class="px-6 py-4 font-semibold">Nama Barang</th>
                        <th class="px-6 py-4 font-semibold">Kategori</th>
                        <th class="px-6 py-4 font-semibold">Terjual hari ini</th>
                        <th class="px-6 py-4 font-semibold">Sisa Stok</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($barangTerlaris as $barang)
                        <tr class="border-b border-wk-border/60 last:border-0 hover:bg-wk-panel2/60 transition">
                            <td class="px-6 py-4 text-wk-orange-light font-medium">{{ $barang['nama'] }}</td>
                            <td class="px-6 py-4 text-wk-orange-light">{{ $barang['kategori'] }}</td>
                            <td class="px-6 py-4 text-wk-orange-light">{{ $barang['terjual'] }}</td>
                            <td class="px-6 py-4 text-wk-orange-light">{{ $barang['sisa_stok'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
