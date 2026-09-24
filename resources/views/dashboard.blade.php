@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<style>
    .btn-dash-primary {
        border: none;
        border-radius: 10px;
        background: linear-gradient(135deg, #0f9d78, #0c7d5f);
        color: #fff;
        font-weight: 700;
        padding: 10px 18px;
        box-shadow: 0 4px 14px rgba(15, 157, 120, 0.22);
        transition: transform 0.12s ease, box-shadow 0.12s ease;
    }

    .btn-dash-primary:hover {
        transform: translateY(-1px);
        box-shadow: 0 6px 18px rgba(15, 157, 120, 0.3);
        color: #fff;
    }

    .btn-dash-outline {
        border-radius: 10px;
        border: 1px solid #e6e8ee;
        color: #5b6072;
        font-weight: 600;
        background: #fff;
        transition: 0.15s ease;
    }

    .btn-dash-outline:hover {
        background: #eafaf4;
        border-color: #cdeedb;
        color: #0c7d5f;
    }
</style>

<div class="container-fluid py-4">

    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
        <div>
            <h1 class="fw-bold mb-1">Dashboard</h1>
            <p class="text-muted mb-0">
                Pantau kondisi stok dan produk warung kamu.
            </p>
        </div>

        <a href="{{ route('products.create') }}" class="btn btn-dash-primary">
            + Tambah Produk
        </a>
    </div>

    <div class="row g-4 mb-4">

        <div class="col-12 col-sm-6 col-xl-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="text-muted small mb-2">
                        Total Produk
                    </div>

                    <h2 class="fw-bold text-primary mb-1">
                        {{ $totalProduk }}
                    </h2>

                    <p class="text-muted mb-0 small">
                        Jumlah semua produk di warung
                    </p>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="text-muted small mb-2">
                        Total Stok
                    </div>

                    <h2 class="fw-bold text-success mb-1">
                        {{ $totalStok }}
                    </h2>

                    <p class="text-muted mb-0 small">
                        Jumlah seluruh stok produk
                    </p>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="text-muted small mb-2">
                        Nilai Modal
                    </div>

                    <h2 class="fw-bold text-dark mb-1">
                        Rp {{ number_format($nilaiModal, 0, ',', '.') }}
                    </h2>

                    <p class="text-muted mb-0 small">
                        Total nilai modal seluruh stok
                    </p>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="text-muted small mb-2">
                        Stok Menipis
                    </div>

                    <h2 class="fw-bold text-warning mb-1">
                        {{ $stokMenipis }}
                    </h2>

                    <p class="text-muted mb-0 small">
                        Produk dengan stok di bawah batas minimum
                    </p>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="text-muted small mb-2">
                        Kedaluwarsa
                    </div>

                    <h2 class="fw-bold text-danger mb-1">
                        {{ $produkKedaluwarsa }}
                    </h2>

                    <p class="text-muted mb-0 small">
                        Produk yang sudah kedaluwarsa
                    </p>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="text-muted small mb-2">
                        Hampir Kedaluwarsa
                    </div>

                    <h2 class="fw-bold text-warning mb-1">
                        {{ $produkHampirKedaluwarsa }}
                    </h2>

                    <p class="text-muted mb-0 small">
                        Produk yang kedaluwarsa dalam 7 hari
                    </p>
                </div>
            </div>
        </div>

    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body">

            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-2 mb-3">
                <div>
                    <h4 class="fw-bold mb-1">Produk Terbaru</h4>
                    <p class="text-muted small mb-0">
                        Lima produk terakhir yang ditambahkan.
                    </p>
                </div>

                <a href="{{ route('products.index') }}" class="btn btn-dash-outline btn-sm">
                    Lihat Semua Produk
                </a>
            </div>

            @if($produk->count() > 0)

                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>No</th>
                                <th>Nama Produk</th>
                                <th>Kategori</th>
                                <th>Stok</th>
                                <th>Kedaluwarsa</th>
                                <th>Status</th>
                            </tr>
                        </thead>

                        <tbody>
                        @foreach($produk as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>

                                <td class="fw-semibold">
                                    {{ $item->nama_produk }}
                                </td>

                                <td>
                                    {{ $item->kategori ?? '-' }}
                                </td>

                                <td>
                                    {{ $item->stok }}
                                </td>

                                <td>
                                    @if($item->tanggal_kedaluwarsa)
                                        {{ $item->tanggal_kedaluwarsa->format('d-m-Y') }}
                                    @else
                                        <span class="text-muted">Tidak ada</span>
                                    @endif
                                </td>

                                <td>
                                    @if($item->tanggal_kedaluwarsa && $item->tanggal_kedaluwarsa->isPast())
                                        <span class="badge bg-danger">
                                            Kedaluwarsa
                                        </span>
                                    @elseif($item->tanggal_kedaluwarsa && $item->tanggal_kedaluwarsa->between(now(), now()->addDays(7)))
                                        <span class="badge bg-warning text-dark">
                                            Hampir Kedaluwarsa
                                        </span>
                                    @elseif($item->stok <= $item->stok_minimum)
                                        <span class="badge bg-warning text-dark">
                                            Stok Menipis
                                        </span>
                                    @else
                                        <span class="badge bg-success">
                                            Aman
                                        </span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            @else

                <div class="text-center py-5">
                    <h5 class="fw-bold">Belum Ada Produk</h5>
                    <p class="text-muted">
                        Silakan tambahkan produk pertama untuk mulai mengelola stok.
                    </p>

                    <a href="{{ route('products.create') }}" class="btn btn-dash-primary">
                        Tambah Produk
                    </a>
                </div>

            @endif

        </div>
    </div>

</div>
@endsection