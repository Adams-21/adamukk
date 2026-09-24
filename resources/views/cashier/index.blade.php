@extends('layouts.app')

@section('title', 'Kasir')

@section('content')

<style>
    :root {
        --grad-main-start: #0f9d78;
        --grad-main-end: #0c7d5f;
        --grad-success-start: #d97706;
        --grad-success-end: #b45f04;
        --soft-teal: #eafaf4;
        --soft-teal-line: #cdeee1;
        --soft-amber: #fef3e2;
        --soft-amber-line: #f6ddb0;
        --ink: #1a1d29;
        --ink-soft: #5b6072;
        --muted: #8a90a0;
        --line: #e6e8ee;
    }

    .kasir-icon-badge {
        width: 46px;
        height: 46px;
        border-radius: 12px;
        background: linear-gradient(135deg, var(--grad-main-start), var(--grad-main-end));
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 4px 14px rgba(15, 157, 120, 0.25);
        flex-shrink: 0;
    }

    .kasir-card {
        border: 1px solid var(--line);
        border-radius: 14px;
        background: #fff;
        box-shadow: 0 2px 10px rgba(20, 20, 30, 0.04);
    }

    .kasir-section-title {
        color: var(--ink);
        font-weight: 800;
        letter-spacing: -0.3px;
    }

    .kasir-section-sub {
        color: var(--muted);
        font-size: 13px;
    }

    #searchProduct {
        border-radius: 10px 0 0 10px !important;
    }

    .input-group-text {
        background: var(--soft-teal);
        border-color: #d9cdbd00;
        border: 1px solid #dfe3ea;
        color: var(--grad-main-end);
        border-radius: 10px 0 0 10px;
    }

    #searchResults .list-group-item {
        border-color: var(--line);
        transition: background 0.15s ease;
    }

    #searchResults .list-group-item:hover {
        background: var(--soft-teal);
    }

    #selectedProductBox {
        background: var(--soft-teal);
        border: 1px solid var(--soft-teal-line);
        border-radius: 12px;
        color: var(--ink);
    }

    #selectedProductBox strong {
        color: var(--grad-main-end);
    }

    .btn-kasir-primary {
        border: none;
        border-radius: 10px;
        background: linear-gradient(135deg, var(--grad-main-start), var(--grad-main-end));
        color: #fff;
        font-weight: 700;
        box-shadow: 0 4px 14px rgba(15, 157, 120, 0.22);
        transition: transform 0.12s ease, box-shadow 0.12s ease;
    }

    .btn-kasir-primary:hover {
        transform: translateY(-1px);
        box-shadow: 0 6px 18px rgba(15, 157, 120, 0.3);
        color: #fff;
    }

    .btn-kasir-primary:active {
        transform: translateY(0);
    }

    .info-note {
        background: var(--soft-teal);
        border: 1px solid var(--soft-teal-line);
        border-radius: 12px;
        color: #0c7d5f;
        font-size: 13px;
    }

    .cart-badge-count {
        background: var(--soft-teal);
        color: var(--grad-main-end);
        font-weight: 700;
        border-radius: 100px;
        padding: 6px 14px;
        font-size: 12.5px;
    }

    .kasir-table thead th {
        background: #f7f8fa;
        color: var(--ink-soft);
        font-size: 10.5px;
        letter-spacing: 0.5px;
        text-transform: uppercase;
        font-weight: 800;
        border-bottom: 1px solid var(--line);
    }

    .kasir-table tbody td {
        border-color: #f0f1f5;
        vertical-align: middle;
    }

    .kasir-table tbody tr:hover {
        background: #fafbfc;
    }

    .qty-input-cart {
        border-radius: 8px;
    }

    .btn-remove-item {
        border-radius: 8px;
        border: 1px solid #f3d4d2;
        color: #c0392b;
        background: #fdf1f0;
        transition: 0.15s ease;
    }

    .btn-remove-item:hover {
        background: #f9dedb;
        color: #a3281c;
    }

    .total-box {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .total-amount {
        font-weight: 800;
        font-size: 24px;
        background: linear-gradient(135deg, var(--grad-main-start), var(--grad-main-end));
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
    }

    .change-box {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background: var(--soft-amber);
        border: 1px solid var(--soft-amber-line);
        border-radius: 12px;
        padding: 16px;
    }

    .change-amount {
        font-weight: 800;
        color: var(--grad-success-end);
        font-size: 18px;
    }

    .btn-finish-transaction {
        border: none;
        border-radius: 10px;
        background: linear-gradient(135deg, #16a06e, #0d8a5c);
        color: #fff;
        font-weight: 700;
        box-shadow: 0 4px 14px rgba(13, 138, 92, 0.25);
        transition: transform 0.12s ease, box-shadow 0.12s ease;
    }

    .btn-finish-transaction:hover {
        transform: translateY(-1px);
        box-shadow: 0 6px 20px rgba(13, 138, 92, 0.32);
        color: #fff;
    }

    .btn-outline-nav {
        border-radius: 10px;
        border: 1px solid var(--line);
        color: var(--ink-soft);
        font-weight: 600;
        background: #fff;
    }

    .btn-outline-nav:hover {
        background: #f7f8fa;
        color: var(--ink);
    }
</style>

<div class="container-fluid py-4">

    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">
        <div>
            <h2 class="fw-bold mb-1" style="letter-spacing:-0.5px;">Kasir</h2>
            <p class="text-muted mb-0">
                Cari produk, masukkan jumlah, lalu selesaikan transaksi.
            </p>
        </div>

        <a href="{{ route('products.index') }}" class="btn btn-outline-nav">
            <i class="bi bi-box-seam me-2"></i>
            Manajemen Produk
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-2"></i>
            {{ session('success') }}

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert">
            </button>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row g-4">

        <div class="col-lg-5">
            <div class="kasir-card h-100">
                <div class="card-body p-4">

                    <div class="d-flex align-items-center mb-4">
                        <div class="kasir-icon-badge me-3">
                            <i class="bi bi-search fs-5"></i>
                        </div>

                        <div>
                            <h5 class="kasir-section-title mb-1">Cari Produk</h5>
                            <p class="kasir-section-sub mb-0">
                                Ketik nama produk untuk mencari.
                            </p>
                        </div>
                    </div>

                    <div class="mb-3 position-relative">
                        <label for="searchProduct" class="form-label fw-semibold">
                            Nama Produk
                        </label>

                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-search"></i>
                            </span>

                            <input
                                type="text"
                                id="searchProduct"
                                class="form-control"
                                placeholder="Ketik nama produk..."
                                autocomplete="off">
                        </div>

                        <div
                            id="searchResults"
                            class="list-group mt-2 shadow-sm">
                        </div>
                    </div>

                    <div
                        id="selectedProductBox"
                        class="alert d-none">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <small class="d-block text-muted">
                                    Produk dipilih
                                </small>

                                <strong id="selectedProductName"></strong>

                                <div
                                    class="small mt-1"
                                    id="selectedProductInfo">
                                </div>
                            </div>

                            <button
                                type="button"
                                class="btn-close"
                                onclick="clearSelectedProduct()">
                            </button>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="quantityInput" class="form-label fw-semibold">
                            Jumlah
                        </label>

                        <input
                            type="number"
                            id="quantityInput"
                            class="form-control"
                            min="1"
                            value="1">
                    </div>

                    <div class="d-grid">
                        <button
                            type="button"
                            class="btn btn-kasir-primary py-2"
                            onclick="addToCart()">
                            <i class="bi bi-cart-plus me-2"></i>
                            Tambah ke Keranjang
                        </button>
                    </div>

                    <div class="info-note mt-4 mb-0 p-3">
                        <i class="bi bi-info-circle me-2"></i>
                        Stok akan berkurang otomatis setelah transaksi berhasil.
                    </div>

                </div>
            </div>
        </div>

        <div class="col-lg-7">
            <div class="kasir-card">
                <div class="card-body p-4">

                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div>
                            <h5 class="kasir-section-title mb-1">Keranjang Belanja</h5>
                            <p class="kasir-section-sub mb-0">
                                Produk yang akan dibeli.
                            </p>
                        </div>

                        <span class="cart-badge-count" id="cartCount">
                            0 Produk
                        </span>
                    </div>

                    <div class="table-responsive">
                        <table class="table align-middle kasir-table">
                            <thead>
                                <tr>
                                    <th>Produk</th>
                                    <th class="text-center">Harga</th>
                                    <th class="text-center">Jumlah</th>
                                    <th class="text-end">Subtotal</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>

                            <tbody id="cartBody">
                                <tr>
                                    <td colspan="5" class="text-center text-muted py-4">
                                        Keranjang masih kosong.
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="border-top pt-4 mt-3">

                        <div class="total-box mb-3">
                            <span class="fw-semibold">
                                Total Belanja
                            </span>

                            <span class="total-amount" id="totalDisplay">
                                Rp 0
                            </span>
                        </div>

                        <div class="mb-3">
                            <label for="paymentInput" class="form-label fw-semibold">
                                Uang Dibayar
                            </label>

                            <input
                                type="number"
                                id="paymentInput"
                                class="form-control form-control-lg"
                                min="0"
                                placeholder="Masukkan uang pembayaran"
                                oninput="calculateChange()">
                        </div>

                        <div class="change-box mb-4">
                            <span class="fw-semibold" style="color:#8a5a06;">
                                Kembalian
                            </span>

                            <span class="change-amount" id="changeDisplay">
                                Rp 0
                            </span>
                        </div>

                        <form
                            id="paymentForm"
                            action="{{ route('cashier.store') }}"
                            method="POST">

                            @csrf

                            <input
                                type="hidden"
                                name="items"
                                id="itemsInput">

                            <input
                                type="hidden"
                                name="uang_dibayar"
                                id="hiddenPayment">

                            <button
                                type="button"
                                class="btn btn-finish-transaction btn-lg w-100"
                                onclick="finishTransaction()">
                                <i class="bi bi-check-circle me-2"></i>
                                Selesaikan Transaksi
                            </button>
                        </form>

                    </div>

                </div>
            </div>
        </div>

    </div>

</div>

<script>
    const products = @json($products);

    let cart = [];
    let selectedProduct = null;

    const searchProduct = document.getElementById('searchProduct');
    const searchResults = document.getElementById('searchResults');

    searchProduct.addEventListener('input', function () {
        const keyword = this.value.trim().toLowerCase();

        searchResults.innerHTML = '';

        if (keyword.length === 0) {
            return;
        }

        const results = products.filter(function (product) {
            return product.nama_produk.toLowerCase().includes(keyword);
        });

        if (results.length === 0) {
            searchResults.innerHTML = `
                <div class="list-group-item text-muted">
                    Produk tidak ditemukan.
                </div>
            `;

            return;
        }

        results.forEach(function (product) {
            const button = document.createElement('button');

            button.type = 'button';
            button.className = 'list-group-item list-group-item-action';

            button.innerHTML = `
                <div class="d-flex justify-content-between align-items-center">
                    <div class="text-start">
                        <div class="fw-semibold">
                            ${product.nama_produk}
                        </div>

                        <small class="text-muted">
                            Rp ${Number(product.harga_jual).toLocaleString('id-ID')}
                        </small>
                    </div>

                    <span class="badge bg-secondary">
                        Stok ${product.stok}
                    </span>
                </div>
            `;

            button.addEventListener('click', function () {
                selectProduct(product);
            });

            searchResults.appendChild(button);
        });
    });

    function selectProduct(product) {
        selectedProduct = product;

        document.getElementById('selectedProductName').textContent =
            product.nama_produk;

        document.getElementById('selectedProductInfo').textContent =
            'Harga: Rp ' +
            Number(product.harga_jual).toLocaleString('id-ID') +
            ' | Stok: ' +
            product.stok;

        document
            .getElementById('selectedProductBox')
            .classList.remove('d-none');

        searchProduct.value = product.nama_produk;
        searchResults.innerHTML = '';
    }

    function clearSelectedProduct() {
        selectedProduct = null;

        searchProduct.value = '';

        document
            .getElementById('selectedProductBox')
            .classList.add('d-none');

        document.getElementById('quantityInput').value = 1;
        searchProduct.focus();
    }

    function addToCart() {
        if (!selectedProduct) {
            alert('Cari dan pilih produk terlebih dahulu.');
            searchProduct.focus();
            return;
        }

        const quantity = Number(
            document.getElementById('quantityInput').value
        );

        if (!quantity || quantity < 1) {
            alert('Jumlah produk minimal 1.');
            return;
        }

        const existingProduct = cart.find(function (item) {
            return item.id === selectedProduct.id;
        });

        const currentQuantity = existingProduct
            ? existingProduct.quantity
            : 0;

        if (currentQuantity + quantity > selectedProduct.stok) {
            alert('Jumlah melebihi stok produk yang tersedia.');
            return;
        }

        if (existingProduct) {
            existingProduct.quantity += quantity;
        } else {
            cart.push({
                id: selectedProduct.id,
                name: selectedProduct.nama_produk,
                price: Number(selectedProduct.harga_jual),
                stock: selectedProduct.stok,
                quantity: quantity
            });
        }

        renderCart();
        clearSelectedProduct();
    }

    function removeFromCart(productId) {
        cart = cart.filter(function (item) {
            return item.id !== productId;
        });

        renderCart();
    }

    function changeQuantity(productId, newQuantity) {
        const item = cart.find(function (product) {
            return product.id === productId;
        });

        if (!item) {
            return;
        }

        newQuantity = Number(newQuantity);

        if (!newQuantity || newQuantity < 1) {
            removeFromCart(productId);
            return;
        }

        if (newQuantity > item.stock) {
            alert('Jumlah melebihi stok yang tersedia.');
            renderCart();
            return;
        }

        item.quantity = newQuantity;

        renderCart();
    }

    function renderCart() {
        const cartBody = document.getElementById('cartBody');
        const cartCount = document.getElementById('cartCount');
        const totalDisplay = document.getElementById('totalDisplay');

        if (cart.length === 0) {
            cartBody.innerHTML = `
                <tr>
                    <td colspan="5" class="text-center text-muted py-4">
                        Keranjang masih kosong.
                    </td>
                </tr>
            `;

            cartCount.textContent = '0 Produk';
            totalDisplay.textContent = 'Rp 0';

            calculateChange();
            return;
        }

        let total = 0;
        let totalQuantity = 0;

        cartBody.innerHTML = '';

        cart.forEach(function (item) {
            const subtotal = item.price * item.quantity;

            total += subtotal;
            totalQuantity += item.quantity;

            cartBody.innerHTML += `
                <tr>
                    <td>
                        <div class="fw-semibold">${item.name}</div>
                        <small class="text-muted">
                            Stok: ${item.stock}
                        </small>
                    </td>

                    <td class="text-center">
                        Rp ${item.price.toLocaleString('id-ID')}
                    </td>

                    <td style="width: 110px;">
                        <input
                            type="number"
                            class="form-control form-control-sm text-center qty-input-cart"
                            min="1"
                            max="${item.stock}"
                            value="${item.quantity}"
                            onchange="changeQuantity(${item.id}, this.value)">
                    </td>

                    <td class="text-end fw-semibold">
                        Rp ${subtotal.toLocaleString('id-ID')}
                    </td>

                    <td class="text-center">
                        <button
                            type="button"
                            class="btn btn-sm btn-remove-item"
                            onclick="removeFromCart(${item.id})">
                            <i class="bi bi-trash"></i>
                        </button>
                    </td>
                </tr>
            `;
        });

        cartCount.textContent = totalQuantity + ' Produk';
        totalDisplay.textContent = 'Rp ' + total.toLocaleString('id-ID');

        calculateChange();
    }

    function getTotal() {
        return cart.reduce(function (total, item) {
            return total + (item.price * item.quantity);
        }, 0);
    }

    function calculateChange() {
        const payment = Number(
            document.getElementById('paymentInput').value
        ) || 0;

        const total = getTotal();
        const change = payment - total;

        document.getElementById('changeDisplay').textContent =
            'Rp ' + (change > 0 ? change : 0).toLocaleString('id-ID');
    }

    function finishTransaction() {
        if (cart.length === 0) {
            alert('Keranjang masih kosong.');
            return;
        }

        const payment = Number(
            document.getElementById('paymentInput').value
        ) || 0;

        const total = getTotal();

        if (payment <= 0) {
            alert('Masukkan uang pembayaran terlebih dahulu.');
            return;
        }

        if (payment < total) {
            alert('Uang pembayaran tidak mencukupi.');
            return;
        }

        const items = cart.map(function (item) {
            return {
                product_id: item.id,
                jumlah: item.quantity
            };
        });

        document.getElementById('itemsInput').value =
            JSON.stringify(items);

        document.getElementById('hiddenPayment').value = payment;

        document.getElementById('paymentForm').submit();
    }
</script>

@endsection