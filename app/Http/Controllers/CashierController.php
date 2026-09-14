<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Sale;
use App\Models\SaleDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CashierController extends Controller
{
    public function index()
    {
        $products = Product::where('stok', '>', 0)
            ->orderBy('nama_produk')
            ->get();

        return view('cashier.index', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'items' => 'required|string',
            'uang_dibayar' => 'required|numeric|min:0',
        ]);

        $items = json_decode($request->input('items'), true);

        if (!is_array($items) || count($items) === 0) {
            return back()
                ->withErrors([
                    'items' => 'Keranjang pembelian masih kosong.'
                ])
                ->withInput();
        }

        $uangDibayar = (float) $request->input('uang_dibayar');

        try {
            $sale = DB::transaction(function () use ($items, $uangDibayar) {
                $total = 0;
                $detailItems = [];

                foreach ($items as $item) {
                    if (
                        !is_array($item) ||
                        !isset($item['product_id']) ||
                        !isset($item['jumlah'])
                    ) {
                        abort(422, 'Data produk tidak valid.');
                    }

                    $product = Product::where('id', $item['product_id'])
                        ->lockForUpdate()
                        ->first();

                    if (!$product) {
                        abort(422, 'Produk tidak ditemukan.');
                    }

                    $jumlah = (int) $item['jumlah'];

                    if ($jumlah < 1) {
                        abort(422, 'Jumlah produk tidak valid.');
                    }

                    if ($jumlah > $product->stok) {
                        abort(
                            422,
                            'Stok produk ' . $product->nama_produk . ' tidak mencukupi.'
                        );
                    }

                    $harga = (float) $product->harga_jual;
                    $subtotal = $harga * $jumlah;

                    $total += $subtotal;

                    $detailItems[] = [
                        'product_id' => $product->id,
                        'jumlah' => $jumlah,
                        'harga' => $harga,
                        'subtotal' => $subtotal,
                    ];
                }

                if ($total <= 0) {
                    abort(422, 'Total transaksi harus lebih dari 0.');
                }

                if ($uangDibayar < $total) {
                    abort(422, 'Uang pembayaran tidak mencukupi.');
                }

                $sale = Sale::create([
                    'nomor_transaksi' => 'TRX-' .
                        now()->format('YmdHis') .
                        '-' .
                        Str::upper(Str::random(4)),
                    'total' => $total,
                    'uang_dibayar' => $uangDibayar,
                    'kembalian' => $uangDibayar - $total,
                ]);

                foreach ($detailItems as $detail) {
                    SaleDetail::create([
                        'sale_id' => $sale->id,
                        'product_id' => $detail['product_id'],
                        'jumlah' => $detail['jumlah'],
                        'harga' => $detail['harga'],
                        'subtotal' => $detail['subtotal'],
                    ]);

                    Product::where('id', $detail['product_id'])
                        ->decrement('stok', $detail['jumlah']);
                }

                return $sale;
            });

            return redirect()
                ->route('cashier.receipt', $sale->id)
                ->with('success', 'Transaksi berhasil diselesaikan.');
        } catch (\Throwable $e) {
            if ($e instanceof \Symfony\Component\HttpKernel\Exception\HttpException) {
                throw $e;
            }

            return back()
                ->withErrors([
                    'items' => 'Transaksi gagal diproses. Periksa kembali data produk dan pembayaran.'
                ])
                ->withInput();
        }
    }

    public function receipt(Sale $sale)
    {
        $sale->load('details.product');

        return view('cashier.receipt', compact('sale'));
    }
}