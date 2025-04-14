<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Display all products
Route::get('/products', [ProductsController::class, 'index'])->name('product.index');

Route::middleware('auth')->group(function () {});

// Show the form to create a new product
Route::get('/products/create', [ProductsController::class, 'create'])->name('product.create');

// Store a new product
Route::post('/products', [ProductsController::class, 'store'])->name('product.store');

// Display a single product (if implemented)
Route::get('/products/{product}', [ProductsController::class, 'show'])->name('product.show');

// Show the form to edit an existing product
Route::get('/products/{product}/edit', [ProductsController::class, 'edit'])->name('product.edit');

// Update an existing product
Route::put('/products/{product}', [ProductsController::class, 'update'])->name('product.update');

// Delete a product
Route::delete('/products/{product}', [ProductsController::class, 'destroy'])->name('product.destroy');



require __DIR__.'/auth.php';
