<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StatistiqueController;
use App\Http\Controllers\SupportController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Dashboard (accueil)
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Route pour rediriger /accueil vers dashboard
Route::get('/accueil', function () {
    return redirect()->route('dashboard');
})->name('accueil');

// Produits
Route::resource('products', ProductController::class)->middleware(['auth']);

// Commandes
Route::resource('orders', OrderController::class)->middleware(['auth']);

// Profil
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password');
    Route::post('/profile/photo', [ProfileController::class, 'updatePhoto'])->name('profile.photo');
});

// Assistance
Route::get('/support', [SupportController::class, 'index'])->middleware(['auth'])->name('support');

//statistiques
Route::get('/acteurs', [StatistiqueController::class, 'index'])
    ->middleware(['auth'])
    ->name('statistiques.index');

// Routes d'assistance
Route::middleware(['auth'])->group(function () {
    Route::get('/support', [SupportController::class, 'index'])->name('support');
    Route::post('/support', [SupportController::class, 'store'])->name('support.store');
});

require __DIR__ . '/auth.php';
