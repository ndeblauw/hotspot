<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

// Public routes of my application
Route::get('/', [WelcomeController::class, 'index'])->name('home');

Route::get('articles', [ArticleController::class, 'index']);
Route::get('articles/{article}', [ArticleController::class, 'show'])->name('articles.show');

// Management routes

// CRUD for article
Route::get('admin/articles', [App\Http\Controllers\Admin\ArticleController::class, 'index'])->name('admin.articles.index');
Route::get('admin/articles/create', [App\Http\Controllers\Admin\ArticleController::class, 'create'])->name('admin.articles.create');
Route::post('admin/articles',[App\Http\Controllers\Admin\ArticleController::class, 'store'] )->name('admin.articles.store');
Route::get('admin/articles/{article}/edit', [App\Http\Controllers\Admin\ArticleController::class, 'edit'])->name('admin.articles.edit');
Route::put('admin/articles/{article}', [App\Http\Controllers\Admin\ArticleController::class, 'update'])->name('admin.articles.update');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
});

require __DIR__.'/settings.php';
