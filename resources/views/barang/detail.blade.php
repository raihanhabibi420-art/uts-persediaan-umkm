@extends("layouts.app")
@section("title", "Detail Barang - " . $barangDetail["nama"])

@section("content")
<div class="mb-3">
    <a href="{{ route("barang.index") }}" class="btn btn-secondary btn-sm">&larr; Kembali ke Daftar Barang</a>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
        <h4 class="fw-bold mb-0">{{ $barangDetail["nama"] }} ({{ $barangDetail["kode"] }})</h4>
        <span class="badge bg-{{ $barangDetail["badge"] }} fs-6">{{ $barangDetail["status"] }}</span>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <tr><th width="30%">Kategori</th><td>{{ $barangDetail["kategori"] }}</td></tr>
            <tr><th>Stok Awal</th><td>{{ $barangDetail["stok_awal"] }} {{ $barangDetail["satuan"] }}</td></tr>
            <tr><th>Barang Masuk</th><td>{{ $barangDetail["masuk"] }} {{ $barangDetail["satuan"] }}</td></tr>
            <tr><th>Barang Keluar</th><td>{{ $barangDetail["keluar"] }} {{ $barangDetail["satuan"] }}</td></tr>
            <tr class="table-light"><th>Stok Akhir (Awal + Masuk - Keluar)</th><td class="fw-bold">{{ $barangDetail["stok_akhir"] }} {{ $barangDetail["satuan"] }}</td></tr>
            <tr><th>Batas Stok Minimum</th><td>{{ $barangDetail["stok_minimum"] }} {{ $barangDetail["satuan"] }}</td></tr>
            <tr><th>Stok Target Ideal</th><td>{{ $barangDetail["stok_target"] }} {{ $barangDetail["satuan"] }}</td></tr>
            <tr><th>Harga Beli Satuan</th><td>Rp {{ number_format($barangDetail["harga_beli"], 0, ",", ".") }}</td></tr>
            <tr class="table-info"><th>Rekomendasi Jumlah Pengadaan</th><td class="fw-bold">{{ $barangDetail["kebutuhan_pengadaan"] }} {{ $barangDetail["satuan"] }}</td></tr>
        </table>
    </div>
</div>
@endsection