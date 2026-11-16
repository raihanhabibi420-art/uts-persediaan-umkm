<?php

namespace App\Http\Controllers;

use App\Data\DataPersediaan;

class AnalisisController extends Controller
{
    public function analisisStok()
    {
        $dataMentah = DataPersediaan::getAllBarang();
        $stokHabis = [];
        $stokMenipis = [];
        $stokAman = [];
        $dataTidakValid = [];

        foreach ($dataMentah as $item) {
            $stokAkhir = $item['stok_awal'] + $item['masuk'] - $item['keluar'];
            $item['stok_akhir'] = $stokAkhir;

            if ($item['stok_awal'] < 0 || $item['masuk'] < 0 || $item['keluar'] < 0 || $stokAkhir < 0) {
                $item['alasan_invalid'] = "Stok akhir bernilai negatif ({$stokAkhir} {$item['satuan']}) karena barang keluar melebihi total stok tersedia.";
                $dataTidakValid[] = $item;
            } elseif ($stokAkhir == 0) {
                $stokHabis[] = $item;
            } elseif ($stokAkhir <= $item['stok_minimum']) {
                $stokMenipis[] = $item;
            } else {
                $stokAman[] = $item;
            }
        }

        return view('analisis.stok', compact('stokHabis', 'stokMenipis', 'stokAman', 'dataTidakValid'));
    }

    public function rekomendasi($prioritas = 'semua')
    {
        $dataMentah = DataPersediaan::getAllBarang();
        $daftarRekomendasi = [];
        $totalEstimasiBiaya = 0;

        foreach ($dataMentah as $item) {
            $stokAkhir = $item['stok_awal'] + $item['masuk'] - $item['keluar'];

            if ($item['stok_awal'] < 0 || $item['masuk'] < 0 || $item['keluar'] < 0 || $stokAkhir < 0) {
                continue;
            }

            if ($stokAkhir <= $item['stok_minimum']) {
                $jumlahBeli = max(0, $item['stok_target'] - $stokAkhir);
                $estimasiBiaya = $jumlahBeli * $item['harga_beli'];

                if ($stokAkhir == 0) {
                    $tingkatPrioritas = 'Tinggi';
                    $skorUrutan = 1;
                    $badge = 'danger';
                } else {
                    $tingkatPrioritas = 'Sedang';
                    $skorUrutan = 2;
                    $badge = 'warning';
                }

                if ($prioritas === 'semua' || strtolower($prioritas) === strtolower($tingkatPrioritas)) {
                    $item['stok_akhir'] = $stokAkhir;
                    $item['jumlah_beli'] = $jumlahBeli;
                    $item['estimasi_biaya'] = $estimasiBiaya;
                    $item['prioritas'] = $tingkatPrioritas;
                    $item['skor_urutan'] = $skorUrutan;
                    $item['badge'] = $badge;

                    $daftarRekomendasi[] = $item;
                    $totalEstimasiBiaya += $estimasiBiaya;
                }
            }
        }

        usort($daftarRekomendasi, function ($a, $b) {
            if ($a['skor_urutan'] === $b['skor_urutan']) {
                return $b['jumlah_beli'] <=> $a['jumlah_beli'];
            }
            return $a['skor_urutan'] <=> $b['skor_urutan'];
        });

        return view('analisis.rekomendasi', [
            'daftarRekomendasi' => $daftarRekomendasi,
            'totalEstimasiBiaya' => $totalEstimasiBiaya,
            'filterAktif' => ucfirst($prioritas)
        ]);
    }
}
