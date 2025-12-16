<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;



// 1. Mostrar lista (Index)
Route::get('/categories', [CategoryController::class, 'index'])
    ->name('categories.index');

// 2. Formulario de creación (Create)
// ¡IMPORTANTE!: Esta ruta debe ir ANTES de la ruta 'show' /{category}
Route::get('/categories/create', [CategoryController::class, 'create'])
    ->name('categories.create');

// 3. Guardar en base de datos (Store)
Route::post('/categories', [CategoryController::class, 'store'])
    ->name('categories.store');

// 4. Mostrar un recurso específico (Show)
Route::get('/categories/{category}', [CategoryController::class, 'show'])
    ->name('categories.show');

// 5. Formulario de edición (Edit)
Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])
    ->name('categories.edit');

// 6. Actualizar recurso (Update)
Route::put('/categories/{category}', [CategoryController::class, 'update'])
    ->name('categories.update');

// 7. Eliminar recurso (Destroy)
Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])
    ->name('categories.destroy');

Route::resource('products', ProductController::class);

Route::get('/', fn() => view('welcome'));


