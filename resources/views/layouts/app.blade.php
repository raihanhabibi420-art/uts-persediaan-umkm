<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistem Persediaan UMKM')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex flex-column min-vh-100">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm mb-4">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('dashboard') }}">UMKM Inventory</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('dashboard') ? 'active fw-bold' : '' }}" href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('barang.*') ? 'active fw-bold' : '' }}" href="{{ route('barang.index') }}">Daftar Barang</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('analisis.stok') ? 'active fw-bold' : '' }}" href="{{ route('analisis.stok') }}">Analisis Stok</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('analisis.rekomendasi*') ? 'active fw-bold' : '' }}" href="{{ route('analisis.rekomendasi') }}">Rekomendasi Pengadaan</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mb-5">
        @yield('content')
    </div>

    <footer class="text-center text-muted py-3 border-top bg-white mt-auto">
        <small>UTS Pemrograman Internet &bull; Sistem Analisis Persediaan & Pengadaan Barang UMKM</small>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
