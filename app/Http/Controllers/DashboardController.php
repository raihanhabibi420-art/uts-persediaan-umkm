<?php

namespace App\Http\Controllers;

use App\Data\DataPersediaan;

class DashboardController extends Controller
{
    public function index()
    {
        $dataMentah = DataPersediaan::getAllBarang();
        $totalBarang = count($dataMentah);
        $kategoriList = [];

        $jumlahAman = 0;
        $jumlahMenipis = 0;
        $jumlahHabis = 0;
        $jumlahTidakValid = 0;

        foreach ($dataMentah as $item) {
            if (!in_array($item['kategori'], $kategoriList)) {
                $kategoriList[] = $item['kategori'];
            }

            $stokAkhir = $item['stok_awal'] + $item['masuk'] - $item['keluar'];

            if ($item['stok_awal'] < 0 || $item['masuk'] < 0 || $item['keluar'] < 0 || $stokAkhir < 0) {
                $jumlahTidakValid++;
            } elseif ($stokAkhir == 0) {
                $jumlahHabis++;
            } elseif ($stokAkhir <= $item['stok_minimum']) {
                $jumlahMenipis++;
            } else {
                $jumlahAman++;
            }
        }

        return view('dashboard', compact(
            'totalBarang',
            'kategoriList',
            'jumlahAman',
            'jumlahMenipis',
            'jumlahHabis',
            'jumlahTidakValid'
        ));
    }
}
