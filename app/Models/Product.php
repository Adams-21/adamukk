<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'nama_produk',
        'kategori',
        'harga_modal',
        'harga_jual',
        'stok',
        'stok_minimum',
        'tanggal_kedaluwarsa',
    ];

    protected $casts = [
        'harga_modal' => 'decimal:2',
        'harga_jual' => 'decimal:2',
        'tanggal_kedaluwarsa' => 'date',
    ];

    public function saleDetails()
    {
        return $this->hasMany(SaleDetail::class);
    }
}