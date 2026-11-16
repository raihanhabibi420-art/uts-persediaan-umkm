@extends("layouts.app")
@section("title", "Analisis Kondisi Stok")

@section("content")
<h3 class="fw-bold mb-4">Analisis Kondisi Stok Barang</h3>

@if (count($dataTidakValid) > 0)
<div class="alert alert-dark shadow-sm">
    <h5 class="fw-bold">Peringatan: Ditemukan {{ count($dataTidakValid) }} Data Persediaan Tidak Valid!</h5>
    <ul class="mb-0">
        @foreach ($dataTidakValid as $inv)
            <li><strong>{{ $inv["kode"] }} - {{ $inv["nama"] }}:</strong> {{ $inv["alasan_invalid"] }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="row g-4">
    <div class="col-md-4">
        <div class="card border-danger shadow-sm h-100">
            <div class="card-header bg-danger text-white fw-bold">Stok Habis ({{ count($stokHabis) }})</div>
            <ul class="list-group list-group-flush">
                @foreach ($stokHabis as $item)
                    <li class="list-group-item d-flex justify-content-between">
                        <span>{{ $item["nama"] }}</span>
                        <span class="badge bg-danger">0 {{ $item["satuan"] }}</span>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card border-warning shadow-sm h-100">
            <div class="card-header bg-warning text-dark fw-bold">Stok Menipis ({{ count($stokMenipis) }})</div>
            <ul class="list-group list-group-flush">
                @foreach ($stokMenipis as $item)
                    <li class="list-group-item d-flex justify-content-between">
                        <span>{{ $item["nama"] }}</span>
                        <span class="badge bg-warning text-dark">{{ $item["stok_akhir"] }} / Min {{ $item["stok_minimum"] }}</span>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card border-success shadow-sm h-100">
            <div class="card-header bg-success text-white fw-bold">Stok Aman ({{ count($stokAman) }})</div>
            <ul class="list-group list-group-flush">
                @foreach ($stokAman as $item)
                    <li class="list-group-item d-flex justify-content-between">
                        <span>{{ $item["nama"] }}</span>
                        <span class="badge bg-success">{{ $item["stok_akhir"] }} {{ $item["satuan"] }}</span>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection