@extends('layouts.app')

@section('title', 'Tambah Produk')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-1">Tambah Produk</h2>
            <p class="text-muted mb-0">Tambahkan produk baru ke persediaan warung.</p>
        </div>

        <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">
            Kembali
        </a>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
            <form action="{{ route('products.store') }}" method="POST">
                @csrf

                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="nama_produk" class="form-label">Nama Produk</label>
                        <input
                            type="text"
                            name="nama_produk"
                            id="nama_produk"
                            class="form-control"
                            value="{{ old('nama_produk') }}"
                            placeholder="Contoh: Indomie Goreng"
                            required
                        >
                    </div>

                    <div class="col-md-6">
                        <label for="kategori" class="form-label">Kategori</label>
                        <select name="kategori" id="kategori" class="form-select">
                            <option value="">Pilih Kategori</option>
                            <option value="Makanan">Makanan</option>
                            <option value="Minuman">Minuman</option>
                            <option value="Sembako">Sembako</option>
                            <option value="Rokok">Rokok</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="harga_modal" class="form-label">Harga Modal</label>
                        <input
                            type="number"
                            name="harga_modal"
                            id="harga_modal"
                            class="form-control"
                            min="0"
                            required
                        >
                    </div>

                    <div class="col-md-6">
                        <label for="harga_jual" class="form-label">Harga Jual</label>
                        <input
                            type="number"
                            name="harga_jual"
                            id="harga_jual"
                            class="form-control"
                            min="0"
                            required
                        >
                    </div>

                    <div class="col-md-6">
                        <label for="stok" class="form-label">Stok Saat Ini</label>
                        <input
                            type="number"
                            name="stok"
                            id="stok"
                            class="form-control"
                            min="0"
                            required
                        >
                    </div>

                    <div class="col-md-6">
                        <label for="stok_minimum" class="form-label">Stok Minimum</label>
                        <input
                            type="number"
                            name="stok_minimum"
                            id="stok_minimum"
                            class="form-control"
                            value="5"
                            min="0"
                            required
                        >
                    </div>

                    <div class="col-md-6">
                        <label for="tanggal_kedaluwarsa" class="form-label">
                            Tanggal Kedaluwarsa
                        </label>
                        <input
                            type="date"
                            name="tanggal_kedaluwarsa"
                            id="tanggal_kedaluwarsa"
                            class="form-control"
                        >
                    </div>
                </div>

                <div class="d-flex justify-content-end gap-2 mt-4">
                    <a href="{{ route('products.index') }}" class="btn btn-light">
                        Batal
                    </a>

                    <button type="submit" class="btn btn-primary">
                        Simpan Produk
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection