@extends('layouts.app')

@section('title', 'Tambah Stok Barang')

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-white">Form Tambah Stok Barang</h1>
        <p class="text-gray-400 mt-1">Silahkan isi sedetail stok barang yang ingin anda tambahkan</p>
    </div>

    <div class="rounded-2xl bg-gradient-to-br from-wk-orange-dark/90 to-wk-orange/80 border border-wk-orange p-8 max-w-4xl">
        <form action="{{ route('stok.index') }}" method="GET" class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <div>
                <label class="block text-sm text-white/90 mb-1.5 font-medium">Kode barang</label>
                <select class="w-full rounded-lg bg-[#241f1e] border border-white/20 text-gray-100 px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-white/40">
                    @foreach ($kodeBarang as $kode)
                        <option>{{ $kode }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm text-white/90 mb-1.5 font-medium">Nama barang</label>
                <input type="text" placeholder="Contoh: Mie Rebus"
                    class="w-full rounded-lg bg-[#241f1e] border border-white/20 text-gray-100 placeholder-gray-500 px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-white/40">
            </div>

            <div>
                <label class="block text-sm text-white/90 mb-1.5 font-medium">Harga</label>
                <input type="text" placeholder="Rp. 0"
                    class="w-full rounded-lg bg-[#241f1e] border border-white/20 text-gray-100 placeholder-gray-500 px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-white/40">
            </div>

            <div>
                <label class="block text-sm text-white/90 mb-1.5 font-medium">Jumlah</label>
                <input type="number" placeholder="0"
                    class="w-full rounded-lg bg-[#241f1e] border border-white/20 text-gray-100 placeholder-gray-500 px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-white/40">
            </div>

            <div>
                <label class="block text-sm text-white/90 mb-1.5 font-medium">Satuan</label>
                <select class="w-full rounded-lg bg-[#241f1e] border border-white/20 text-gray-100 px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-white/40">
                    @foreach ($satuan as $s)
                        <option>{{ $s }}</option>
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

            <div class="md:col-span-2 flex items-center gap-4 pt-2">
                <button type="submit"
                    class="bg-white text-wk-orange-dark font-semibold px-6 py-2.5 rounded-lg hover:bg-gray-100 transition shadow">
                    Simpan
                </button>
                <a href="{{ route('stok.index') }}"
                    class="bg-red-600 hover:bg-red-500 text-white font-semibold px-6 py-2.5 rounded-lg transition shadow text-center">
                    Batal
                </a>
            </div>
        </form>
    </div>
@endsection
