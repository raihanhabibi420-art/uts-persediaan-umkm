@extends("layouts.app")
@section("title", "Kategori: " . $kategoriAktif)

@section("content")
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3 class="fw-bold">Kategori Barang: {{ $kategoriAktif }}</h3>
    <a href="{{ route("barang.index") }}" class="btn btn-secondary btn-sm">&larr; Semua Barang</a>
</div>

<div class="card border-0 shadow-sm">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th>Kode</th>
                    <th>Nama Barang</th>
                    <th>Stok Akhir</th>
                    <th>Stok Minimum</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @if (count($barangKategori) > 0)
                    @foreach ($barangKategori as $barang)
                    <tr>
                        <td class="fw-bold">{{ $barang["kode"] }}</td>
                        <td>{{ $barang["nama"] }}</td>
                        <td class="fw-bold">{{ $barang["stok_akhir"] }} {{ $barang["satuan"] }}</td>
                        <td>{{ $barang["stok_minimum"] }} {{ $barang["satuan"] }}</td>
                        <td><span class="badge bg-{{ $barang["badge"] }}">{{ $barang["status"] }}</span></td>
                        <td><a href="{{ route("barang.detail", $barang["kode"]) }}" class="btn btn-sm btn-primary">Detail</a></td>
                    </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="6" class="text-center py-4 text-muted">Tidak ada barang pada kategori ini.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection