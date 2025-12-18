<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WarehouseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SupplierController;

Route::get('/', function () {
    return redirect()->route('categories.index');
});

Route::resource('categories', CategoryController::class);
Route::resource('products', ProductController::class);

Route::get('/warehouse', [WarehouseController::class, 'index'])->name('warehouse.index');
Route::post('/warehouse/category', [WarehouseController::class, 'storeCategory'])->name('warehouse.storeCategory');
Route::put('/warehouse/category/{category}', [WarehouseController::class, 'updateCategory'])->name('warehouse.updateCategory');
Route::delete('/warehouse/category/{category}', [WarehouseController::class, 'destroyCategory'])->name('warehouse.destroyCategory');
Route::post('/warehouse/product', [WarehouseController::class, 'storeProduct'])->name('warehouse.storeProduct');
Route::put('/warehouse/product/{product}', [WarehouseController::class, 'updateProduct'])->name('warehouse.updateProduct');
Route::delete('/warehouse/product/{product}', [WarehouseController::class, 'destroyProduct'])->name('warehouse.destroyProduct');

Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
Route::get('/suppliers', [SupplierController::class, 'index'])->name('suppliers.index');