<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;

// Login Routes

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/book', [BookingController::class, 'book'])->middleware(['auth'])->name('bookPost');


Route::get('/book', [BookingController::class, 'create'])->middleware(['auth'])->name('book');


Route::get('/book/history', [BookingController::class, 'history'])->middleware(['auth'])->name('book.history');


Route::get('/menu', [MenuController::class, 'index'])->middleware(['auth'])->name('menu');


Route::get('/menu/{id}', [MenuController::class, 'show'])->middleware(['auth'])->name('menu.show');

Route::get('/admin', [AdminController::class, 'AdminPanel'])->middleware([AdminMiddleware::class, 'auth'])->name('admin');

Route::get('/admin/add', [AdminController::class, 'AddItem'])->middleware([AdminMiddleware::class, 'auth'])->name('admin.add');

Route::post('/admin/add/', [AdminController::class, 'store'])->middleware([AdminMiddleware::class, 'auth'])->name('admin.store');


Route::resource('menu', MenuController::class)
    ->only(['create', 'store', 'update', 'edit', 'destroy']);

Route::post('/admin/{id}/accept', [AdminController::class, 'accept'])->middleware([AdminMiddleware::class, 'auth'])->name('admin.accept');


Route::post('/admin/{id}/reject', [AdminController::class, 'reject'])->middleware([AdminMiddleware::class, 'auth'])->name('admin.reject');


require __DIR__.'/auth.php';
 