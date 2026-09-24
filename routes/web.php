<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CashierController;

Route::get('/', [DashboardController::class, 'index'])
    ->name('dashboard');

Route::get('/products', [ProductController::class, 'index'])
    ->name('products.index');

Route::get('/products/create', [ProductController::class, 'create'])
    ->name('products.create');

Route::post('/products', [ProductController::class, 'store'])
    ->name('products.store');

Route::patch('/products/{product}/stock', [ProductController::class, 'addStock'])
    ->name('products.addStock');

Route::get('/cashier', [CashierController::class, 'index'])
    ->name('cashier.index');

Route::post('/cashier', [CashierController::class, 'store'])
    ->name('cashier.store');

Route::get('/cashier/receipt/{sale}', [CashierController::class, 'receipt'])
    ->name('cashier.receipt');