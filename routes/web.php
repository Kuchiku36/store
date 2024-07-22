<?php

use App\Models\Favori;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FavoriController;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CommandeController;

//affichage des produit 
Route::get('/', [ProductController::class, 'index'])->name('product') ;
Route::get('/product/{product}', [ProductController::class, 'show'])->name('product.detail') ;
Route::get('/product/category/{id}', [ProductController::class, 'productByCategory'])->name('product.category') ;


//gestion du dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//gestion de l'authentification
Route::middleware('auth')->group(function() {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

//gestion du panier
    Route::get('/panier', [PanierController::class, 'index'])->name('panier.lister');
    Route::get('/panier/add/{product}', [PanierController::class, 'ajouter'])->name('panier.ajouter');
    Route::get('/panier/moins/{panier}', [PanierController::class, 'moins'])->name('panier.moins');
    Route::get('/panier/remove/{panier}', [PanierController::class, 'remove'])->name('panier.remove');

//gestion des favoris

Route::get('/favori', [FavoriController::class, 'index'])->name('favori.lister');
Route::get('/favori/edit/{product}', [FavoriController::class, 'edit'])->name('favori.edit');

//gestion de la commande
Route::get('/commande', [CommandeController::class, 'index'])->name('commande.lister');
Route::get('/commande/create', [CommandeController::class, 'create'])->name('commande.create');
});

require __DIR__.'/auth.php';
