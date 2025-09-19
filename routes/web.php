<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArsipSuratController;
use App\Http\Controllers\KategoriSuratController;

// =======================
// Route Arsip Surat
// =======================

// Halaman utama (daftar arsip surat + search)
Route::get('/', [ArsipSuratController::class, 'index'])->name('arsip.index');

// Form unggah surat
Route::get('/arsip/create', [ArsipSuratController::class, 'create'])->name('arsip.create');
Route::post('/arsip/store', [ArsipSuratController::class, 'store'])->name('arsip.store');

// Lihat detail surat
Route::get('/arsip/{id}/lihat', [ArsipSuratController::class, 'lihat'])->name('arsip.lihat');

// Download file surat
Route::get('/arsip/{id}/download', [ArsipSuratController::class, 'download'])->name('arsip.download');

// Edit surat
Route::get('/arsip/{id}/edit', [ArsipSuratController::class, 'edit'])->name('arsip.edit');
Route::put('/arsip/{id}', [ArsipSuratController::class, 'update'])->name('arsip.update');

// Hapus surat
Route::delete('/arsip/{id}', [ArsipSuratController::class, 'destroy'])->name('arsip.destroy');

// =======================
// Route Static Page
// =======================
Route::view('/about', 'arsip.about')->name('arsip.about');

// =======================
// Route Kategori Surat
// =======================
Route::resource('kategori', KategoriSuratController::class);
