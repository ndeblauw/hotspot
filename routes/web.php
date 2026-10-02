<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\KeywordController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

// Public routes of my application
Route::get('/', [WelcomeController::class, 'index'])->name('home');

Route::get('articles', [ArticleController::class, 'index'])->name('articles.index');
Route::get('articles/{article}', [ArticleController::class, 'show'])->name('articles.show');

Route::get('authors', [AuthorController::class, 'index'])->name('authors.index');
Route::get('authors/{user}', [AuthorController::class, 'show'])->name('authors.show');

Route::get('keywords', [KeywordController::class, 'index'])->name('keywords.index');
Route::get('keywords/{keyword}', [KeywordController::class, 'show'])->name('keywords.show');

// Management routes
Route::middleware(['auth'])->group(function () {
    // CRUD for article
    Route::get('admin/articles', [App\Http\Controllers\Admin\ArticleController::class, 'index'])->name('admin.articles.index');
    Route::get('admin/articles/create', [App\Http\Controllers\Admin\ArticleController::class, 'create'])->name('admin.articles.create');
    Route::post('admin/articles', [App\Http\Controllers\Admin\ArticleController::class, 'store'])->name('admin.articles.store');
    Route::get('admin/articles/{article}/edit', [App\Http\Controllers\Admin\ArticleController::class, 'edit'])->name('admin.articles.edit');
    Route::put('admin/articles/{article}', [App\Http\Controllers\Admin\ArticleController::class, 'update'])->name('admin.articles.update');
    Route::delete('admin/articles/{article}', [App\Http\Controllers\Admin\ArticleController::class, 'destroy'])->name('admin.articles.destroy');

    // CRUD for keyword
    Route::get('admin/keywords', [App\Http\Controllers\Admin\KeywordController::class, 'index'])->name('admin.keywords.index');
    Route::get('admin/keywords/create', [App\Http\Controllers\Admin\KeywordController::class, 'create'])->name('admin.keywords.create');
    Route::post('admin/keywords', [App\Http\Controllers\Admin\KeywordController::class, 'store'])->name('admin.keywords.store');
    Route::get('admin/keywords/{keyword}/edit', [App\Http\Controllers\Admin\KeywordController::class, 'edit'])->name('admin.keywords.edit');
    Route::put('admin/keywords/{keyword}', [App\Http\Controllers\Admin\KeywordController::class, 'update'])->name('admin.keywords.update');
    Route::delete('admin/keywords/{keyword}', [App\Http\Controllers\Admin\KeywordController::class, 'destroy'])->name('admin.keywords.destroy');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
});

require __DIR__.'/settings.php';
