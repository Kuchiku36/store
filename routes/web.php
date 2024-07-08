<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

//affichage des produit 
Route::get('/', [ProductController::class, 'index'])->name('product') ;
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.detail') ;
Route::get('/product/category/{id}', [ProductController::class, 'productByCategory'])->name('product.category') ;


//gestion du dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//gestion de l'authentification
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
