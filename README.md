# Warkop EL (UI/UX Only)

Prototipe tampilan (frontend) untuk sistem inventaris & kasir warung kopi
**Warkop EL**. Dibangun dengan **Laravel 11 + Blade + Tailwind CSS (CDN) +
Vanilla JS**. Semua data yang tampil masih **dummy/hardcoded** langsung di
controller — belum ada database, model, atau autentikasi sungguhan. Fokus
tahap ini murni pada tampilan.

## Fitur / Halaman

| Halaman | Route | Keterangan |
|---|---|---|
| Login | `/login` | "Warkop EL Web Login", submit langsung ke dashboard (dummy) |
| Dashboard | `/dashboard` | Kartu statistik + tabel ringkasan barang |
| Data Stok Barang | `/stok` | Tabel stok + pencarian (JS) + badge status |
| Tambah Barang | `/stok/tambah` | Form tambah barang (panel oranye) |
| Transaksi | `/transaksi` | Ringkasan transaksi hari ini + detail pesanan |
| Input Transaksi | `/transaksi/input` | Form input transaksi (panel oranye) |
| Management User | `/management-user` | Tabel user + filter role/status (JS) |
| Profil | `/profil` | Kartu profil admin |

## Cara Menjalankan di Laptop

1. **Prasyarat**: PHP >= 8.2 dan Composer sudah terpasang.
2. Ekstrak zip ini, lalu masuk ke folder proyek:
   ```bash
   cd warkop-el
   ```
3. Install dependency Laravel:
   ```bash
   composer install
   ```
4. Salin file environment (kalau `.env` belum ada — biasanya sudah disertakan):
   ```bash
   cp .env.example .env
   ```
5. Generate application key:
   ```bash
   php artisan key:generate
   ```
6. Jalankan server lokal:
   ```bash
   php artisan serve
   ```
7. Buka di browser: **http://127.0.0.1:8000** → otomatis diarahkan ke halaman login.

> Tailwind CSS dimuat lewat CDN (`cdn.tailwindcss.com`), jadi **tidak perlu**
> `npm install` / build asset apa pun untuk melihat tampilannya. Cukup PHP +
> Composer.

## Struktur Penting

```
app/Http/Controllers/   → Controller per halaman, data dummy di sini (array PHP)
resources/views/        → Semua file Blade
  layouts/app.blade.php → Layout utama (sidebar + header), dipakai semua halaman kecuali login
  auth/login.blade.php  → Halaman login (standalone, tanpa sidebar)
routes/web.php          → Daftar seluruh route
```

## Mengubah Data Dummy

Karena belum ada database, tinggal edit array PHP di masing-masing controller,
misalnya:
- `app/Http/Controllers/StokController.php` → daftar barang
- `app/Http/Controllers/TransaksiController.php` → daftar transaksi
- `app/Http/Controllers/UserController.php` → daftar user
- `app/Http/Controllers/DashboardController.php` → statistik dashboard

## Tema Warna

- Latar utama: `#1c1a19`
- Panel/kartu: `#242120`
- Sidebar: `#211e1d`
- Aksen oranye: `#f2760c` (hover: `#ff9a3c`)

Semua warna didefinisikan di `resources/views/layouts/app.blade.php` pada
konfigurasi `tailwind.config` sehingga mudah diubah dari satu tempat.

## Langkah Selanjutnya (belum dikerjakan)

- Migrasi database & model (barang, transaksi, user, role)
- Autentikasi & otorisasi sungguhan (Laravel Breeze/Fortify + middleware role)
- CRUD sungguhan untuk stok, transaksi, dan user
- Validasi form
