# uts-persediaan-umkm
# Sistem Analisis Persediaan dan Rekomendasi Pengadaan Barang UMKM

## Identitas Mahasiswa
Nama : M. Raihan Habibi

NIM : C2483207004

Kelas: V / PT15

Mata Kuliah : Pemrograman Internet 

Dosen Pengampu : Taofik Muhammad, M.Kom)

## Deskripsi Permasalahan & Solusi
Pengelola UMKM sering mengalami kesulitan dalam memantau ketersediaan stok barang secara akurat sehingga beberapa barang mengalami kehabisan stok, sedangkan barang lainnya menumpuk dalam jumlah besar. Aplikasi web berbasis **Laravel** ini dikembangkan (tanpa database, memanfaatkan Array PHP) untuk menghitung stok akhir secara otomatis, mendeteksi ketidakvalidan data pencatatan stok, mengelompokkan status persediaan, serta menyusun rekomendasi prioritas pengadaan beserta estimasi anggarannya.

## Implementasi Routing, Controller, dan Blade View (MVC)
1. Routing (`routes/web.php`):** Menerapkan 7 route yang mencakup halaman utama, daftar barang, penyaringan berdasarkan kategori dan prioritas menggunakan parameter URL (`{kategori}`, `{kode}`, `{prioritas}`), serta halaman analisis stok dan rekomendasi.
2. Controller (`app/Http/Controllers/`):** Terdiri dari 3 controller (`DashboardController`, `BarangController`, dan `AnalisisController`) yang menangani seluruh proses perhitungan stok, validasi data negatif, klasifikasi status, serta pengurutan prioritas belanja.
3. Blade View (`resources/views/`):** Terdiri dari 7 template Blade yang menerapkan layout inheritance (`@extends`, `@section`, `@yield`), perulangan (`@foreach`), dan percabangan (`@if`) dengan antarmuka Bootstrap 5.

## Logika Perhitungan & Analisis
* **Perhitungan Stok Akhir:** `Stok Akhir = Stok Awal + Barang Masuk - Barang Keluar`
* **Validasi Data Persediaan:** Jika `Stok Akhir < 0` atau terdapat nilai input negatif, barang ditandai sebagai **Tidak Valid** dan dikecualikan dari perhitungan pengadaan.
* **Klasifikasi Kondisi Stok:**
  * `Stok Akhir == 0` -> **Stok Habis** (Prioritas Pengadaan: **Tinggi**)
  * `Stok Akhir <= Stok Minimum` -> **Stok Menipis** (Prioritas Pengadaan: **Sedang**)
  * `Stok Akhir > Stok Minimum` -> **Stok Aman**
* **Rekomendasi Pengadaan:** `Jumlah Beli = Stok Target - Stok Akhir`, diurutkan dari tingkat prioritas tertinggi hingga jumlah kebutuhan terbanyak.

## Screenshot Hasil Aplikasi
1. Halaman Utama & Ringkasan Persediaan
![Screenshot 1] (<img width="1358" height="721" alt="WhatsApp Image 2026-11-16 at 16 06 59" src="https://github.com/user-attachments/assets/d2544255-58c7-457c-af82-1dffd7e0b10a" />)

2. Halaman Analisis Kondisi Stok & Validasi Data
![Screenshot 2] (<img width="1360" height="722" alt="WhatsApp Image 2026-11-16 at 16 07 20" src="https://github.com/user-attachments/assets/fe51119e-58f7-42df-9551-a40c9c50670f" />)

3. Halaman Rekomendasi Pengadaan Barang
![Screenshot 3] (<img width="1360" height="726" alt="WhatsApp Image 2026-11-16 at 16 07 51" src="https://github.com/user-attachments/assets/072e2c1d-adb8-46bb-b267-5db89cd3d91f" />)

## Petunjuk Menjalankan Aplikasi
1. Clone repository ini:
   `git clone https://github.com/raihanhabibi420-art/uts-persediaan-umkm.git`
2. Masuk ke direktori proyek dan instal dependensi Composer:
   `cd uts-persediaan-umkm && composer install`
3. Salin file `.env.example` menjadi `.env` dan generate application key:
   `cp .env.example .env && php artisan key:generate`
4. Jalankan server lokal Laravel:
   `php artisan serve`
5. Buka browser dan akses `http://127.0.0.1:8000`.
6.
