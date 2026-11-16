<?php

namespace App\Data;

class DataPersediaan
{
    public static function getAllBarang(): array
    {
        return [
            ['kode' => 'BRG001', 'nama' => 'Kertas HVS A4 80gr', 'kategori' => 'ATK', 'satuan' => 'Rim', 'stok_awal' => 50, 'masuk' => 20, 'keluar' => 65, 'stok_minimum' => 15, 'stok_target' => 60, 'harga_beli' => 48000],
            ['kode' => 'BRG002', 'nama' => 'Tinta Printer Hitam Epson', 'kategori' => 'ATK', 'satuan' => 'Botol', 'stok_awal' => 20, 'masuk' => 5, 'keluar' => 25, 'stok_minimum' => 8, 'stok_target' => 25, 'harga_beli' => 85000],
            ['kode' => 'BRG003', 'nama' => 'Pulpen Gel Hitam Box', 'kategori' => 'ATK', 'satuan' => 'Box', 'stok_awal' => 30, 'masuk' => 10, 'keluar' => 12, 'stok_minimum' => 10, 'stok_target' => 30, 'harga_beli' => 24000],
            ['kode' => 'BRG004', 'nama' => 'Map Plastik Snelhecter', 'kategori' => 'ATK', 'satuan' => 'Lusin', 'stok_awal' => 15, 'masuk' => 5, 'keluar' => 18, 'stok_minimum' => 5, 'stok_target' => 20, 'harga_beli' => 30000],
            ['kode' => 'BRG005', 'nama' => 'Plastik Standing Pouch 500gr', 'kategori' => 'Kemasan', 'satuan' => 'Pack', 'stok_awal' => 100, 'masuk' => 50, 'keluar' => 140, 'stok_minimum' => 30, 'stok_target' => 120, 'harga_beli' => 35000],
            ['kode' => 'BRG006', 'nama' => 'Kardus Packing Polos 20x20', 'kategori' => 'Kemasan', 'satuan' => 'Pcs', 'stok_awal' => 200, 'masuk' => 100, 'keluar' => 120, 'stok_minimum' => 50, 'stok_target' => 250, 'harga_beli' => 3500],
            ['kode' => 'BRG007', 'nama' => 'Lakban Bening 2 Inch', 'kategori' => 'Kemasan', 'satuan' => 'Roll', 'stok_awal' => 40, 'masuk' => 10, 'keluar' => 50, 'stok_minimum' => 15, 'stok_target' => 50, 'harga_beli' => 12000],
            ['kode' => 'BRG008', 'nama' => 'Bubble Wrap Hitam 50m', 'kategori' => 'Kemasan', 'satuan' => 'Roll', 'stok_awal' => 12, 'masuk' => 8, 'keluar' => 6, 'stok_minimum' => 5, 'stok_target' => 15, 'harga_beli' => 65000],
            ['kode' => 'BRG009', 'nama' => 'Biji Kopi Robusta Lampung', 'kategori' => 'Bahan Baku', 'satuan' => 'Kg', 'stok_awal' => 40, 'masuk' => 15, 'keluar' => 52, 'stok_minimum' => 10, 'stok_target' => 45, 'harga_beli' => 75000],
            ['kode' => 'BRG010', 'nama' => 'Gula Aren Cair Organik', 'kategori' => 'Bahan Baku', 'satuan' => 'Jerigen', 'stok_awal' => 25, 'masuk' => 10, 'keluar' => 15, 'stok_minimum' => 8, 'stok_target' => 30, 'harga_beli' => 90000],
            ['kode' => 'BRG011', 'nama' => 'Susu UHT Full Cream 1L', 'kategori' => 'Bahan Baku', 'satuan' => 'Karton', 'stok_awal' => 18, 'masuk' => 12, 'keluar' => 30, 'stok_minimum' => 10, 'stok_target' => 25, 'harga_beli' => 195000],
            ['kode' => 'BRG012', 'nama' => 'Sirup Vanilla Premium', 'kategori' => 'Bahan Baku', 'satuan' => 'Botol', 'stok_awal' => 15, 'masuk' => 5, 'keluar' => 6, 'stok_minimum' => 5, 'stok_target' => 15, 'harga_beli' => 110000],
            ['kode' => 'BRG013', 'nama' => 'Kertas Thermal Struk 58mm', 'kategori' => 'Elektronik', 'satuan' => 'Roll', 'stok_awal' => 60, 'masuk' => 20, 'keluar' => 72, 'stok_minimum' => 20, 'stok_target' => 80, 'harga_beli' => 5000],
            ['kode' => 'BRG014', 'nama' => 'Baterai Alkaline AA', 'kategori' => 'Elektronik', 'satuan' => 'Pack', 'stok_awal' => 25, 'masuk' => 10, 'keluar' => 15, 'stok_minimum' => 10, 'stok_target' => 30, 'harga_beli' => 18000],
            ['kode' => 'BRG015', 'nama' => 'Kabel Data USB Type-C', 'kategori' => 'Elektronik', 'satuan' => 'Pcs', 'stok_awal' => 10, 'masuk' => 2, 'keluar' => 15, 'stok_minimum' => 5, 'stok_target' => 20, 'harga_beli' => 25000],
        ];
    }
}
