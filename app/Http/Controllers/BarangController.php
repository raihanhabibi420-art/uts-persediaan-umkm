<?php

namespace App\Http\Controllers;

use App\Data\DataPersediaan;

class BarangController extends Controller
{
    private function hitungStatusBarang(array $item): array
    {
        $stokAkhir = $item['stok_awal'] + $item['masuk'] - $item['keluar'];
        $item['stok_akhir'] = $stokAkhir;

        if ($item['stok_awal'] < 0 || $item['masuk'] < 0 || $item['keluar'] < 0 || $stokAkhir < 0) {
            $item['status'] = 'Tidak Valid';
            $item['badge'] = 'dark';
        } elseif ($stokAkhir == 0) {
            $item['status'] = 'Stok Habis';
            $item['badge'] = 'danger';
        } elseif ($stokAkhir <= $item['stok_minimum']) {
            $item['status'] = 'Stok Menipis';
            $item['badge'] = 'warning';
        } else {
            $item['status'] = 'Stok Aman';
            $item['badge'] = 'success';
        }

        return $item;
    }

    public function index()
    {
        $dataMentah = DataPersediaan::getAllBarang();
        $daftarBarang = [];
        $kategoriList = [];

        foreach ($dataMentah as $item) {
            $daftarBarang[] = $this->hitungStatusBarang($item);
            if (!in_array($item['kategori'], $kategoriList)) {
                $kategoriList[] = $item['kategori'];
            }
        }

        return view('barang.index', compact('daftarBarang', 'kategoriList'));
    }

    public function byKategori(string $kategori)
    {
        $dataMentah = DataPersediaan::getAllBarang();
        $barangKategori = [];
        $kategoriList = [];

        foreach ($dataMentah as $item) {
            if (!in_array($item['kategori'], $kategoriList)) {
                $kategoriList[] = $item['kategori'];
            }
            if (strtolower($item['kategori']) === strtolower($kategori)) {
                $barangKategori[] = $this->hitungStatusBarang($item);
            }
        }

        return view('barang.kategori', [
            'barangKategori' => $barangKategori,
            'kategoriAktif' => ucwords(str_replace('-', ' ', $kategori)),
            'kategoriList' => $kategoriList
        ]);
    }

    public function detail(string $kode)
    {
        $dataMentah = DataPersediaan::getAllBarang();
        $barangDetail = null;

        foreach ($dataMentah as $item) {
            if (strtoupper($item['kode']) === strtoupper($kode)) {
                $barangDetail = $this->hitungStatusBarang($item);
                $barangDetail['kebutuhan_pengadaan'] = ($barangDetail['status'] !== 'Tidak Valid' && $barangDetail['stok_akhir'] < $barangDetail['stok_target'])
                    ? ($barangDetail['stok_target'] - $barangDetail['stok_akhir'])
                    : 0;
                break;
            }
        }

        if (!$barangDetail) {
            abort(404, 'Data barang tidak ditemukan.');
        }

        return view('barang.detail', compact('barangDetail'));
    }
}
