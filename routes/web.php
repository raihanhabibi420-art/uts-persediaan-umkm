<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\AnalisisController;

if (isset($_SERVER['HTTP_X_FORWARDED_HOST'])) {
    URL::forceRootUrl('https://' . $_SERVER['HTTP_X_FORWARDED_HOST']);
    URL::forceScheme('https');
}

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/barang', [BarangController::class, 'index'])->name('barang.index');
Route::get('/barang/kategori/{kategori}', [BarangController::class, 'byKategori'])->name('barang.kategori');
Route::get('/barang/detail/{kode}', [BarangController::class, 'detail'])->name('barang.detail');
Route::get('/analisis-stok', [AnalisisController::class, 'analisisStok'])->name('analisis.stok');
Route::get('/rekomendasi-pengadaan', [AnalisisController::class, 'rekomendasi'])->name('analisis.rekomendasi');
Route::get('/rekomendasi-pengadaan/{prioritas}', [AnalisisController::class, 'rekomendasi'])->name('analisis.rekomendasi.filter');
