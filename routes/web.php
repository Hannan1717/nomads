<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\TravelPackageController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\LanguageController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/detail/{slug}', [DetailController::class, 'index'])->name('detail');
// Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
// Route::get('/checkout/success', [CheckoutController::class, 'success'])->name('checkout-success');

Route::prefix('checkout')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/{id}', [CheckoutController::class, 'index'])->name('checkout');
    Route::post('/{id}', [CheckoutController::class, 'process'])->name('checkout-process');
    Route::post('/create/{detail_id}', [CheckoutController::class, 'create'])->name('checkout-create');
    Route::get('/remove/{detail_id}', [CheckoutController::class, 'remove'])->name('checkout-remove');
    Route::get('/confirm/{id}', [CheckoutController::class, 'success'])->name('checkout-success');
});

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('travel-package', TravelPackageController::class);
    Route::resource('gallery', GalleryController::class);
    Route::resource('transaction', TransactionController::class);
});

Route::get('language/{locale}', [LanguageController::class, 'changelanguage'])->name('language');


Auth::routes(['verify' => true]);
