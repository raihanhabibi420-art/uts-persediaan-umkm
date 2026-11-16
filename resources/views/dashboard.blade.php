@extends('layouts.app')
@section('title', 'Dashboard - Sistem Persediaan UMKM')

@section('content')
<div class="p-4 mb-4 bg-white rounded-3 shadow-sm border">
    <h2 class="fw-bold text-primary">Sistem Analisis Persediaan & Rekomendasi Pengadaan</h2>
    <p class="text-muted mb-0">Pemantauan otomatis status stok akhir barang UMKM dan perhitungan kebutuhan belanja pengadaan.</p>
</div>

<div class="row g-3 mb-4">
    <div class="col-md-3">
        <div class="card border-0 shadow-sm bg-success text-white h-100">
            <div class="card-body">
                <h6>Stok Aman</h6>
                <h2 class="fw-bold">{{ $jumlahAman }} <small class="fs-6">Item</small></h2>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card border-0 shadow-sm bg-warning text-dark h-100">
            <div class="card-body">
                <h6>Stok Menipis</h6>
                <h2 class="fw-bold">{{ $jumlahMenipis }} <small class="fs-6">Item</small></h2>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card border-0 shadow-sm bg-danger text-white h-100">
            <div class="card-body">
                <h6>Stok Habis</h6>
                <h2 class="fw-bold">{{ $jumlahHabis }} <small class="fs-6">Item</small></h2>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card border-0 shadow-sm bg-dark text-white h-100">
            <div class="card-body">
                <h6>Data Tidak Valid</h6>
                <h2 class="fw-bold">{{ $jumlahTidakValid }} <small class="fs-6">Item</small></h2>
            </div>
        </div>
    </div>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body">
        <h5 class="fw-bold mb-3">Filter Cepat Berdasarkan Kategori ({{ count($kategoriList) }} Kategori)</h5>
        <div class="d-flex flex-wrap gap-2">
            @foreach($kategoriList as $kat)
                <a href="{{ route('barang.kategori', $kat) }}" class="btn btn-outline-primary">{{ $kat }}</a>
            @endforeach
        </div>
    </div>
</div>
@endsection
