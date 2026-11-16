@extends("layouts.app")
@section("title", "Daftar Seluruh Barang")

@section("content")
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3 class="fw-bold">Daftar Persediaan Barang ({{ count($daftarBarang) }} Item)</h3>
    <div>
        @foreach ($kategoriList as $kat)
            <a href="{{ route("barang.kategori", $kat) }}" class="btn btn-sm btn-outline-secondary">{{ $kat }}</a>
        @endforeach
    </div>
</div>

<div class="card border-0 shadow-sm">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th>Kode</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Awal</th>
                    <th>Masuk</th>
                    <th>Keluar</th>
                    <th>Stok Akhir</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($daftarBarang as $barang)
                <tr>
                    <td class="fw-bold">{{ $barang["kode"] }}</td>
                    <td>{{ $barang["nama"] }}</td>
                    <td><a href="{{ route("barang.kategori", $barang["kategori"]) }}" class="text-decoration-none">{{ $barang["kategori"] }}</a></td>
                    <td>{{ $barang["stok_awal"] }}</td>
                    <td class="text-success">+{{ $barang["masuk"] }}</td>
                    <td class="text-danger">-{{ $barang["keluar"] }}</td>
                    <td class="fw-bold">{{ $barang["stok_akhir"] }} {{ $barang["satuan"] }}</td>
                    <td><span class="badge bg-{{ $barang["badge"] }}">{{ $barang["status"] }}</span></td>
                    <td>
                        <a href="{{ route("barang.detail", $barang["kode"]) }}" class="btn btn-sm btn-primary">Detail</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection