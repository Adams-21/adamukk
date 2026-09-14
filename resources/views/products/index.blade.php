@extends('layouts.app')

@section('title', 'Manajemen Produk')

@section('content')
<div class="container-fluid py-4">

    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
        <div>
            <h1 class="fw-bold mb-1">Manajemen Produk</h1>
            <p class="text-muted mb-0">
                Kelola stok dan tanggal kedaluwarsa produk warung.
            </p>
        </div>

        <a href="{{ route('products.create') }}" class="btn btn-primary">
            + Tambah Produk
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}

            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if($products->count() > 0)

        <div class="card border-0 shadow-sm">
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>No</th>
                                <th>Nama Produk</th>
                                <th>Kategori</th>
                                <th>Harga Modal</th>
                                <th>Harga Jual</th>
                                <th>Stok</th>
                                <th>Tanggal Kedaluwarsa</th>
                                <th>Status</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>

                                    <td class="fw-semibold">
                                        {{ $product->nama_produk }}
                                    </td>

                                    <td>
                                        {{ $product->kategori ?? '-' }}
                                    </td>

                                    <td>
                                        Rp {{ number_format($product->harga_modal, 0, ',', '.') }}
                                    </td>

                                    <td>
                                        Rp {{ number_format($product->harga_jual, 0, ',', '.') }}
                                    </td>

                                    <td>
                                        {{ $product->stok }}
                                    </td>

                                    <td>
                                        @if($product->tanggal_kedaluwarsa)
                                            {{ $product->tanggal_kedaluwarsa->format('d-m-Y') }}
                                        @else
                                            <span class="text-muted">
                                                Tidak ditentukan
                                            </span>
                                        @endif
                                    </td>

                                    <td>
                                        @if(!$product->tanggal_kedaluwarsa)
                                            <span class="badge bg-secondary">
                                                Tidak Ada Tanggal
                                            </span>
                                        @elseif($product->tanggal_kedaluwarsa->isPast())
                                            <span class="badge bg-danger">
                                                Kedaluwarsa
                                            </span>
                                        @elseif($product->tanggal_kedaluwarsa->lte(now()->addDays(7)))
                                            <span class="badge bg-warning text-dark">
                                                Hampir Kedaluwarsa
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

            </div>
        </div>

    @else

        <div class="card border-0 shadow-sm">
            <div class="card-body text-center py-5">
                <h4 class="fw-bold mb-2">Belum Ada Produk</h4>

                <p class="text-muted mb-4">
                    Belum ada produk yang terdaftar di dalam sistem.
                </p>

                <a href="{{ route('products.create') }}" class="btn btn-primary">
                    Tambah Produk
                </a>
            </div>
        </div>

    @endif

</div>
@endsection