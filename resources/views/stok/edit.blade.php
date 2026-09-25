@extends('layouts.app')

@section('title', 'Edit Data Stok Barang')

@section('content')
    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold text-white">Edit Data Stok Barang</h1>
            <p class="text-gray-400 mt-1">Ubah detail stok barang di sini abangquuu !!</p>
        </div>
        <a href="{{ route('stok.index') }}"
            class="inline-flex items-center gap-2 justify-center bg-gray-700 hover:bg-gray-600 text-gray-200 text-sm font-semibold px-4 py-2.5 rounded-lg transition">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
            Kembali
        </a>
    </div>

    <div class="max-w-2xl bg-wk-panel border border-wk-border rounded-xl p-6 shadow-xl">
        <form action="{{ route('stok.index') }}" method="GET" class="space-y-5">
            {{-- Info hardcode --}}
            <div class="p-4 rounded-lg bg-wk-orange/10 border border-wk-orange/30 text-wk-orange-light text-xs flex items-center gap-2">
                <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4"/><path d="M12 8h.01"/></svg>
                <span><strong>Catatan:</strong> Form ini disesuaikan untuk pengujian data <em>hardcode</em>.</span>
            </div>

            {{-- Kode Barang (Readonly) --}}
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-1.5">Kode Barang</label>
                <input type="text" value="{{ $barang['kode'] ?? 'BRG-001' }}" readonly
                    class="w-full px-4 py-2.5 rounded-lg bg-wk-panel2/50 border border-wk-border text-gray-400 focus:outline-none cursor-not-allowed text-sm">
            </div>

            {{-- Nama Barang --}}
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-1.5">Nama Barang</label>
                <input type="text" name="nama" value="{{ $barang['nama'] ?? '' }}" required
                    class="w-full px-4 py-2.5 rounded-lg bg-wk-panel border border-wk-border text-gray-100 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-wk-orange focus:border-wk-orange transition text-sm">
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                {{-- Kategori --}}
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-1.5">Kategori</label>
                    <select name="kategori" required
                        class="w-full px-4 py-2.5 rounded-lg bg-wk-panel border border-wk-border text-gray-100 focus:outline-none focus:ring-2 focus:ring-wk-orange focus:border-wk-orange transition text-sm">
                        @foreach ($kategori as $kat)
                            <option value="{{ $kat }}" {{ ($barang['kategori'] ?? '') == $kat ? 'selected' : '' }}>
                                {{ $kat }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Satuan --}}
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-1.5">Satuan</label>
                    <select name="satuan" required
                        class="w-full px-4 py-2.5 rounded-lg bg-wk-panel border border-wk-border text-gray-100 focus:outline-none focus:ring-2 focus:ring-wk-orange focus:border-wk-orange transition text-sm">
                        @foreach ($satuan as $sat)
                            <option value="{{ $sat }}" {{ ($barang['satuan'] ?? '') == $sat ? 'selected' : '' }}>
                                {{ $sat }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                {{-- Jumlah Stok --}}
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-1.5">Jumlah Stok</label>
                    <input type="number" name="stok" value="{{ $barang['stok'] ?? 0 }}" min="0" required
                        class="w-full px-4 py-2.5 rounded-lg bg-wk-panel border border-wk-border text-gray-100 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-wk-orange focus:border-wk-orange transition text-sm">
                </div>

                {{-- Harga --}}
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-1.5">Harga (Rp)</label>
                    <input type="number" name="harga" value="{{ $barang['harga'] ?? 0 }}" min="0" required
                        class="w-full px-4 py-2.5 rounded-lg bg-wk-panel border border-wk-border text-gray-100 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-wk-orange focus:border-wk-orange transition text-sm">
                </div>
            </div>

            {{-- Tombol Aksi --}}
            <div class="flex items-center justify-end gap-3 pt-4 border-t border-wk-border">
                <a href="{{ route('stok.index') }}"
                    class="px-5 py-2.5 rounded-lg bg-gray-800 hover:bg-gray-700 text-gray-300 text-sm font-medium transition">
                    Batal
                </a>
                <button type="submit"
                    class="px-5 py-2.5 rounded-lg bg-wk-orange hover:bg-wk-orange-light text-white text-sm font-semibold transition shadow-lg shadow-wk-orange/20">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
@endsection