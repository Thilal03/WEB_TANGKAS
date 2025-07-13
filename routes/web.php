<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminLapanganController;
use App\Http\Controllers\AdminKategoriController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\AdminBookingController;

// Welcome page (first page)
Route::get('/', function () {
    return view('welcome');
});

// Auth routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Homepage (requires authentication)
Route::get('/homepage', function () {
    return view('homepage');
})->middleware('auth')->name('homepage');

// Admin routes (requires admin role)
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
    
    Route::resource('lapangan', AdminLapanganController::class, [
        'as' => 'admin'
    ]);
    Route::resource('kategori', AdminKategoriController::class, [
        'as' => 'admin'
    ]);
    Route::resource('booking', AdminBookingController::class, [
        'as' => 'admin'
    ]);
    Route::patch('booking/{id}/status', [AdminBookingController::class, 'updateStatus'])->name('admin.booking.updateStatus');
});

// User routes (requires authentication, but not admin)
Route::middleware('auth')->group(function () {
    Route::get('/booking', [BookingController::class, 'index'])->name('booking.index');
    Route::get('/booking/{id}', [BookingController::class, 'show'])->name('booking.show');
    Route::post('/booking/{id}', [BookingController::class, 'store'])->name('booking.store');
});
