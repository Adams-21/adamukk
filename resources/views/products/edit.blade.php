@extends('layouts.app')

@section('title', 'Edit Produk')

@section('content')

<div class="container-fluid py-4">

    <div class="mb-4">
        <a href="{{ route('products.index') }}" class="text-decoration-none text-muted">
            <i class="bi bi-arrow-left"></i>
            Kembali ke Produk
        </a>

        <h1 class="fw-bold mt-3 mb-1">Edit Produk</h1>

        <p class="text-muted mb-0">
            Perbarui informasi produk dan tanggal kedaluwarsa.
        </p>
    </div>

    @if($errors->any())
        <div class="alert alert-danger">
            <div class="fw-bold mb-2">
                Ada data yang perlu diperbaiki:
            </div>

            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card border-0 shadow-sm">

        <div class="card-body p-4">

            <form
                action="{{ route('products.update', $product->id) }}"
                method="POST"
            >
                @csrf
                @method('PUT')

                <div class="row g-4">

                    <div class="col-md-6">

                        <label class="form-label fw-semibold">
                            Nama Produk
                        </label>

                        <input
                            type="text"
                            name="nama_produk"
                            class="form-control"
                            value="{{ old('nama_produk', $product->nama_produk) }}"
                            required
                        >

                    </div>

                    <div class="col-md-6">

                        <label class="form-label fw-semibold">
                            Kategori
                        </label>

                        <input
                            type="text"
                            name="kategori"
                            class="form-control"
                            value="{{ old('kategori', $product->kategori) }}"
                        >

                    </div>

                    <div class="col-md-6">

                        <label class="form-label fw-semibold">
                            Harga Modal
                        </label>

                        <div class="input-group">

                            <span class="input-group-text">
                                Rp
                            </span>

                            <input
                                type="number"
                                name="harga_modal"
                                class="form-control"
                                min="0"
                                step="0.01"
                                value="{{ old('harga_modal', $product->harga_modal) }}"
                                required
                            >

                        </div>

                    </div>

                    <div class="col-md-6">

                        <label class="form-label fw-semibold">
                            Harga Jual
                        </label>

                        <div class="input-group">

                            <span class="input-group-text">
                                Rp
                            </span>

                            <input
                                type="number"
                                name="harga_jual"
                                class="form-control"
                                min="0"
                                step="0.01"
                                value="{{ old('harga_jual', $product->harga_jual) }}"
                                required
                            >

                        </div>

                    </div>

                    <div class="col-md-6">

                        <label class="form-label fw-semibold">
                            Stok
                        </label>

                        <input
                            type="number"
                            name="stok"
                            class="form-control"
                            min="0"
                            value="{{ old('stok', $product->stok) }}"
                            required
                        >

                    </div>

                    <div class="col-md-6">

                        <label class="form-label fw-semibold">
                            Stok Minimum
                        </label>

                        <input
                            type="number"
                            name="stok_minimum"
                            class="form-control"
                            min="0"
                            value="{{ old('stok_minimum', $product->stok_minimum) }}"
                            required
                        >

                    </div>

                    <div class="col-md-6">

                        <label class="form-label fw-semibold">
                            Tanggal Kedaluwarsa
                        </label>

                        <input
                            type="date"
                            name="tanggal_kedaluwarsa"
                            class="form-control"
                            value="{{ old('tanggal_kedaluwarsa', $product->tanggal_kedaluwarsa ? $product->tanggal_kedaluwarsa->format('Y-m-d') : '') }}"
                        >

                        <div class="form-text">
                            Kosongkan jika produk tidak memiliki tanggal kedaluwarsa.
                        </div>

                    </div>

                </div>

                <div class="d-flex flex-column flex-sm-row gap-2 mt-4">

                    <a
                        href="{{ route('products.index') }}"
                        class="btn btn-light border px-4"
                    >
                        Batal
                    </a>

                    <button
                        type="submit"
                        class="btn btn-primary px-4"
                    >
                        <i class="bi bi-check-lg me-1"></i>
                        Simpan Perubahan
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection