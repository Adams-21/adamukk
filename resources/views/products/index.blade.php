@extends('layouts.app')

@section('title', 'Manajemen Produk')

@section('content')

<div class="products-page">

    <div class="products-container">

        {{-- HEADER --}}

        <div class="products-header">

            <div class="products-header-left">

                <div class="products-header-icon">
                    <i class="bi bi-box-seam"></i>
                </div>

                <div>

                    <span class="products-eyebrow">
                        INVENTORI WARUNG
                    </span>

                    <h1>
                        Manajemen Produk
                    </h1>

                    <p>
                        Kelola produk, stok, harga, dan tanggal kedaluwarsa warung.
                    </p>

                </div>

            </div>


            <a
                href="{{ route('products.create') }}"
                class="add-product-button"
            >

                <span class="add-product-icon">
                    <i class="bi bi-plus-lg"></i>
                </span>

                <span>
                    Tambah Produk
                </span>

            </a>

        </div>


        {{-- SUCCESS --}}

        @if(session('success'))

            <div class="success-message">

                <div class="success-icon">
                    <i class="bi bi-check-lg"></i>
                </div>

                <div class="success-content">

                    <strong>
                        Berhasil
                    </strong>

                    <span>
                        {{ session('success') }}
                    </span>

                </div>

                <button
                    type="button"
                    class="success-close"
                    onclick="this.parentElement.remove()"
                >
                    <i class="bi bi-x-lg"></i>
                </button>

            </div>

        @endif


        {{-- SEARCH --}}

        @if($products->count() > 0)

            <div class="search-card">

                <div class="search-icon">
                    <i class="bi bi-search"></i>
                </div>

                <div class="search-content">

                    <span>
                        CARI PRODUK
                    </span>

                    <input
                        type="text"
                        id="productSearch"
                        placeholder="Cari nama produk atau kategori..."
                        autocomplete="off"
                    >

                </div>

                <div class="search-badge">
                    <i class="bi bi-search"></i>
                    <span>Cari</span>
                </div>

            </div>


            {{-- SEARCH EMPTY --}}

            <div
                id="emptySearchResult"
                class="empty-search"
            >

                <div class="empty-search-icon">
                    <i class="bi bi-search"></i>
                </div>

                <strong>
                    Produk tidak ditemukan
                </strong>

                <span>
                    Coba gunakan nama produk atau kategori lain.
                </span>

            </div>


            {{-- DESKTOP --}}

            <div class="desktop-products">

                <div class="products-card">

                    <div class="products-card-header">

                        <div>

                            <span class="card-label">
                                INVENTORI
                            </span>

                            <h2>
                                Daftar Produk
                            </h2>

                        </div>

                        <div class="product-count">
                            {{ $products->count() }} Produk
                        </div>

                    </div>


                    <div class="table-wrapper">

                        <table class="products-table">

                            <thead>

                                <tr>

                                    <th class="number-column">
                                        #
                                    </th>

                                    <th>
                                        Produk
                                    </th>

                                    <th>
                                        Kategori
                                    </th>

                                    <th>
                                        Harga Modal
                                    </th>

                                    <th>
                                        Harga Jual
                                    </th>

                                    <th>
                                        Stok
                                    </th>

                                    <th>
                                        Kedaluwarsa
                                    </th>

                                    <th>
                                        Status
                                    </th>

                                    <th class="action-column">
                                        Aksi
                                    </th>

                                </tr>

                            </thead>


                            <tbody>

                                @foreach($products as $product)

                                    <tr class="product-item">

                                        <td class="product-number">
                                            {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                                        </td>


                                        {{-- PRODUK --}}

                                        <td>

                                            <div class="product-name">

                                                <div class="product-icon">
                                                    <i class="bi bi-box-seam"></i>
                                                </div>

                                                <div class="product-name-text">

                                                    <strong>
                                                        {{ $product->nama_produk }}
                                                    </strong>

                                                    <span>
                                                        ID #{{ $product->id }}
                                                    </span>

                                                </div>

                                            </div>

                                        </td>


                                        {{-- KATEGORI --}}

                                        <td>

                                            <span class="category-badge">
                                                {{ $product->kategori ?? 'Tanpa kategori' }}
                                            </span>

                                        </td>


                                        {{-- HARGA MODAL --}}

                                        <td>

                                            <span class="modal-price">
                                                Rp {{ number_format($product->harga_modal, 0, ',', '.') }}
                                            </span>

                                        </td>


                                        {{-- HARGA JUAL --}}

                                        <td>

                                            <span class="selling-price">
                                                Rp {{ number_format($product->harga_jual, 0, ',', '.') }}
                                            </span>

                                        </td>


                                        {{-- STOK --}}

                                        <td>

                                            <span class="stock-number">
                                                {{ $product->stok }}
                                            </span>

                                        </td>


                                        {{-- TANGGAL --}}

                                        <td>

                                            @if($product->tanggal_kedaluwarsa)

                                                <span class="expiry-date">

                                                    <i class="bi bi-calendar3"></i>

                                                    {{ $product->tanggal_kedaluwarsa->format('d M Y') }}

                                                </span>

                                            @else

                                                <span class="no-expiry">
                                                    Tidak ditentukan
                                                </span>

                                            @endif

                                        </td>


                                        {{-- STATUS --}}

                                        <td>

                                            @if(!$product->tanggal_kedaluwarsa)

                                                <span class="status status-neutral">

                                                    <i class="bi bi-dash-circle"></i>

                                                    Tidak Ada

                                                </span>

                                            @elseif($product->tanggal_kedaluwarsa->isPast())

                                                <span class="status status-danger">

                                                    <i class="bi bi-exclamation-circle-fill"></i>

                                                    Kedaluwarsa

                                                </span>

                                            @elseif($product->tanggal_kedaluwarsa->lte(now()->addDays(7)))

                                                <span class="status status-warning">

                                                    <i class="bi bi-clock-fill"></i>

                                                    Hampir Kedaluwarsa

                                                </span>

                                            @else

                                                <span class="status status-safe">

                                                    <i class="bi bi-check-circle-fill"></i>

                                                    Aman

                                                </span>

                                            @endif

                                        </td>


                                        {{-- AKSI --}}

                                        <td>

                                            <div class="product-actions">

                                                <a
                                                    href="{{ route('products.edit', $product->id) }}"
                                                    class="edit-button"
                                                    title="Edit produk"
                                                >
                                                    <i class="bi bi-pencil"></i>
                                                </a>


                                                <form
                                                    action="{{ route('products.addStock', $product->id) }}"
                                                    method="POST"
                                                    class="stock-form"
                                                >

                                                    @csrf

                                                    @method('PATCH')


                                                    <input
                                                        type="number"
                                                        name="jumlah_stok"
                                                        min="1"
                                                        placeholder="Qty"
                                                        required
                                                    >


                                                    <button
                                                        type="submit"
                                                        title="Tambah stok"
                                                    >
                                                        <i class="bi bi-plus-lg"></i>
                                                    </button>

                                                </form>

                                            </div>

                                        </td>

                                    </tr>

                                @endforeach

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>


            {{-- MOBILE --}}

            <div class="mobile-products">

                @foreach($products as $product)

                    <div class="mobile-product-card product-item">

                        <div class="mobile-product-top">

                            <div class="mobile-product-info">

                                <div class="mobile-product-icon">
                                    <i class="bi bi-box-seam"></i>
                                </div>

                                <div>

                                    <h3>
                                        {{ $product->nama_produk }}
                                    </h3>

                                    <span>
                                        {{ $product->kategori ?? 'Tanpa kategori' }}
                                    </span>

                                </div>

                            </div>


                            @if(!$product->tanggal_kedaluwarsa)

                                <span class="status status-neutral">
                                    <i class="bi bi-dash-circle"></i>
                                    Tidak Ada
                                </span>

                            @elseif($product->tanggal_kedaluwarsa->isPast())

                                <span class="status status-danger">
                                    <i class="bi bi-exclamation-circle-fill"></i>
                                    Kedaluwarsa
                                </span>

                            @elseif($product->tanggal_kedaluwarsa->lte(now()->addDays(7)))

                                <span class="status status-warning">
                                    <i class="bi bi-clock-fill"></i>
                                    Hampir Kedaluwarsa
                                </span>

                            @else

                                <span class="status status-safe">
                                    <i class="bi bi-check-circle-fill"></i>
                                    Aman
                                </span>

                            @endif

                        </div>


                        <div class="mobile-product-grid">

                            <div class="mobile-info">

                                <span>
                                    Harga Jual
                                </span>

                                <strong class="mobile-selling-price">
                                    Rp {{ number_format($product->harga_jual, 0, ',', '.') }}
                                </strong>

                            </div>


                            <div class="mobile-info">

                                <span>
                                    Stok
                                </span>

                                <strong>
                                    {{ $product->stok }}
                                </strong>

                            </div>


                            <div class="mobile-info">

                                <span>
                                    Harga Modal
                                </span>

                                <strong>
                                    Rp {{ number_format($product->harga_modal, 0, ',', '.') }}
                                </strong>

                            </div>


                            <div class="mobile-info">

                                <span>
                                    Kedaluwarsa
                                </span>

                                <strong>

                                    @if($product->tanggal_kedaluwarsa)

                                        {{ $product->tanggal_kedaluwarsa->format('d M Y') }}

                                    @else

                                        Tidak ada

                                    @endif

                                </strong>

                            </div>

                        </div>


                        <div class="mobile-actions">

                            <a
                                href="{{ route('products.edit', $product->id) }}"
                                class="mobile-edit-button"
                            >

                                <i class="bi bi-pencil-square"></i>

                                Edit Produk

                            </a>


                            <form
                                action="{{ route('products.addStock', $product->id) }}"
                                method="POST"
                                class="mobile-stock-form"
                            >

                                @csrf

                                @method('PATCH')


                                <div class="mobile-stock-input">

                                    <i class="bi bi-box-seam"></i>

                                    <input
                                        type="number"
                                        name="jumlah_stok"
                                        min="1"
                                        placeholder="Jumlah"
                                        required
                                    >

                                </div>


                                <button
                                    type="submit"
                                    class="mobile-stock-button"
                                    title="Tambah stok"
                                >

                                    <i class="bi bi-plus-lg"></i>

                                </button>

                            </form>

                        </div>

                    </div>

                @endforeach

            </div>


        @else

            {{-- EMPTY --}}

            <div class="no-products">

                <div class="no-products-icon">
                    <i class="bi bi-box-seam"></i>
                </div>

                <span class="no-products-label">
                    INVENTORI KOSONG
                </span>

                <h2>
                    Belum Ada Produk
                </h2>

                <p>
                    Tambahkan produk pertama untuk mulai mengelola
                    persediaan warung.
                </p>

                <a
                    href="{{ route('products.create') }}"
                    class="empty-add-button"
                >
                    <i class="bi bi-plus-lg"></i>
                    Tambah Produk
                </a>

            </div>

        @endif

    </div>

</div>


<style>

.products-page {
    width: 100%;
    min-height: calc(100vh - 70px);
    background: #f7f7f5;
    color: #151515;
}

.products-container {
    width: 100%;
    padding: 28px 20px 45px;
}


/* HEADER */

.products-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 20px;
    margin-bottom: 25px;
}

.products-header-left {
    display: flex;
    align-items: center;
    gap: 14px;
}

.products-header-icon {
    width: 51px;
    height: 51px;
    flex-shrink: 0;
    border-radius: 14px;
    background: #111111;
    color: #f5c400;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 21px;
}

.products-eyebrow {
    display: block;
    margin-bottom: 3px;
    color: #d90429;
    font-size: 9px;
    font-weight: 900;
    letter-spacing: 1.4px;
}

.products-header h1 {
    margin: 0;
    color: #111111;
    font-size: 27px;
    line-height: 1.15;
    font-weight: 900;
    letter-spacing: -.7px;
}

.products-header p {
    margin: 5px 0 0;
    color: #777777;
    font-size: 12px;
}


/* ADD BUTTON */

.add-product-button {
    height: 43px;
    padding: 0 15px;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    flex-shrink: 0;
    border-radius: 10px;
    background: #d90429;
    color: #ffffff;
    text-decoration: none;
    font-size: 11px;
    font-weight: 800;
    box-shadow: 0 6px 18px rgba(217,4,41,.18);
    transition: all .2s ease;
}

.add-product-button:hover {
    background: #b80322;
    color: #ffffff;
    transform: translateY(-1px);
}

.add-product-icon {
    width: 24px;
    height: 24px;
    border-radius: 7px;
    background: #111111;
    color: #f5c400;
    display: flex;
    align-items: center;
    justify-content: center;
}

.add-product-icon i {
    font-size: 11px;
}


/* SUCCESS */

.success-message {
    position: relative;
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 18px;
    padding: 11px 40px 11px 12px;
    border: 1px solid #e6cf65;
    border-radius: 11px;
    background: #fffbea;
}

.success-icon {
    width: 29px;
    height: 29px;
    flex-shrink: 0;
    border-radius: 8px;
    background: #111111;
    color: #f5c400;
    display: flex;
    align-items: center;
    justify-content: center;
}

.success-icon i {
    font-size: 12px;
}

.success-content {
    display: flex;
    flex-direction: column;
    gap: 1px;
}

.success-content strong {
    color: #222222;
    font-size: 11px;
    font-weight: 800;
}

.success-content span {
    color: #777777;
    font-size: 10px;
}

.success-close {
    position: absolute;
    right: 12px;
    top: 50%;
    transform: translateY(-50%);
    border: none;
    background: transparent;
    color: #888888;
    font-size: 10px;
}


/* SEARCH */

.search-card {
    display: flex;
    align-items: center;
    gap: 11px;
    margin-bottom: 18px;
    padding: 9px 10px;
    border: 1px solid #dedede;
    border-radius: 13px;
    background: #ffffff;
    box-shadow: 0 5px 20px rgba(0,0,0,.035);
    transition: all .2s ease;
}

.search-card:focus-within {
    border-color: #d90429;
    box-shadow: 0 6px 23px rgba(217,4,41,.07);
}

.search-icon {
    width: 38px;
    height: 38px;
    flex-shrink: 0;
    border-radius: 9px;
    background: #111111;
    color: #f5c400;
    display: flex;
    align-items: center;
    justify-content: center;
}

.search-icon i {
    font-size: 14px;
}

.search-content {
    flex: 1;
    min-width: 0;
}

.search-content span {
    display: block;
    margin-bottom: 1px;
    color: #d90429;
    font-size: 8px;
    font-weight: 900;
    letter-spacing: .8px;
}

.search-content input {
    width: 100%;
    padding: 0;
    border: none;
    outline: none;
    background: transparent;
    color: #222222;
    font-size: 12px;
}

.search-content input::placeholder {
    color: #b0b0b0;
}

.search-badge {
    display: flex;
    align-items: center;
    gap: 5px;
    padding: 5px 8px;
    border-radius: 7px;
    background: #f5f5f3;
    color: #888888;
    font-size: 9px;
}


/* PRODUCTS CARD */

.products-card {
    overflow: hidden;
    border: 1px solid #dedede;
    border-radius: 16px;
    background: #ffffff;
    box-shadow: 0 7px 28px rgba(0,0,0,.045);
}

.products-card-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 17px 19px;
    border-bottom: 1px solid #eeeeee;
}

.card-label {
    display: block;
    margin-bottom: 2px;
    color: #d90429;
    font-size: 8px;
    font-weight: 900;
    letter-spacing: 1px;
}

.products-card-header h2 {
    margin: 0;
    color: #111111;
    font-size: 14px;
    font-weight: 850;
}

.product-count {
    padding: 6px 9px;
    border-radius: 8px;
    background: #111111;
    color: #f5c400;
    font-size: 9px;
    font-weight: 800;
}


/* TABLE */

.table-wrapper {
    overflow-x: auto;
}

.products-table {
    width: 100%;
    border-collapse: collapse;
}

.products-table thead th {
    padding: 11px 12px;
    background: #fafafa;
    border-bottom: 1px solid #eeeeee;
    color: #777777;
    font-size: 8px;
    font-weight: 900;
    letter-spacing: .6px;
    text-transform: uppercase;
    white-space: nowrap;
}

.products-table tbody td {
    padding: 12px;
    border-bottom: 1px solid #f0f0f0;
    color: #666666;
    font-size: 10px;
    white-space: nowrap;
    vertical-align: middle;
}

.products-table tbody tr:last-child td {
    border-bottom: none;
}

.products-table tbody tr {
    transition: background .15s ease;
}

.products-table tbody tr:hover {
    background: #fffdf2;
}

.number-column {
    width: 42px;
}

.action-column {
    width: 145px;
    text-align: center;
}

.product-number {
    color: #aaaaaa !important;
    font-size: 9px !important;
    font-weight: 800;
}


/* PRODUCT NAME */

.product-name {
    display: flex;
    align-items: center;
    gap: 9px;
}

.product-icon {
    width: 33px;
    height: 33px;
    flex-shrink: 0;
    border-radius: 9px;
    background: #111111;
    color: #f5c400;
    display: flex;
    align-items: center;
    justify-content: center;
}

.product-icon i {
    font-size: 12px;
}

.product-name-text {
    display: flex;
    flex-direction: column;
    gap: 2px;
}

.product-name-text strong {
    display: block;
    max-width: 170px;
    overflow: hidden;
    text-overflow: ellipsis;
    color: #222222;
    font-size: 11px;
    font-weight: 800;
}

.product-name-text span {
    color: #aaaaaa;
    font-size: 8px;
}


/* CATEGORY */

.category-badge {
    display: inline-block;
    padding: 5px 8px;
    border-radius: 7px;
    background: #fffbea;
    color: #8a6b00;
    font-size: 8px;
    font-weight: 800;
    border: 1px solid #f1df83;
}


/* PRICES */

.modal-price {
    color: #777777;
    font-size: 10px;
}

.selling-price {
    color: #d90429;
    font-size: 10px;
    font-weight: 800;
}


/* STOCK */

.stock-number {
    display: inline-flex;
    min-width: 29px;
    justify-content: center;
    padding: 4px 7px;
    border-radius: 7px;
    background: #111111;
    color: #ffffff;
    font-size: 9px;
    font-weight: 800;
}


/* DATE */

.expiry-date {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    color: #666666;
    font-size: 9px;
}

.expiry-date i {
    color: #d90429;
}

.no-expiry {
    color: #aaaaaa;
    font-size: 9px;
}


/* STATUS */

.status {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    padding: 5px 8px;
    border-radius: 999px;
    font-size: 8px;
    font-weight: 800;
    white-space: nowrap;
}

.status i {
    font-size: 8px;
}

.status-safe {
    background: #f1f8dc;
    color: #5e7000;
}

.status-warning {
    background: #fff5cc;
    color: #947000;
}

.status-danger {
    background: #fff0f1;
    color: #c00024;
}

.status-neutral {
    background: #f1f1f1;
    color: #777777;
}


/* ACTION */

.product-actions {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 5px;
}

.edit-button {
    width: 33px;
    height: 33px;
    border-radius: 8px;
    background: #111111;
    color: #f5c400;
    display: flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    transition: all .18s ease;
}

.edit-button:hover {
    background: #d90429;
    color: #ffffff;
}

.edit-button i {
    font-size: 12px;
}

.stock-form {
    display: flex;
    gap: 4px;
}

.stock-form input {
    width: 52px;
    height: 33px;
    padding: 0 7px;
    border: 1px solid #dedede;
    border-radius: 8px;
    outline: none;
    color: #333333;
    font-size: 9px;
}

.stock-form input:focus {
    border-color: #f5c400;
    box-shadow: 0 0 0 2px rgba(245,196,0,.1);
}

.stock-form button {
    width: 33px;
    height: 33px;
    border: none;
    border-radius: 8px;
    background: #d90429;
    color: #ffffff;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all .18s ease;
}

.stock-form button:hover {
    background: #b80322;
}

.stock-form button i {
    font-size: 12px;
}


/* EMPTY SEARCH */

.empty-search {
    display: none;
    min-height: 190px;
    margin-bottom: 18px;
    border: 1px solid #dedede;
    border-radius: 15px;
    background: #ffffff;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    gap: 5px;
}

.empty-search.show {
    display: flex;
}

.empty-search-icon {
    width: 45px;
    height: 45px;
    margin-bottom: 5px;
    border-radius: 13px;
    background: #111111;
    color: #f5c400;
    display: flex;
    align-items: center;
    justify-content: center;
}

.empty-search-icon i {
    font-size: 17px;
}

.empty-search strong {
    color: #333333;
    font-size: 12px;
}

.empty-search span {
    color: #999999;
    font-size: 10px;
}


/* MOBILE */

.mobile-products {
    display: none;
}

.mobile-product-card {
    margin-bottom: 12px;
    padding: 14px;
    border: 1px solid #dedede;
    border-radius: 16px;
    background: #ffffff;
    box-shadow: 0 5px 20px rgba(0,0,0,.04);
}

.mobile-product-top {
    display: flex;
    align-items: flex-start;
    justify-content: space-between;
    gap: 9px;
    margin-bottom: 13px;
}

.mobile-product-info {
    display: flex;
    align-items: center;
    gap: 9px;
    min-width: 0;
}

.mobile-product-icon {
    width: 39px;
    height: 39px;
    flex-shrink: 0;
    border-radius: 10px;
    background: #111111;
    color: #f5c400;
    display: flex;
    align-items: center;
    justify-content: center;
}

.mobile-product-icon i {
    font-size: 14px;
}

.mobile-product-info h3 {
    max-width: 180px;
    margin: 0;
    color: #222222;
    font-size: 13px;
    line-height: 1.25;
    font-weight: 850;
    overflow-wrap: anywhere;
}

.mobile-product-info span {
    display: block;
    margin-top: 3px;
    color: #999999;
    font-size: 9px;
}

.mobile-product-top .status {
    font-size: 7px;
    padding: 5px 6px;
}


/* MOBILE GRID */

.mobile-product-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 7px;
    margin-bottom: 13px;
}

.mobile-info {
    padding: 9px 10px;
    border-radius: 9px;
    background: #f8f8f6;
    border-left: 3px solid #111111;
}

.mobile-info span {
    display: block;
    margin-bottom: 3px;
    color: #999999;
    font-size: 8px;
}

.mobile-info strong {
    display: block;
    color: #333333;
    font-size: 10px;
    font-weight: 800;
    overflow-wrap: anywhere;
}

.mobile-info .mobile-selling-price {
    color: #d90429;
}


/* MOBILE ACTIONS */

.mobile-actions {
    display: flex;
    gap: 7px;
    padding-top: 12px;
    border-top: 1px solid #eeeeee;
}

.mobile-edit-button {
    flex: 1;
    height: 39px;
    border-radius: 9px;
    background: #111111;
    color: #f5c400;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 6px;
    text-decoration: none;
    font-size: 10px;
    font-weight: 800;
}

.mobile-edit-button:hover {
    background: #d90429;
    color: #ffffff;
}

.mobile-stock-form {
    display: flex;
    gap: 5px;
    width: 48%;
}

.mobile-stock-input {
    flex: 1;
    min-width: 0;
    height: 39px;
    display: flex;
    align-items: center;
    gap: 6px;
    padding: 0 8px;
    border: 1px solid #dedede;
    border-radius: 9px;
    background: #ffffff;
}

.mobile-stock-input i {
    flex-shrink: 0;
    color: #d90429;
    font-size: 11px;
}

.mobile-stock-input input {
    width: 100%;
    min-width: 0;
    height: 100%;
    padding: 0;
    border: none;
    outline: none;
    background: transparent;
    color: #333333;
    font-size: 10px;
}

.mobile-stock-button {
    width: 39px;
    min-width: 39px;
    height: 39px;
    border: none;
    border-radius: 9px;
    background: #d90429;
    color: #ffffff;
    display: flex;
    align-items: center;
    justify-content: center;
}

.mobile-stock-button i {
    font-size: 14px;
}


/* NO PRODUCTS */

.no-products {
    padding: 65px 20px;
    border: 1px solid #dedede;
    border-radius: 17px;
    background: #ffffff;
    text-align: center;
    box-shadow: 0 7px 28px rgba(0,0,0,.04);
}

.no-products-icon {
    width: 61px;
    height: 61px;
    margin: 0 auto 13px;
    border-radius: 17px;
    background: #111111;
    color: #f5c400;
    display: flex;
    align-items: center;
    justify-content: center;
}

.no-products-icon i {
    font-size: 24px;
}

.no-products-label {
    display: block;
    margin-bottom: 4px;
    color: #d90429;
    font-size: 8px;
    font-weight: 900;
    letter-spacing: 1px;
}

.no-products h2 {
    margin: 0 0 6px;
    color: #222222;
    font-size: 18px;
    font-weight: 850;
}

.no-products p {
    max-width: 400px;
    margin: 0 auto 20px;
    color: #999999;
    font-size: 11px;
}

.empty-add-button {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    height: 40px;
    padding: 0 14px;
    border-radius: 9px;
    background: #d90429;
    color: #ffffff;
    text-decoration: none;
    font-size: 10px;
    font-weight: 800;
}

.empty-add-button:hover {
    background: #b80322;
    color: #ffffff;
}


/* TABLET */

@media (max-width: 1100px) {

    .products-container {
        padding-left: 15px;
        padding-right: 15px;
    }

    .products-table thead th,
    .products-table tbody td {
        padding-left: 9px;
        padding-right: 9px;
    }

    .product-name-text strong {
        max-width: 120px;
    }

}


/* MOBILE */

@media (max-width: 767px) {

    .products-page {
        min-height: calc(100vh - 60px);
    }

    .products-container {
        padding: 19px 12px 35px;
    }

    .products-header {
        align-items: stretch;
        flex-direction: column;
        gap: 13px;
        margin-bottom: 19px;
    }

    .products-header-left {
        gap: 10px;
    }

    .products-header-icon {
        width: 43px;
        height: 43px;
        border-radius: 11px;
        font-size: 17px;
    }

    .products-eyebrow {
        font-size: 8px;
        letter-spacing: 1.1px;
    }

    .products-header h1 {
        font-size: 21px;
        letter-spacing: -.4px;
    }

    .products-header p {
        margin-top: 3px;
        font-size: 9px;
        line-height: 1.4;
    }

    .add-product-button {
        align-self: flex-end;
        height: 37px;
        padding: 0 11px;
        border-radius: 9px;
        font-size: 10px;
    }

    .add-product-icon {
        width: 20px;
        height: 20px;
        border-radius: 6px;
    }

    .add-product-icon i {
        font-size: 9px;
    }

    .search-card {
        padding: 8px;
        gap: 8px;
        border-radius: 11px;
    }

    .search-icon {
        width: 34px;
        height: 34px;
    }

    .search-content span {
        font-size: 7px;
    }

    .search-content input {
        font-size: 10px;
    }

    .search-content input::placeholder {
        font-size: 9px;
    }

    .search-badge {
        display: none;
    }

    .desktop-products {
        display: none;
    }

    .mobile-products {
        display: block;
    }

    .success-message {
        padding: 9px 36px 9px 9px;
    }

    .success-icon {
        width: 27px;
        height: 27px;
    }

    .success-content strong,
    .success-content span {
        font-size: 9px;
    }

}


/* SMALL PHONE */

@media (max-width: 380px) {

    .products-container {
        padding-left: 10px;
        padding-right: 10px;
    }

    .products-header h1 {
        font-size: 19px;
    }

    .products-header p {
        font-size: 8px;
    }

    .add-product-button {
        height: 35px;
        font-size: 9px;
    }

    .mobile-product-top {
        flex-direction: column;
    }

    .mobile-product-top > .status {
        align-self: flex-start;
    }

    .mobile-product-grid {
        gap: 5px;
    }

    .mobile-actions {
        flex-direction: column;
    }

    .mobile-stock-form {
        width: 100%;
    }

}

</style>


<script>

document.addEventListener('DOMContentLoaded', function () {

    const searchInput =
        document.getElementById('productSearch');

    const productItems =
        document.querySelectorAll('.product-item');

    const emptySearchResult =
        document.getElementById('emptySearchResult');


    if (!searchInput) {
        return;
    }


    searchInput.addEventListener('input', function () {

        const keyword =
            this.value.toLowerCase().trim();

        let visibleItems = 0;


        productItems.forEach(function (item) {

            const text =
                item.textContent.toLowerCase();


            if (text.includes(keyword)) {

                item.style.display = '';

                visibleItems++;

            } else {

                item.style.display = 'none';

            }

        });


        if (emptySearchResult) {

            if (visibleItems === 0 && keyword !== '') {

                emptySearchResult.classList.add('show');

            } else {

                emptySearchResult.classList.remove('show');

            }

        }

    });

});

</script>

@endsection