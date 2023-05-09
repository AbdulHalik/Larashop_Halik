<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\OrderController;

// Rute Publik
Route::get('/', function () {
    return view('auth.login');
});

// Rute Autentikasi
Auth::routes();

// Redirect /register ke /login
Route::match(["GET", "POST"], "/register", function () {
    return redirect("/login");
})->name("register");

// Rute Halaman Utama
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Rute Pengguna
Route::resource("users", UserController::class);

// Rute Buku
Route::resource('books', BookController::class);
Route::get('/books/trash', [BookController::class, 'trash'])->name('books.trash');
Route::post('/books/{book}/restore', [BookController::class, 'restore'])->name('books.restore');
Route::delete('/books/{id}/delete-permanent', [BookController::class, 'deletePermanent'])->name('books.delete-permanent');

// Rute Kategori
Route::resource('categories', CategoryController::class);
Route::get('/categories/trash', [CategoryController::class, 'trash'])->name('categories.trash');
Route::get('/categories/{id}/restore', [CategoryController::class, 'restore'])->name('categories.restore');
Route::delete('/categories/{id}/delete-permanent', [CategoryController::class, 'deletePermanent'])->name('categories.delete-permanent');
Route::get('/ajax/categories/search', [CategoryController::class, 'ajaxSearch']);

// Rute Pesanan
Route::resource('orders', OrderController::class);
