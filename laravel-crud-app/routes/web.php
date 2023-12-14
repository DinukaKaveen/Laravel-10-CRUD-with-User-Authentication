<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [ProductController::class, 'products'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //product page routes
    Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
    Route::get('/product/edit', [ProductController::class, 'edit'])->name('product.edit');

    //product routes
    Route::get('/get_products', [ProductController::class, 'get_products'])->name('product.get_products');
    Route::post('/create_product', [ProductController::class, 'create_product'])->name('product.create_product');
    Route::put('/edit_product', [ProductController::class, 'edit_product'])->name('product.edit_product');
    Route::delete('/delete_product', [ProductController::class, 'delete_product'])->name('product.delete_product');
});

require __DIR__.'/auth.php';
