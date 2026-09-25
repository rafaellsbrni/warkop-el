@extends('layouts.app')

@section('title', 'Input Transaksi')

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-white">Form Input Transaksi</h1>
        <p class="text-gray-400 mt-1">Input transaksi baru</p>
    </div>

    <div class="rounded-2xl bg-gradient-to-br from-wk-orange-dark/90 to-wk-orange/80 border border-wk-orange p-8 max-w-4xl">
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
                <a href="{{ route('transaksi.index') }}"
                    class="bg-red-600 hover:bg-red-500 text-white font-semibold px-6 py-2.5 rounded-lg transition shadow text-center">
                    Batal
                </a>
            </div>
        </form>
    </div>
@endsection
