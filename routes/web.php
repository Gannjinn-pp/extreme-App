<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeFavoriteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function(){
    return view('test.testview');
});


Route::post('homes/{home}/favorite', [HomeFavoriteController::class, 'store'])->name('homes.favorite');
Route::delete('homes/{home}/favorite', [HomeFavoriteController::class, 'destroy'])->name('homes.unfavorite');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/homes/{home}/reservations', [ReservationController::class, 'homeReservations'])
    ->name('homes.reservations');

// RESTfulなルート
Route::resource('reservations', ReservationController::class);
Route::resource('homes', HomeController::class);

require __DIR__.'/auth.php';
