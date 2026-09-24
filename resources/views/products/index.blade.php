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

    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body">
            <div class="position-relative">
                <i class="bi bi-search position-absolute top-50 translate-middle-y ms-3 text-muted"></i>

                <input
                    type="text"
                    id="productSearch"
                    class="form-control ps-5"
                    placeholder="Cari nama produk atau kategori..."
                    autocomplete="off"
                >
            </div>
        </div>
    </div>

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
                                <th>Aksi</th>
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
                                        <span class="fw-bold">
                                            {{ $product->stok }}
                                        </span>
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

                                    <td>
                                        <form
                                            action="{{ route('products.addStock', $product->id) }}"
                                            method="POST"
                                            class="d-flex align-items-center gap-2"
                                        >
                                            @csrf
                                            @method('PATCH')

                                            <input
                                                type="number"
                                                name="jumlah_stok"
                                                min="1"
                                                class="form-control form-control-sm"
                                                placeholder="Jumlah"
                                                style="width: 90px;"
                                                required
                                            >

                                            <button
                                                type="submit"
                                                class="btn btn-success btn-sm"
                                            >
                                                <i class="bi bi-plus-lg"></i>
                                                Stok
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div id="emptySearchResult" class="text-center py-4 d-none">
                    <i class="bi bi-search fs-2 text-muted d-block mb-2"></i>

                    <h5 class="fw-bold">
                        Produk Tidak Ditemukan
                    </h5>

                    <p class="text-muted mb-0">
                        Coba gunakan nama produk atau kategori lain.
                    </p>
                </div>

            </div>
        </div>

    @else

        <div class="card border-0 shadow-sm">
            <div class="card-body text-center py-5">
                <h4 class="fw-bold mb-2">
                    Belum Ada Produk
                </h4>

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

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const searchInput = document.getElementById('productSearch');
        const productRows = document.querySelectorAll('table tbody tr');
        const emptySearchResult = document.getElementById('emptySearchResult');

        if (!searchInput) {
            return;
        }

        searchInput.addEventListener('input', function () {
            const keyword = this.value.toLowerCase().trim();
            let visibleRows = 0;

            productRows.forEach(function (row) {
                const rowText = row.textContent.toLowerCase();

                if (rowText.includes(keyword)) {
                    row.style.display = '';
                    visibleRows++;
                } else {
                    row.style.display = 'none';
                }
            });

            if (emptySearchResult) {
                if (visibleRows === 0 && keyword !== '') {
                    emptySearchResult.classList.remove('d-none');
                } else {
                    emptySearchResult.classList.add('d-none');
                }
            }
        });
    });
</script>
@endsection