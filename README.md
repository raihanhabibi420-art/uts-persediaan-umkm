# uts-persediaan-umkm

# Sistem Analisis Persediaan dan Rekomendasi Pengadaan Barang UMKM

## Identitas Mahasiswa
NAMA : M. Raihan Habibi

NIM : C2483207004

KELAS : V / PT15

MATA KULIAH : Pemrograman Internet

DOSEN PENGAMPU : TAOFIK MUHAMMAD, S.PD,M.KOM

## Deskripsi Permasalahan & Solusi
Pengelola UMKM sering mengalami kesulitan dalam memantau ketersediaan stok barang secara akurat sehingga beberapa barang mengalami kehabisan stok, sedangkan barang lainnya menumpuk dalam jumlah besar. Aplikasi web berbasis **Laravel** ini dikembangkan (tanpa database, memanfaatkan Array PHP) untuk menghitung stok akhir secara otomatis, mendeteksi ketidakvalidan data pencatatan stok, mengelompokkan status persediaan, serta menyusun rekomendasi prioritas pengadaan beserta estimasi anggarannya.

## Implementasi Routing, Controller, dan Blade View (MVC)
1.Routing (`routes/web.php`): Menerapkan 7 route yang mencakup halaman utama, daftar barang, penyaringan berdasarkan kategori dan prioritas menggunakan parameter URL (`{kategori}`, `{kode}`, `{prioritas}`), serta halaman analisis stok dan rekomendasi.
2. Controller (`app/Http/Controllers/`): Terdiri dari 3 controller (`DashboardController`, `BarangController`, dan `AnalisisController`) yang menangani seluruh proses perhitungan stok, validasi data negatif, klasifikasi status, serta pengurutan prioritas belanja.
3. Blade View (`resources/views/`): Terdiri dari 7 template Blade yang menerapkan layout inheritance (`@extends`, `@section`, `@yield`), perulangan (`@foreach`), dan percabangan (`@if`) dengan antarmuka Bootstrap 5.

## Logika Perhitungan & Analisis
* Perhitungan Stok Akhir: `Stok Akhir = Stok Awal + Barang Masuk - Barang Keluar`
* Validasi Data Persediaan: Jika `Stok Akhir < 0` atau terdapat nilai input negatif, barang ditandai sebagai **Tidak Valid** dan dikecualikan dari perhitungan pengadaan.
* Klasifikasi Kondisi Stok:
  * `Stok Akhir == 0` -> Stok Habis (Prioritas Pengadaan: **Tinggi**)
  * `Stok Akhir <= Stok Minimum` -> Stok Menipis(Prioritas Pengadaan: **Sedang**)
  * `Stok Akhir > Stok Minimum` -> Stok Aman
* **Rekomendasi Pengadaan: `Jumlah Beli = Stok Target - Stok Akhir`, diurutkan dari tingkat prioritas tertinggi hingga jumlah kebutuhan terbanyak.

## Screenshot Hasil Aplikasi
1. Halaman Utama & Ringkasan Persediaan
![Screenshot 1] (<img width="1358" height="721" alt="WhatsApp Image 2026-11-16 at 16 06 59" src="https://github.com/user-attachments/assets/6d165699-9636-49e7-adb3-52aff0b228b1" />)

2. Halaman Analisis Kondisi Stok & Validasi Data
![Screenshot 2] (<img width="1360" height="722" alt="WhatsApp Image 2026-11-16 at 16 07 20" src="https://github.com/user-attachments/assets/86eff61f-f2d3-48dc-88fb-10768c158752" />)

3. Halaman Rekomendasi Pengadaan Barang
![Screenshot 3] (<img width="1360" height="726" alt="WhatsApp Image 2026-11-16 at 16 07 51" src="https://github.com/user-attachments/assets/191aa805-3dbf-46d1-9244-75345ef4bd24" />)

## Petunjuk Menjalankan Aplikasi
1. Clone repository GitHub proyek ini ke komputer lokal dan masuk ke direktori proyek (`cd uts-persediaan-umkm`).
2. Instal dependensi Laravel dengan menjalankan perintah `composer install`.
3. Salin file `.env.example` menjadi `.env`, lalu buat key aplikasi menggunakan `php artisan key:generate`.
4. Jalankan server lokal dengan perintah `php artisan serve`.
5. Buka browser dan akses alamat `http://127.0.0.1:8000`.
  
