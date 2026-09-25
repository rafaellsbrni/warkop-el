@extends('layouts.app')

@section('title', 'Data Stok Barang')

@section('content')
    <div class="flex items-center justify-between mb-2">
        <div>
            <h1 class="text-2xl font-bold text-white">Data Stok Barang</h1>
            <p class="text-gray-400 mt-1">Kelola daftar stok anda disini abangquuu !!</p>
        </div>
    </div>

    <div class="flex flex-col sm:flex-row items-stretch sm:items-center justify-between gap-3 mb-5 mt-6">
        <div class="relative w-full sm:max-w-xs">
            <svg class="w-4 h-4 text-gray-500 absolute left-3.5 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <circle cx="11" cy="11" r="7"/>
                <path d="M21 21l-4.3-4.3"/>
            </svg>
            <input id="searchBarang" type="text" placeholder="Cari nama barang....."
                class="w-full pl-10 pr-4 py-2.5 rounded-lg bg-wk-panel border border-wk-border text-gray-100 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-wk-orange focus:border-wk-orange transition text-sm">
        </div>

        <a href="{{ route('stok.create') }}"
            class="inline-flex items-center gap-2 justify-center bg-wk-orange hover:bg-wk-orange-light text-white text-sm font-semibold px-5 py-2.5 rounded-lg transition shadow-lg shadow-wk-orange/20">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg>
            Tambah Barang
        </a>
    </div>

    <div class="rounded-xl bg-wk-panel border border-wk-border overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm" id="tabelStok">
                <thead>
                    <tr class="text-left text-wk-orange-light border-b border-wk-border">
                        <th class="px-6 py-4 font-semibold">Kode Barang</th>
                        <th class="px-6 py-4 font-semibold">Nama Barang</th>
                        <th class="px-6 py-4 font-semibold">Kategori</th>
                        <th class="px-6 py-4 font-semibold">Stok</th>
                        <th class="px-6 py-4 font-semibold">Satuan</th>
                        <th class="px-6 py-4 font-semibold">Status</th>
                        <th class="px-6 py-4 font-semibold text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($barang as $b)
                        @php
                            $badge = match ($b['status']) {
                                'Habis' => 'bg-red-500/15 text-red-400 border-red-500/40',
                                'Menipis' => 'bg-yellow-500/15 text-yellow-400 border-yellow-500/40',
                                default => 'bg-green-500/15 text-green-400 border-green-500/40',
                            };
                        @endphp
                        <tr class="baris-barang border-b border-wk-border/60 last:border-0 hover:bg-wk-panel2/60 transition">
                            <td class="px-6 py-4 text-gray-300">{{ $b['kode'] }}</td>
                            <td class="px-6 py-4 text-wk-orange-light font-medium nama-barang">{{ $b['nama'] }}</td>
                            <td class="px-6 py-4 text-gray-300">{{ $b['kategori'] }}</td>
                            <td class="px-6 py-4 text-gray-300">{{ $b['stok'] }}</td>
                            <td class="px-6 py-4 text-gray-300">{{ $b['satuan'] }}</td>
                            <td class="px-6 py-4">
                                <span class="inline-block px-3 py-1 rounded-full text-xs font-semibold border {{ $badge }}">{{ $b['status'] }}</span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-end gap-2">
                                    <!-- Aksi Edit mengarahkan ke route 'stok.edit' dengan parameter kode barang -->
                                    <a href="{{ route('stok.edit', $b['kode']) }}" 
                                       class="w-8 h-8 flex items-center justify-center rounded-md bg-wk-orange/15 hover:bg-wk-orange/30 text-wk-orange-light transition" 
                                       title="Edit">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                                    </a>
                                    <button onclick="return confirm('Hapus barang ini?')" class="w-8 h-8 flex items-center justify-center rounded-md bg-red-500/15 hover:bg-red-500/30 text-red-400 transition" title="Hapus">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M5 12h14"/></svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @push('scripts')
    <script>
        document.getElementById('searchBarang').addEventListener('input', function (e) {
            const q = e.target.value.toLowerCase();
            document.querySelectorAll('#tabelStok .baris-barang').forEach(function (row) {
                const nama = row.querySelector('.nama-barang').textContent.toLowerCase();
                row.style.display = nama.includes(q) ? '' : 'none';
            });
        });
    </script>
    @endpush
@endsection