<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\EmpruntController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
Route::get('books', [BookController::class, 'index'])->name('index');
Route::get('create', [BookController::class, 'create']);
Route::post('store', [BookController::class, 'store']);
Route::post('delete/{id}', [BookController::class, 'destroy'])->name('book.delete');
Route::get('show/{id}', [BookController::class, 'show'])->name('book.update');
Route::post('edit', [BookController::class, 'edit'])->name('edit.book');
Route::get('books/cards', [BookController::class, 'cards'])->name('books.cards');

// Apply (borrow) a book
Route::post('/books/apply/{book}', [EmpruntController::class, 'store'])->name('books.apply');

// Member's emprunts
Route::get('/emprunts', [EmpruntController::class, 'index'])->name('emprunts.index');

require __DIR__ . '/auth.php';
