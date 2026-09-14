<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProduk = Product::count();

        $totalStok = Product::sum('stok');

        $nilaiModal = Product::select(
            DB::raw('SUM(harga_modal * stok) as total')
        )->value('total') ?? 0;

        $stokMenipis = Product::whereColumn(
            'stok',
            '<=',
            'stok_minimum'
        )->count();

        $produkKedaluwarsa = Product::whereNotNull('tanggal_kedaluwarsa')
            ->whereDate('tanggal_kedaluwarsa', '<', now()->toDateString())
            ->count();

        $produkHampirKedaluwarsa = Product::whereNotNull('tanggal_kedaluwarsa')
            ->whereBetween('tanggal_kedaluwarsa', [
                now()->toDateString(),
                now()->addDays(7)->toDateString()
            ])
            ->count();

        $produk = Product::orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        return view('dashboard', compact(
            'totalProduk',
            'totalStok',
            'nilaiModal',
            'stokMenipis',
            'produkKedaluwarsa',
            'produkHampirKedaluwarsa',
            'produk'
        ));
    }
}