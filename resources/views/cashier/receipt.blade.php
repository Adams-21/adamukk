@extends('layouts.app')

@section('title', 'Detail Transaksi')

@section('content')

<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">
        <div>
            <h2 class="fw-bold mb-1" style="letter-spacing:-0.5px;">Transaksi Berhasil</h2>
            <p class="text-muted mb-0">
                Bukti transaksi digital telah dibuat.
            </p>
        </div>

        <a href="{{ route('cashier.index') }}" class="btn btn-receipt-primary">
            <i class="bi bi-plus-circle me-2"></i>
            Transaksi Baru
        </a>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-8">

            <div class="card border-0 shadow-sm receipt-card">

                <div class="card-body p-4 p-md-5">

                    <div class="text-center border-bottom pb-4 mb-4">
                        <div class="receipt-icon mb-3">
                            <i class="bi bi-check-lg"></i>
                        </div>

                        <h3 class="fw-bold mb-2">
                            Transaksi Berhasil
                        </h3>

                        <p class="text-muted mb-0">
                            Data transaksi telah tersimpan di sistem.
                        </p>
                    </div>

                    <div class="row g-3 mb-4">

                        <div class="col-md-6">
                            <div class="receipt-info">
                                <small class="text-muted d-block mb-1">
                                    Nomor Transaksi
                                </small>

                                <strong>
                                    {{ $sale->nomor_transaksi }}
                                </strong>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="receipt-info">
                                <small class="text-muted d-block mb-1">
                                    Waktu Transaksi
                                </small>

                                <strong>
                                    {{ $sale->created_at->format('d M Y, H:i') }}
                                </strong>
                            </div>
                        </div>

                    </div>

                    <div class="table-responsive">
                        <table class="table align-middle receipt-table">

                            <thead>
                                <tr>
                                    <th>Produk</th>
                                    <th class="text-center">Jumlah</th>
                                    <th class="text-end">Harga</th>
                                    <th class="text-end">Subtotal</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($sale->details as $detail)
                                    <tr>
                                        <td>
                                            <div class="fw-semibold">
                                                {{ $detail->product->nama_produk }}
                                            </div>
                                        </td>

                                        <td class="text-center">
                                            {{ $detail->jumlah }}
                                        </td>

                                        <td class="text-end">
                                            Rp {{ number_format($detail->harga, 0, ',', '.') }}
                                        </td>

                                        <td class="text-end fw-semibold">
                                            Rp {{ number_format($detail->subtotal, 0, ',', '.') }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>

                    <div class="border-top pt-4 mt-3">

                        <div class="d-flex justify-content-between mb-3">
                            <span class="text-muted">
                                Total Belanja
                            </span>

                            <strong>
                                Rp {{ number_format($sale->total, 0, ',', '.') }}
                            </strong>
                        </div>

                        <div class="d-flex justify-content-between mb-3">
                            <span class="text-muted">
                                Uang Dibayar
                            </span>

                            <strong>
                                Rp {{ number_format($sale->uang_dibayar, 0, ',', '.') }}
                            </strong>
                        </div>

                        <div class="d-flex justify-content-between change-summary-box p-3">
                            <span class="fw-semibold" style="color:#8a5a06;">
                                Kembalian
                            </span>

                            <strong style="color:#0d8a5c;">
                                Rp {{ number_format($sale->kembalian, 0, ',', '.') }}
                            </strong>
                        </div>

                    </div>

                    <div class="text-center mt-5 pt-4 border-top">
                        <p class="mb-1 fw-semibold">
                            Terima kasih atas transaksi Anda.
                        </p>

                        <small class="text-muted">
                            Bukti ini tersimpan secara digital di dalam sistem.
                        </small>
                    </div>

                </div>

            </div>

        </div>
    </div>

</div>

<style>
    .receipt-card {
        border-radius: 20px;
    }

    .receipt-icon {
        width: 70px;
        height: 70px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        background: linear-gradient(135deg, #eafaf4, #d7f3e6);
        color: #0d8a5c;
        font-size: 34px;
        box-shadow: 0 4px 14px rgba(13, 138, 92, 0.18);
    }

    .receipt-info {
        background: #f7f8fa;
        border: 1px solid #eceef2;
        border-radius: 12px;
        padding: 16px;
    }

    .receipt-table thead th {
        background: #f7f8fa;
        color: #5b6072;
        font-size: 10.5px;
        letter-spacing: 0.5px;
        text-transform: uppercase;
        font-weight: 800;
        border-bottom: 1px solid #e6e8ee;
    }

    .receipt-table tbody td {
        border-color: #f0f1f5;
    }

    .change-summary-box {
        background: linear-gradient(135deg, #fef3e2, #fdecc8);
        border: 1px solid #f6ddb0;
        border-radius: 12px;
    }

    .btn-receipt-primary {
        border: none;
        border-radius: 10px;
        background: linear-gradient(135deg, #0f9d78, #0c7d5f);
        color: #fff;
        font-weight: 700;
        padding: 10px 18px;
        box-shadow: 0 4px 14px rgba(15, 157, 120, 0.22);
        transition: transform 0.12s ease, box-shadow 0.12s ease;
    }

    .btn-receipt-primary:hover {
        transform: translateY(-1px);
        box-shadow: 0 6px 18px rgba(15, 157, 120, 0.3);
        color: #fff;
    }
</style>

@endsection