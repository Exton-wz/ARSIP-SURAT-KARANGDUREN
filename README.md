<p align="center">
    <a href="https://laravel.com" target="_blank">
        <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
    </a>
</p>

<h2 align="center">Aplikasi Karang Duren</h2>

<p align="center">
    <a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
    <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
    <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
    <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

---

# Tujuan
Aplikasi Arsip Karangduren dibuat untuk mempermudah pengelolaan dokumen dan surat masuk/keluar, termasuk penyimpanan, pencarian, pengarsipan, serta pengunduhan file surat dalam format PDF.

# Fitur
Manajemen Arsip
- Pencarian Surat
  Cari surat berdasarkan judul menggunakan search bar.
- Tambah Surat
  Input data surat baru dengan pilihan kategori (Undangan, Pengumuman, Nota Dinas, Pemberitahuan) dan upload file PDF.
- Edit Surat
  Ubah data surat beserta kategori dan file PDF.
- Hapus Surat
  Hapus data surat dengan konfirmasi terlebih dahulu.
- Unduh Surat
  Download file surat dalam format PDF.
- Lihat Detail Surat
  Menampilkan detail surat beserta file PDF.
# Manajemen Kategori Surat
- Tambah / Edit / Hapus Kategori Surat
  Tambah, edit, atau hapus kategori surat dengan ID otomatis.
- Halaman About
  Menampilkan foto pembuat, nama, NIM, dan tanggal pembuatan aplikasi.

# Cara Menjalankan
- Clone repository ini:
  git clone https://github.com/divaadl/karangduren-arsip
- Masuk ke folder project:
  cd karangduren-arsip
- Install dependensi Laravel:
  composer install
- Copy file .env.example menjadi .env:
  cp .env.example .env
- Generate application key:
  php artisan key:generate
- Buat symlink untuk file storage:
  php artisan storage:link
- Migrate database:
  php artisan migrate
- Jalankan aplikasi:
  php artisan serve

# Dokumentasi
### 1. Halaman Utama Arsip
![Dashboard](public/images/dashboard.png)

### 2. Halaman Tambah Arsip
![Tambah Arsip](public/images/tambah_arsip.png)

### 3. Halaman Edit Arsip
![Edit Arsip](public/images/edit_arsip.png)

### 4. Halaman Hapus Arsip
![Hapus Arsip](public/images/hapus_arsip.png)

### 5. Halaman Lihat Arsip
![Lihat Arsip](public/images/lihat_arsip.png)

### 6. Halaman Utama Kategori Arsip
![Dashboard Kategori](public/images/dashboard_kategori.png)

### 7. Halaman Tambah Kategori
![Tambah Kategori](public/images/tambah_kategori.png)

### 8. Halaman Edit Kategori
![Edit Kategori](public/images/edit_kategori.png)

### 9. Halaman Hapus Kategori
![Hapus Kategori](public/images/hapus_kategori.png)

### 10. Halaman About
![About](public/images/about.png)
