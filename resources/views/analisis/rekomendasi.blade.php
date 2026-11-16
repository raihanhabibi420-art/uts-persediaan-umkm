@extends("layouts.app")
@section("title", "Rekomendasi Pengadaan Barang")

@section("content")
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3 class="fw-bold">Prioritas Rekomendasi Pengadaan ({{ $filterAktif }})</h3>
    <div class="btn-group">
        <a href="{{ route("analisis.rekomendasi") }}" class="btn btn-sm btn-outline-primary">Semua</a>
        <a href="{{ route("analisis.rekomendasi.filter", "tinggi") }}" class="btn btn-sm btn-outline-danger">Prioritas Tinggi</a>
        <a href="{{ route("analisis.rekomendasi.filter", "sedang") }}" class="btn btn-sm btn-outline-warning">Prioritas Sedang</a>
    </div>
</div>

<div class="card border-0 shadow-sm mb-3">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Prioritas</th>
                    <th>Kode & Nama Barang</th>
                    <th>Stok Akhir</th>
                    <th>Stok Target</th>
                    <th>Rekomendasi Beli</th>
                    <th>Estimasi Biaya</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($daftarRekomendasi as $index => $rek)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td><span class="badge bg-{{ $rek["badge"] }}">{{ $rek["prioritas"] }}</span></td>
                    <td><strong>{{ $rek["kode"] }}</strong> - {{ $rek["nama"] }}</td>
                    <td>{{ $rek["stok_akhir"] }} {{ $rek["satuan"] }}</td>
                    <td>{{ $rek["stok_target"] }} {{ $rek["satuan"] }}</td>
                    <td class="fw-bold text-primary">{{ $rek["jumlah_beli"] }} {{ $rek["satuan"] }}</td>
                    <td>Rp {{ number_format($rek["estimasi_biaya"], 0, ",", ".") }}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot class="table-light">
                <tr>
                    <th colspan="6" class="text-end">Total Estimasi Anggaran Pengadaan:</th>
                    <th class="text-success fs-6">Rp {{ number_format($totalEstimasiBiaya, 0, ",", ".") }}</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
@endsection