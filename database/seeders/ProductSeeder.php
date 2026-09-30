<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::create([
            'nama_produk' => 'Indomie Goreng',
            'kategori' => 'Makanan',
            'harga_modal' => 2500,
            'harga_jual' => 3500,
            'stok' => 25,
            'stok_minimum' => 5,
            'tanggal_kedaluwarsa' => '2027-06-15',
        ]);

        Product::create([
            'nama_produk' => 'Aqua 600ml',
            'kategori' => 'Minuman',
            'harga_modal' => 2500,
            'harga_jual' => 4000,
            'stok' => 30,
            'stok_minimum' => 5,
            'tanggal_kedaluwarsa' => '2027-08-20',
        ]);

        Product::create([
            'nama_produk' => 'Teh Pucuk',
            'kategori' => 'Minuman',
            'harga_modal' => 3000,
            'harga_jual' => 5000,
            'stok' => 20,
            'stok_minimum' => 5,
            'tanggal_kedaluwarsa' => '2027-05-10',
        ]);

        Product::create([
            'nama_produk' => 'Sabun Mandi',
            'kategori' => 'Kebutuhan Rumah',
            'harga_modal' => 3500,
            'harga_jual' => 5000,
            'stok' => 15,
            'stok_minimum' => 3,
            'tanggal_kedaluwarsa' => null,
        ]);

        Product::create([
            'nama_produk' => 'Sampo Sachet',
            'kategori' => 'Kebutuhan Rumah',
            'harga_modal' => 1500,
            'harga_jual' => 2500,
            'stok' => 40,
            'stok_minimum' => 10,
            'tanggal_kedaluwarsa' => '2027-09-01',
        ]);

        Product::create([
            'nama_produk' => 'Beras 5kg',
            'kategori' => 'Sembako',
            'harga_modal' => 65000,
            'harga_jual' => 72000,
            'stok' => 10,
            'stok_minimum' => 3,
            'tanggal_kedaluwarsa' => '2027-12-20',
        ]);

        Product::create([
            'nama_produk' => 'Minyak Goreng 1L',
            'kategori' => 'Sembako',
            'harga_modal' => 15000,
            'harga_jual' => 18000,
            'stok' => 18,
            'stok_minimum' => 5,
            'tanggal_kedaluwarsa' => '2027-11-10',
        ]);

        Product::create([
            'nama_produk' => 'Gula Pasir 1kg',
            'kategori' => 'Sembako',
            'harga_modal' => 15000,
            'harga_jual' => 17500,
            'stok' => 12,
            'stok_minimum' => 4,
            'tanggal_kedaluwarsa' => '2027-10-15',
        ]);
    }
}