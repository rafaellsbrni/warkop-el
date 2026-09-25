@extends('layouts.app')

@section('title', 'Transaksi')

@section('content')
    <div class="flex items-start justify-between mb-2">
        <div>
            <h1 class="text-2xl font-bold text-white">Data Transaksi</h1>
            <p class="text-gray-400 mt-1">Lihat data transaksi anda disini</p>
        </div>
        <a href="{{ route('transaksi.create') }}"
            class="inline-flex items-center gap-2 bg-wk-orange hover:bg-wk-orange-light text-white text-sm font-semibold px-5 py-2.5 rounded-lg transition shadow-lg shadow-wk-orange/20">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg>
            Input Transaksi
        </a>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-3 gap-5 my-6">
        <div class="rounded-xl bg-wk-panel border border-wk-orange/60 px-6 py-5">
            <p class="text-xs text-wk-orange-light font-medium mb-1">Jumlah Transaksi &middot; {{ $ringkasan['tanggal'] }}</p>
            <p class="text-2xl font-bold text-white">{{ $ringkasan['jumlah_transaksi'] }}</p>
        </div>
        <div class="rounded-xl bg-wk-panel border border-wk-orange/60 px-6 py-5">
            <p class="text-xs text-wk-orange-light font-medium mb-1">Pendapatan &middot; {{ $ringkasan['tanggal'] }}</p>
            <p class="text-2xl font-bold text-green-400">Rp. {{ number_format($ringkasan['pendapatan'], 0, ',', '.') }}</p>
        </div>
        <div class="rounded-xl bg-wk-panel border border-wk-orange/60 px-6 py-5">
            <p class="text-xs text-wk-orange-light font-medium mb-1">Total stok keluar &middot; {{ $ringkasan['tanggal'] }}</p>
            <p class="text-2xl font-bold text-white">{{ $ringkasan['total_stok_keluar'] }}</p>
        </div>
    </div>

    <div>
        <h2 class="text-gray-300 font-semibold mb-3">Detail Pesanan</h2>
        <div class="space-y-3">
            @foreach ($pesanan as $p)
                <div onclick="openModal()" class="rounded-xl bg-wk-orange/90 hover:bg-wk-orange transition px-6 py-4 flex flex-wrap items-center gap-x-10 gap-y-2 text-white cursor-pointer shadow-md">
                {{-- <div class="rounded-xl bg-wk-orange/90 hover:bg-wk-orange transition px-6 py-4 flex flex-wrap items-center gap-x-10 gap-y-2 text-white"> --}}
                    <div class="w-8 font-semibold">{{ $p['no'] }}</div>
                    <div class="min-w-[220px]">
                        <p class="text-xs text-white/70">Waktu</p>
                        <p class="font-medium">{{ $p['waktu'] }}</p>
                    </div>
                    <div class="min-w-[160px]">
                        <p class="text-xs text-white/70">Total barang dibeli</p>
                        <p class="font-medium">{{ $p['jumlah_barang'] }} Pcs</p>
                    </div>
                    <div class="min-w-[160px]">
                        <p class="text-xs text-white/70">Total Belanja</p>
                        <p class="font-medium">Rp. {{ number_format($p['total_belanja'], 0, ',', '.') }}</p>
                    </div>
                    <div class="ml-auto flex items-center gap-2">
                        <button class="w-8 h-8 flex items-center justify-center rounded-md bg-black/20 hover:bg-black/30 transition" title="Edit">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                        </button>
                        <button onclick="return confirm('Hapus transaksi ini?')" class="w-8 h-8 flex items-center justify-center rounded-md bg-black/20 hover:bg-black/30 transition" title="Hapus">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M5 12h14"/></svg>
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- Container Modal Pop-up -->
    <div id="modalTransaksi" class="fixed inset-0 z-50 bg-black/70 backdrop-blur-sm flex items-center justify-center p-4 hidden">
        <div class="rounded-2xl bg-gradient-to-br from-wk-orange-dark/95 to-wk-orange/90 border border-wk-orange p-6 md:p-8 max-w-4xl w-full max-h-[90vh] overflow-y-auto shadow-2xl relative">
            <div class="flex items-center justify-between mb-6 pb-4 border-b border-white/20">
                <div>
                    <h2 class="text-2xl font-bold text-white">Form Input Transaksi</h2>
                    <p class="text-white/80 text-sm mt-0.5">Input transaksi baru</p>
                </div>
                <button type="button" onclick="closeModal()" class="text-white/80 hover:text-white bg-black/20 hover:bg-black/40 p-2 rounded-lg transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <form action="{{ route('transaksi.index') }}" method="GET" class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm text-white/90 mb-1.5 font-medium">Nama Produk</label>
                    <select id="namaProduk" class="w-full rounded-lg bg-[#241f1e] border border-white/20 text-gray-100 px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-white/40">
                        @foreach ($produk as $p)
                            <option value="{{ $p }}">{{ $p }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm text-white/90 mb-1.5 font-medium">Kategori</label>
                    <select class="w-full rounded-lg bg-[#241f1e] border border-white/20 text-gray-100 px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-white/40">
                        @foreach ($kategori as $k)
                            <option>{{ $k }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm text-white/90 mb-1.5 font-medium">Jumlah</label>
                    <select id="jumlah" class="w-full rounded-lg bg-[#241f1e] border border-white/20 text-gray-100 px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-white/40">
                        @for ($i = 1; $i <= 10; $i++)
                            <option value="{{ $i }}" {{ $i == 2 ? 'selected' : '' }}>{{ $i }}</option>
                        @endfor
                    </select>
                </div>

                <div>
                    <label class="block text-sm text-white/90 mb-1.5 font-medium">Harga</label>
                    <input id="harga" type="text" value="Rp. 15.000"
                        class="w-full rounded-lg bg-[#241f1e] border border-white/20 text-gray-100 placeholder-gray-500 px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-white/40">
                </div>

                <div>
                    <label class="block text-sm text-white/90 mb-1.5 font-medium">Metode Pembayaran</label>
                    <select class="w-full rounded-lg bg-[#241f1e] border border-white/20 text-gray-100 px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-white/40">
                        @foreach ($metodePembayaran as $m)
                            <option>{{ $m }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm text-white/90 mb-1.5 font-medium">Total Harga</label>
                    <input id="totalHarga" type="text" value="Rp. 30.000" readonly
                        class="w-full rounded-lg bg-[#241f1e] border border-white/20 text-gray-100 px-4 py-2.5 focus:outline-none">
                </div>

                <div>
                    <label class="block text-sm text-white/90 mb-1.5 font-medium">Catatan</label>
                    <input type="text" placeholder="Catatan (opsional)"
                        class="w-full rounded-lg bg-[#241f1e] border border-white/20 text-gray-100 placeholder-gray-500 px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-white/40">
                </div>

                <div>
                    <label class="block text-sm text-white/90 mb-1.5 font-medium">Kasir</label>
                    <input type="text" value="Dhandiansyah" readonly
                        class="w-full rounded-lg bg-[#241f1e] border border-white/20 text-gray-100 px-4 py-2.5 focus:outline-none">
                </div>

                <div class="md:col-span-2 flex items-center gap-4 pt-2">
                    <button type="submit"
                        class="bg-white text-wk-orange-dark font-semibold px-6 py-2.5 rounded-lg hover:bg-gray-100 transition shadow">
                        Simpan
                    </button>
                    <button type="button" onclick="closeModal()"
                        class="bg-red-600 hover:bg-red-500 text-white font-semibold px-6 py-2.5 rounded-lg transition shadow text-center">
                        Batal
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openModal() {
            document.getElementById('modalTransaksi').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('modalTransaksi').classList.add('hidden');
        }

        window.onclick = function(event) {
            const modal = document.getElementById('modalTransaksi');
            if (event.target === modal) {
                closeModal();
            }
        }
    </script>
@endsection
