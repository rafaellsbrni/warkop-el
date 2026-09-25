@extends('layouts.app')

@section('title', 'Transaksi')

@section('content')
    <!-- Header Halaman & Tombol Pemicu Pop-up -->
    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold text-white">Data Transaksi</h1>
            <p class="text-gray-400 mt-1">Kelola transaksi Warkop 'EL</p>
        </div>
        <button onclick="openModal()" 
            class="bg-wk-orange hover:bg-wk-orange-dark text-white font-semibold px-5 py-2.5 rounded-xl transition shadow-lg flex items-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            Tambah Transaksi Baru
        </button>
    </div>

    <!-- Container Overlay Modal Pop-up (Secara default tersembunyi / hidden) -->
    <div id="modalTransaksi" class="fixed inset-0 z-50 bg-black/70 backdrop-blur-sm flex items-center justify-center p-4 hidden">
        
        <!-- Box Utama Pop-up -->
        <div class="rounded-2xl bg-gradient-to-br from-wk-orange-dark/95 to-wk-orange/90 border border-wk-orange p-6 md:p-8 max-w-4xl w-full max-h-[90vh] overflow-y-auto shadow-2xl relative">
            
            <!-- Header Modal dengan Tombol Silang (X) -->
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

            <!-- Form Transaksi -->
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

    <!-- Script JavaScript Kontrol Pop-up -->
    <script>
        function openModal() {
            document.getElementById('modalTransaksi').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('modalTransaksi').classList.add('hidden');
        }

        // Menutup pop-up ketika pengguna mengklik area luar (backdrop)
        window.onclick = function(event) {
            const modal = document.getElementById('modalTransaksi');
            if (event.target === modal) {
                closeModal();
            }
        }
    </script>
@endsection