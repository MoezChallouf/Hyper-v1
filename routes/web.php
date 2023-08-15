<?php

use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;


// Categories Routes
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index')->middleware('auth');;
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create')->middleware('auth');;
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store')->middleware('auth');;
Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show')->middleware('auth');;
Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit')->middleware('auth');;
Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update')->middleware('auth');;
Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy')->middleware('auth');;


Route::get('/products', [ProductController::class, 'index'])->name('products.index')->middleware('auth');;
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create')->middleware('auth');;
Route::post('/products', [ProductController::class, 'store'])->name('products.store')->middleware('auth');;
Route::get('/products/{id}/', [ProductController::class, 'show'])->name('products.show')->middleware('auth');;
Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit')->middleware('auth');;
Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update')->middleware('auth');;
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy')->middleware('auth');;


Route::get('/', function () {
    return view('welcome');
});

// Route pour afficher le formulaire d'inscription
Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionController::class, 'create'])->middleware('guest');
Route::post('login', [SessionController::class, 'store'])->middleware('guest');

Route::post('logout', [SessionController::class, 'destroy'])->middleware('auth');


Route::get('/partners', [PartnerController::class, 'index'])->name('partners.index');
Route::get('/partners/create', [PartnerController::class, 'create'])->name('partners.create');
Route::post('/partners', [PartnerController::class, 'store'])->name('partners.store');
Route::get('/partners/{id}/', [PartnerController::class, 'show'])->name('partners.show');
Route::get('/partners/{partner}/edit', [PartnerController::class, 'edit'])->name('partners.edit');
Route::put('/partners/{partner}', [PartnerController::class, 'update'])->name('partners.update');
Route::delete('/partners/{partner}', [PartnerController::class, 'destroy'])->name('partners.destroy');
