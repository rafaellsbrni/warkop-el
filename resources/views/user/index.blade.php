@extends('layouts.app')

@section('title', 'Management User')

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-white flex items-center gap-2">
            <svg class="w-6 h-6 text-wk-orange" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/>
            </svg>
            Management User dan Role
        </h1>
        <p class="text-gray-400 mt-1">Kelola data user, role dan hak akses pengguna dalam sistem.</p>
    </div>

    <div class="flex flex-col lg:flex-row items-stretch lg:items-center gap-3 mb-5">
        <div class="relative flex-1">
            <svg class="w-4 h-4 text-gray-500 absolute left-3.5 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <circle cx="11" cy="11" r="7"/><path d="M21 21l-4.3-4.3"/>
            </svg>
            <input id="searchUser" type="text" placeholder="Cari nama, email atau username"
                class="w-full pl-10 pr-4 py-2.5 rounded-lg bg-wk-panel border border-wk-border text-gray-100 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-wk-orange focus:border-wk-orange transition text-sm">
        </div>

        <select id="filterRole" class="rounded-lg bg-wk-panel border border-wk-border text-gray-200 px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-wk-orange">
            <option value="">Semua Role</option>
            <option>Admin</option>
            <option>Kasir</option>
            <option>Gudang</option>
        </select>

        <select id="filterStatus" class="rounded-lg bg-wk-panel border border-wk-border text-gray-200 px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-wk-orange">
            <option value="">Semua Status</option>
            <option>Aktif</option>
            <option>Nonaktif</option>
        </select>

        <button class="inline-flex items-center gap-2 justify-center bg-wk-orange hover:bg-wk-orange-light text-white text-sm font-semibold px-5 py-2.5 rounded-lg transition shadow-lg shadow-wk-orange/20 whitespace-nowrap">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg>
            Tambah User
        </button>
    </div>

    <div class="rounded-xl bg-wk-panel border border-wk-border overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm" id="tabelUser">
                <thead>
                    <tr class="text-left text-wk-orange-light border-b border-wk-border">
                        <th class="px-6 py-4 font-semibold">No</th>
                        <th class="px-6 py-4 font-semibold">Nama</th>
                        <th class="px-6 py-4 font-semibold">Username</th>
                        <th class="px-6 py-4 font-semibold">Email</th>
                        <th class="px-6 py-4 font-semibold">Role</th>
                        <th class="px-6 py-4 font-semibold">Status</th>
                        <th class="px-6 py-4 font-semibold text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $u)
                        @php
                            $roleBadge = match ($u['role']) {
                                'Admin' => 'bg-red-500 text-white',
                                'Kasir' => 'bg-blue-500 text-white',
                                default => 'bg-purple-500 text-white',
                            };
                            $statusBadge = $u['status'] === 'Aktif' ? 'bg-green-500 text-white' : 'bg-gray-500 text-white';
                        @endphp
                        <tr class="baris-user border-b border-wk-border/60 last:border-0 hover:bg-wk-panel2/60 transition"
                            data-role="{{ $u['role'] }}" data-status="{{ $u['status'] }}"
                            data-search="{{ strtolower($u['nama'].' '.$u['username'].' '.$u['email']) }}">
                            <td class="px-6 py-4 text-gray-300">{{ $u['no'] }}</td>
                            <td class="px-6 py-4 text-wk-orange-light font-medium">{{ $u['nama'] }}</td>
                            <td class="px-6 py-4 text-gray-300">{{ $u['username'] }}</td>
                            <td class="px-6 py-4 text-gray-300">{{ $u['email'] }}</td>
                            <td class="px-6 py-4">
                                <span class="inline-block px-3 py-1 rounded-md text-xs font-semibold {{ $roleBadge }}">{{ $u['role'] }}</span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="inline-block px-3 py-1 rounded-md text-xs font-semibold {{ $statusBadge }}">{{ $u['status'] }}</span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-end gap-2">
                                    <button class="w-8 h-8 flex items-center justify-center rounded-md bg-wk-orange/15 hover:bg-wk-orange/30 text-wk-orange-light transition" title="Edit">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                                    </button>
                                    <button onclick="return confirm('Hapus user ini?')" class="w-8 h-8 flex items-center justify-center rounded-md bg-red-500/15 hover:bg-red-500/30 text-red-400 transition" title="Hapus">
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
        function applyFilter() {
            const q = document.getElementById('searchUser').value.toLowerCase();
            const role = document.getElementById('filterRole').value;
            const status = document.getElementById('filterStatus').value;

            document.querySelectorAll('#tabelUser .baris-user').forEach(function (row) {
                const matchSearch = row.dataset.search.includes(q);
                const matchRole = !role || row.dataset.role === role;
                const matchStatus = !status || row.dataset.status === status;
                row.style.display = (matchSearch && matchRole && matchStatus) ? '' : 'none';
            });
        }
        document.getElementById('searchUser').addEventListener('input', applyFilter);
        document.getElementById('filterRole').addEventListener('change', applyFilter);
        document.getElementById('filterStatus').addEventListener('change', applyFilter);
    </script>
    @endpush
@endsection
