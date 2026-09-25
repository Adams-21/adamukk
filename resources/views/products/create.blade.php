@extends('layouts.app')

@section('title', 'Tambah Produk')

@section('content')

<div class="create-product-page">

    <div class="create-product-container">

        <div class="create-product-header">

            <a
                href="{{ route('products.index') }}"
                class="back-button"
            >
                <i class="bi bi-arrow-left"></i>
            </a>

            <div>

                <span class="header-eyebrow">
                    INVENTORI WARUNG
                </span>

                <h1>
                    Tambah Produk
                </h1>

                <p>
                    Tambahkan produk baru ke persediaan warung.
                </p>

            </div>

        </div>


        @if ($errors->any())

            <div class="form-error-box">

                <div class="form-error-icon">
                    <i class="bi bi-exclamation-triangle-fill"></i>
                </div>

                <div>

                    <strong>
                        Ada data yang perlu diperbaiki
                    </strong>

                    <ul>

                        @foreach ($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            </div>

        @endif


        <div class="form-card">

            <div class="form-card-top-line"></div>


            <div class="form-card-header">

                <div class="form-section-icon">
                    <i class="bi bi-box-seam"></i>
                </div>

                <div>

                    <span class="section-label">
                        DATA PRODUK
                    </span>

                    <h2>
                        Informasi Produk
                    </h2>

                    <p>
                        Lengkapi informasi produk yang ingin ditambahkan.
                    </p>

                </div>

            </div>


            <form
                action="{{ route('products.store') }}"
                method="POST"
                id="productForm"
            >

                @csrf


                <div class="form-body">


                    {{-- NAMA PRODUK --}}

                    <div class="form-group full-width">

                        <label for="nama_produk">
                            Nama Produk
                        </label>

                        <div class="input-wrapper">

                            <i class="bi bi-tag"></i>

                            <input
                                type="text"
                                name="nama_produk"
                                id="nama_produk"
                                value="{{ old('nama_produk') }}"
                                placeholder="Contoh: Indomie Goreng"
                                required
                            >

                        </div>

                    </div>


                    {{-- KATEGORI --}}

                    <div class="form-group full-width">

                        <label for="kategori">
                            Kategori
                        </label>

                        <div class="input-wrapper select-wrapper">

                            <i class="bi bi-grid"></i>

                            <select
                                name="kategori"
                                id="kategori"
                                required
                            >

                                <option
                                    value=""
                                    disabled
                                    {{ old('kategori') ? '' : 'selected' }}
                                >
                                    Pilih Kategori
                                </option>

                                <option
                                    value="Makanan"
                                    {{ old('kategori') == 'Makanan' ? 'selected' : '' }}
                                >
                                    Makanan
                                </option>

                                <option
                                    value="Minuman"
                                    {{ old('kategori') == 'Minuman' ? 'selected' : '' }}
                                >
                                    Minuman
                                </option>

                                <option
                                    value="Sembako"
                                    {{ old('kategori') == 'Sembako' ? 'selected' : '' }}
                                >
                                    Sembako
                                </option>

                                <option
                                    value="Rokok"
                                    {{ old('kategori') == 'Rokok' ? 'selected' : '' }}
                                >
                                    Rokok
                                </option>

                                <option
                                    value="Lainnya"
                                    {{ old('kategori') == 'Lainnya' ? 'selected' : '' }}
                                >
                                    Lainnya
                                </option>

                            </select>

                            <i class="bi bi-chevron-down select-arrow"></i>

                        </div>


                        <div
                            id="kategoriCustomWrapper"
                            class="custom-category-box"
                        >

                            <div class="custom-category-heading">

                                <div class="custom-category-icon">
                                    <i class="bi bi-pencil"></i>
                                </div>

                                <div>

                                    <strong>
                                        Kategori lainnya
                                    </strong>

                                    <span>
                                        Tulis kategori sesuai produk
                                    </span>

                                </div>

                            </div>


                            <div class="input-wrapper custom-input-wrapper">

                                <i class="bi bi-pencil-square"></i>

                                <input
                                    type="text"
                                    id="kategori_custom"
                                    placeholder="Contoh: Sabun, Sampo, Alat Tulis"
                                    value="{{ old('kategori_custom') }}"
                                    autocomplete="off"
                                >

                            </div>

                        </div>

                    </div>


                    {{-- HARGA --}}

                    <div class="form-row">

                        <div class="form-group">

                            <label for="harga_modal">
                                Harga Modal
                            </label>

                            <div class="input-wrapper">

                                <span class="currency-prefix">
                                    Rp
                                </span>

                                <input
                                    type="number"
                                    name="harga_modal"
                                    id="harga_modal"
                                    value="{{ old('harga_modal') }}"
                                    placeholder="0"
                                    min="0"
                                    required
                                >

                            </div>

                        </div>


                        <div class="form-group">

                            <label for="harga_jual">
                                Harga Jual
                            </label>

                            <div class="input-wrapper">

                                <span class="currency-prefix">
                                    Rp
                                </span>

                                <input
                                    type="number"
                                    name="harga_jual"
                                    id="harga_jual"
                                    value="{{ old('harga_jual') }}"
                                    placeholder="0"
                                    min="0"
                                    required
                                >

                            </div>

                        </div>

                    </div>


                    {{-- STOK --}}

                    <div class="form-row">

                        <div class="form-group">

                            <label for="stok">
                                Stok Saat Ini
                            </label>

                            <div class="input-wrapper">

                                <i class="bi bi-boxes"></i>

                                <input
                                    type="number"
                                    name="stok"
                                    id="stok"
                                    value="{{ old('stok') }}"
                                    placeholder="0"
                                    min="0"
                                    required
                                >

                            </div>

                        </div>


                        <div class="form-group">

                            <label for="stok_minimum">
                                Stok Minimum
                            </label>

                            <div class="input-wrapper">

                                <i class="bi bi-bar-chart"></i>

                                <input
                                    type="number"
                                    name="stok_minimum"
                                    id="stok_minimum"
                                    value="{{ old('stok_minimum', 5) }}"
                                    placeholder="5"
                                    min="0"
                                    required
                                >

                            </div>

                        </div>

                    </div>


                    {{-- KEDALUWARSA --}}

                    <div class="form-group full-width">

                        <label for="tanggal_kedaluwarsa">
                            Tanggal Kedaluwarsa
                        </label>

                        <div class="input-wrapper">

                            <i class="bi bi-calendar3"></i>

                            <input
                                type="date"
                                name="tanggal_kedaluwarsa"
                                id="tanggal_kedaluwarsa"
                                value="{{ old('tanggal_kedaluwarsa') }}"
                            >

                        </div>

                    </div>


                </div>


                {{-- ACTION --}}

                <div class="form-actions">

                    <a
                        href="{{ route('products.index') }}"
                        class="cancel-button"
                    >
                        Batal
                    </a>


                    <button
                        type="submit"
                        class="save-button"
                    >
                        <i class="bi bi-check-lg"></i>
                        Simpan Produk
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>


<style>

.create-product-page {
    width: 100%;
    color: #151515;
    background: #f7f7f5;
    min-height: calc(100vh - 70px);
}

.create-product-container {
    max-width: 820px;
    margin: 0 auto;
    padding: 30px 18px 50px;
}


/* HEADER */

.create-product-header {
    display: flex;
    align-items: center;
    gap: 15px;
    margin-bottom: 25px;
}

.back-button {
    width: 44px;
    height: 44px;
    flex-shrink: 0;
    border-radius: 11px;
    background: #111111;
    color: #ffffff;
    display: flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    transition: all .2s ease;
}

.back-button:hover {
    background: #d90429;
    color: #ffffff;
    transform: translateX(-2px);
}

.back-button i {
    font-size: 15px;
}

.header-eyebrow {
    display: block;
    color: #d90429;
    font-size: 9px;
    font-weight: 900;
    letter-spacing: 1.5px;
    margin-bottom: 4px;
}

.create-product-header h1 {
    margin: 0;
    color: #111111;
    font-size: 28px;
    line-height: 1.15;
    font-weight: 900;
    letter-spacing: -.8px;
}

.create-product-header p {
    margin: 5px 0 0;
    color: #777777;
    font-size: 12px;
}


/* CARD */

.form-card {
    position: relative;
    overflow: hidden;
    background: #ffffff;
    border: 1px solid #dedede;
    border-radius: 18px;
    box-shadow: 0 8px 30px rgba(0,0,0,.06);
}

.form-card-top-line {
    height: 5px;
    background: linear-gradient(
        90deg,
        #111111 0%,
        #111111 33.33%,
        #d90429 33.33%,
        #d90429 66.66%,
        #f5c400 66.66%,
        #f5c400 100%
    );
}

.form-card-header {
    display: flex;
    align-items: center;
    gap: 13px;
    padding: 19px 21px;
    border-bottom: 1px solid #eeeeee;
}

.form-section-icon {
    width: 41px;
    height: 41px;
    flex-shrink: 0;
    border-radius: 11px;
    background: #111111;
    color: #f5c400;
    display: flex;
    align-items: center;
    justify-content: center;
}

.form-section-icon i {
    font-size: 17px;
}

.section-label {
    display: block;
    margin-bottom: 2px;
    color: #d90429;
    font-size: 8px;
    font-weight: 900;
    letter-spacing: 1.1px;
}

.form-card-header h2 {
    margin: 0;
    color: #111111;
    font-size: 15px;
    font-weight: 800;
}

.form-card-header p {
    margin: 3px 0 0;
    color: #8a8a8a;
    font-size: 10px;
}


/* FORM */

.form-body {
    padding: 22px 21px 5px;
}

.form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 17px;
}

.form-group {
    margin-bottom: 19px;
}

.full-width {
    width: 100%;
}

.form-group label {
    display: block;
    margin-bottom: 7px;
    color: #222222;
    font-size: 11px;
    font-weight: 800;
}

.input-wrapper {
    position: relative;
    display: flex;
    align-items: center;
    width: 100%;
    height: 44px;
    border: 1px solid #dedede;
    border-radius: 10px;
    background: #ffffff;
    transition: all .2s ease;
}

.input-wrapper:focus-within {
    border-color: #d90429;
    box-shadow: 0 0 0 3px rgba(217,4,41,.08);
}

.input-wrapper > i {
    margin-left: 12px;
    flex-shrink: 0;
    color: #888888;
    font-size: 13px;
}

.input-wrapper input,
.input-wrapper select {
    width: 100%;
    height: 100%;
    min-width: 0;
    padding: 0 12px;
    border: none;
    outline: none;
    background: transparent;
    color: #222222;
    font-size: 12px;
}

.input-wrapper > i + input,
.input-wrapper > i + select {
    padding-left: 9px;
}

.input-wrapper input::placeholder {
    color: #b0b0b0;
}

.input-wrapper select {
    appearance: none;
    cursor: pointer;
    padding-right: 35px;
}

.select-wrapper {
    position: relative;
}

.select-arrow {
    position: absolute;
    right: 13px;
    margin: 0 !important;
    pointer-events: none;
    color: #777777 !important;
    font-size: 10px !important;
}


/* CURRENCY */

.currency-prefix {
    padding-left: 12px;
    color: #111111;
    font-size: 11px;
    font-weight: 900;
}

.currency-prefix + input {
    padding-left: 7px !important;
}


/* CUSTOM CATEGORY */

.custom-category-box {
    display: none;
    margin-top: 9px;
    padding: 13px;
    border-radius: 11px;
    border: 1px solid #f0d56a;
    background: #fffbea;
}

.custom-category-heading {
    display: flex;
    align-items: center;
    gap: 8px;
    margin-bottom: 9px;
}

.custom-category-icon {
    width: 26px;
    height: 26px;
    border-radius: 7px;
    background: #111111;
    color: #f5c400;
    display: flex;
    align-items: center;
    justify-content: center;
}

.custom-category-icon i {
    font-size: 10px;
}

.custom-category-heading strong {
    display: block;
    color: #222222;
    font-size: 10px;
    font-weight: 800;
}

.custom-category-heading span {
    display: block;
    margin-top: 1px;
    color: #888888;
    font-size: 9px;
}

.custom-input-wrapper {
    border-color: #e5d37d;
}

.custom-input-wrapper:focus-within {
    border-color: #f5c400;
    box-shadow: 0 0 0 3px rgba(245,196,0,.12);
}


/* ERROR */

.form-error-box {
    display: flex;
    gap: 11px;
    align-items: flex-start;
    padding: 13px;
    margin-bottom: 18px;
    border-radius: 12px;
    background: #fff1f2;
    border: 1px solid #fecdd3;
}

.form-error-icon {
    width: 30px;
    height: 30px;
    flex-shrink: 0;
    border-radius: 8px;
    background: #d90429;
    color: #ffffff;
    display: flex;
    align-items: center;
    justify-content: center;
}

.form-error-icon i {
    font-size: 12px;
}

.form-error-box strong {
    display: block;
    margin-bottom: 5px;
    color: #991b1b;
    font-size: 12px;
}

.form-error-box ul {
    margin: 0;
    padding-left: 16px;
    color: #b91c1c;
    font-size: 11px;
}


/* ACTION */

.form-actions {
    display: flex;
    justify-content: flex-end;
    gap: 9px;
    padding: 17px 21px 20px;
    border-top: 1px solid #eeeeee;
    background: #fafafa;
}

.cancel-button,
.save-button {
    height: 41px;
    padding: 0 16px;
    border-radius: 9px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 7px;
    font-size: 11px;
    font-weight: 800;
    text-decoration: none;
    transition: all .2s ease;
}

.cancel-button {
    background: #ffffff;
    border: 1px solid #dddddd;
    color: #555555;
}

.cancel-button:hover {
    background: #eeeeee;
    color: #222222;
}

.save-button {
    border: none;
    background: #d90429;
    color: #ffffff;
    box-shadow: 0 6px 17px rgba(217,4,41,.2);
}

.save-button:hover {
    background: #b80322;
    color: #ffffff;
    transform: translateY(-1px);
    box-shadow: 0 9px 22px rgba(217,4,41,.26);
}

.save-button i {
    font-size: 12px;
}


/* MOBILE */

@media (max-width: 767px) {

    .create-product-page {
        min-height: calc(100vh - 60px);
    }

    .create-product-container {
        padding: 19px 12px 35px;
    }

    .create-product-header {
        gap: 11px;
        margin-bottom: 19px;
    }

    .back-button {
        width: 39px;
        height: 39px;
        border-radius: 10px;
    }

    .header-eyebrow {
        font-size: 8px;
    }

    .create-product-header h1 {
        font-size: 21px;
    }

    .create-product-header p {
        font-size: 10px;
    }

    .form-card {
        border-radius: 15px;
    }

    .form-card-top-line {
        height: 4px;
    }

    .form-card-header {
        padding: 15px;
    }

    .form-section-icon {
        width: 35px;
        height: 35px;
        border-radius: 9px;
    }

    .form-card-header h2 {
        font-size: 12px;
    }

    .form-card-header p {
        font-size: 9px;
    }

    .form-body {
        padding: 17px 15px 2px;
    }

    .form-row {
        grid-template-columns: 1fr;
        gap: 0;
    }

    .form-group {
        margin-bottom: 16px;
    }

    .form-group label {
        font-size: 10px;
        margin-bottom: 6px;
    }

    .input-wrapper {
        height: 41px;
        border-radius: 9px;
    }

    .input-wrapper input,
    .input-wrapper select {
        font-size: 11px;
    }

    .custom-category-box {
        padding: 11px;
        border-radius: 10px;
    }

    .form-actions {
        padding: 13px 15px 15px;
    }

    .cancel-button,
    .save-button {
        height: 40px;
        font-size: 10px;
    }

}


/* SMALL PHONE */

@media (max-width: 380px) {

    .create-product-container {
        padding-left: 10px;
        padding-right: 10px;
    }

    .create-product-header h1 {
        font-size: 19px;
    }

    .create-product-header p {
        font-size: 9px;
    }

    .form-body {
        padding-left: 12px;
        padding-right: 12px;
    }

    .form-actions {
        padding-left: 12px;
        padding-right: 12px;
    }

    .cancel-button,
    .save-button {
        flex: 1;
        padding: 0 9px;
    }

}

</style>


<script>

document.addEventListener('DOMContentLoaded', function () {

    const kategori = document.getElementById('kategori');

    const kategoriCustomWrapper =
        document.getElementById('kategoriCustomWrapper');

    const kategoriCustom =
        document.getElementById('kategori_custom');

    const form =
        document.getElementById('productForm');


    function toggleKategoriCustom() {

        if (kategori.value === 'Lainnya') {

            kategoriCustomWrapper.style.display = 'block';

            kategoriCustom.required = true;

        } else {

            kategoriCustomWrapper.style.display = 'none';

            kategoriCustom.required = false;

            kategoriCustom.value = '';

        }

    }


    kategori.addEventListener('change', function () {

        toggleKategoriCustom();

        if (kategori.value === 'Lainnya') {

            setTimeout(function () {

                kategoriCustom.focus();

            }, 100);

        }

    });


    form.addEventListener('submit', function (event) {

        if (kategori.value === 'Lainnya') {

            const customValue =
                kategoriCustom.value.trim();


            if (customValue === '') {

                event.preventDefault();

                kategoriCustom.focus();

                return;

            }


            const customOption =
                document.createElement('option');

            customOption.value = customValue;

            customOption.textContent = customValue;

            customOption.selected = true;


            kategori.appendChild(customOption);

            kategori.value = customValue;

        }

    });


    toggleKategoriCustom();

});

</script>

@endsection