<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProduitController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/produits', [ProduitController::class, 'Listeproduit'])->name('produit.liste');
Route::get('/produit/ajouter', [ProduitController::class, 'ajouterproduit'])->name('produit.ajouter');
Route::post('/produit/ajouter', [ProduitController::class, 'ajouterproduitTraitement'])->name('produit.ajouterproduit');
Route::get('/produit/{id}', [ProduitController::class, 'afficher_details'])->name('produit.details');
Route::get('/produit/modifier/{id}', [ProduitController::class, 'modifierproduit'])->name('produit.modifier');
Route::post('/produit/modifier/{id}', [ProduitController::class, 'modifierproduitTraitement'])->name('produit.modifierproduit');
Route::delete('/produit/supprimer/{id}', [ProduitController::class, 'supprimerproduit'])->name('produit.supprimer');

