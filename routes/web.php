<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\AdminController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/menu', [MenuController::class, 'index'])->name('menu');
Route::get('/menu/{id}', [MenuController::class, 'show'])->name('menu.show');

Route::get('/reservations', [ReservationController::class, 'index'])->name('reservations');
Route::post('/reservations', [ReservationController::class, 'store'])->name('reservations.store');

Route::get('/ratings', [RatingController::class, 'index'])->name('ratings');
Route::post('/ratings', [RatingController::class, 'store'])->name('ratings.store');

Route::middleware(['admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
    
    Route::get('/menu-items', [AdminController::class, 'menuItems'])->name('menu-items');
    Route::get('/menu-items/create', [AdminController::class, 'createMenuItem'])->name('menu-items.create');
    Route::post('/menu-items', [AdminController::class, 'storeMenuItem'])->name('menu-items.store');
    Route::get('/menu-items/{id}/edit', [AdminController::class, 'editMenuItem'])->name('menu-items.edit');
    Route::put('/menu-items/{id}', [AdminController::class, 'updateMenuItem'])->name('menu-items.update');
    Route::delete('/menu-items/{id}', [AdminController::class, 'deleteMenuItem'])->name('menu-items.delete');
    
    Route::get('/categories', [AdminController::class, 'categories'])->name('categories');
    Route::post('/categories', [AdminController::class, 'storeCategory'])->name('categories.store');
    Route::delete('/categories/{id}', [AdminController::class, 'deleteCategory'])->name('categories.delete');
    
    Route::get('/tables', [AdminController::class, 'tables'])->name('tables');
    Route::post('/tables', [AdminController::class, 'storeTable'])->name('tables.store');
    Route::delete('/tables/{id}', [AdminController::class, 'deleteTable'])->name('tables.delete');
    
    Route::get('/reservations', [AdminController::class, 'reservations'])->name('reservations');
    Route::put('/reservations/{id}/status', [AdminController::class, 'updateReservationStatus'])->name('reservations.status');
    
    Route::get('/ratings', [AdminController::class, 'ratings'])->name('ratings');
    Route::delete('/ratings/{id}', [AdminController::class, 'deleteRating'])->name('ratings.delete');
});
