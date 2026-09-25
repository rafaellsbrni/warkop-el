@extends('layouts.app')

@section('title', 'Profil')

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-white">Profil</h1>
        <p class="text-gray-400 mt-1">Informasi akun dan pengaturan profil anda.</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 max-w-5xl">

        <div class="lg:col-span-1 rounded-xl bg-wk-panel border border-wk-border p-7 flex flex-col items-center text-center">
            <div class="w-24 h-24 rounded-full bg-wk-panel2 border-2 border-wk-orange flex items-center justify-center text-3xl font-bold text-wk-orange mb-4">
                {{ strtoupper(substr($profil['nama'], 0, 1)) }}
            </div>
            <p class="text-lg font-semibold text-white">{{ $profil['nama'] }}</p>
            <span class="mt-2 inline-block px-3 py-1 rounded-md text-xs font-semibold bg-red-500 text-white">{{ $profil['role'] }}</span>
            <button class="mt-6 w-full bg-wk-orange hover:bg-wk-orange-light text-white text-sm font-semibold py-2.5 rounded-lg transition shadow-lg shadow-wk-orange/20">
                Ganti Foto
            </button>
        </div>

        <div class="lg:col-span-2 rounded-xl bg-wk-panel border border-wk-border p-7">
            <h2 class="text-gray-200 font-semibold mb-5">Informasi Akun</h2>

            <div class="space-y-4">
                <div>
                    <label class="block text-sm text-gray-400 mb-1.5">Username</label>
                    <input type="text" value="{{ $profil['username'] }}" readonly
                        class="w-full rounded-lg bg-wk-panel2 border border-wk-border text-gray-200 px-4 py-2.5 focus:outline-none">
                </div>
                <div>
                    <label class="block text-sm text-gray-400 mb-1.5">Email</label>
                    <input type="text" value="{{ $profil['email'] }}" readonly
                        class="w-full rounded-lg bg-wk-panel2 border border-wk-border text-gray-200 px-4 py-2.5 focus:outline-none">
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm text-gray-400 mb-1.5">No. HP</label>
                        <input type="text" value="{{ $profil['no_hp'] }}"
                            class="w-full rounded-lg bg-wk-panel2 border border-wk-border text-gray-200 px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-wk-orange focus:border-wk-orange transition">
                    </div>
                    <div>
                        <label class="block text-sm text-gray-400 mb-1.5">Bergabung sejak</label>
                        <input type="text" value="{{ $profil['bergabung'] }}" readonly
                            class="w-full rounded-lg bg-wk-panel2 border border-wk-border text-gray-200 px-4 py-2.5 focus:outline-none">
                    </div>
                </div>

                <div class="flex items-center gap-4 pt-3">
                    <button class="bg-wk-orange hover:bg-wk-orange-light text-white font-semibold px-6 py-2.5 rounded-lg transition shadow-lg shadow-wk-orange/20">
                        Simpan Perubahan
                    </button>
                    <button class="bg-wk-panel2 hover:bg-wk-border text-gray-200 font-semibold px-6 py-2.5 rounded-lg transition border border-wk-border">
                        Ubah Password
                    </button>
                </div>
            </div>
        </div>

    </div>
@endsection
