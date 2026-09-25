@extends('layouts.app')

@section('title', 'Edit User')

@section('content')
    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold text-white">Edit User</h1>
            <p class="text-gray-400 mt-1">Ubah role, status, dan detail akun pengguna di sini.</p>
        </div>
        <a href="{{ route('user.index') }}"
            class="inline-flex items-center gap-2 justify-center bg-gray-700 hover:bg-gray-600 text-gray-200 text-sm font-semibold px-4 py-2.5 rounded-lg transition">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
            Kembali
        </a>
    </div>

    <div class="max-w-2xl bg-wk-panel border border-wk-border rounded-xl p-6 shadow-xl">
        <form action="{{ route('user.update', $user['no']) }}" method="POST" class="space-y-5">
            @csrf
            @method('PUT')

            {{-- No (Readonly) --}}
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-1.5">No</label>
                <input type="text" value="{{ $user['no'] }}" readonly
                    class="w-full px-4 py-2.5 rounded-lg bg-wk-panel2/50 border border-wk-border text-gray-400 focus:outline-none cursor-not-allowed text-sm">
            </div>

            {{-- Nama --}}
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-1.5">Nama</label>
                <input type="text" name="nama" value="{{ old('nama', $user['nama']) }}" required
                    class="w-full px-4 py-2.5 rounded-lg bg-wk-panel border border-wk-border text-gray-100 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-wk-orange focus:border-wk-orange transition text-sm">
                @error('nama')
                    <p class="text-xs text-red-400 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                {{-- Username --}}
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-1.5">Username</label>
                    <input type="text" name="username" value="{{ old('username', $user['username']) }}" required
                        class="w-full px-4 py-2.5 rounded-lg bg-wk-panel border border-wk-border text-gray-100 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-wk-orange focus:border-wk-orange transition text-sm">
                    @error('username')
                        <p class="text-xs text-red-400 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Email --}}
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-1.5">Email</label>
                    <input type="email" name="email" value="{{ old('email', $user['email']) }}" required
                        class="w-full px-4 py-2.5 rounded-lg bg-wk-panel border border-wk-border text-gray-100 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-wk-orange focus:border-wk-orange transition text-sm">
                    @error('email')
                        <p class="text-xs text-red-400 mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                {{-- Role --}}
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-1.5">Role</label>
                    <select name="role" required
                        class="w-full px-4 py-2.5 rounded-lg bg-wk-panel border border-wk-border text-gray-100 focus:outline-none focus:ring-2 focus:ring-wk-orange focus:border-wk-orange transition text-sm">
                        @foreach ($roles as $role)
                            <option value="{{ $role }}" {{ old('role', $user['role']) == $role ? 'selected' : '' }}>
                                {{ $role }}
                            </option>
                        @endforeach
                    </select>
                    @error('role')
                        <p class="text-xs text-red-400 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Status --}}
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-1.5">Status</label>
                    <select name="status" required
                        class="w-full px-4 py-2.5 rounded-lg bg-wk-panel border border-wk-border text-gray-100 focus:outline-none focus:ring-2 focus:ring-wk-orange focus:border-wk-orange transition text-sm">
                        @foreach ($statuses as $status)
                            <option value="{{ $status }}" {{ old('status', $user['status']) == $status ? 'selected' : '' }}>
                                {{ $status }}
                            </option>
                        @endforeach
                    </select>
                    @error('status')
                        <p class="text-xs text-red-400 mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- Tombol Aksi --}}
            <div class="flex items-center justify-end gap-3 pt-4 border-t border-wk-border">
                <a href="{{ route('user.index') }}"
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
