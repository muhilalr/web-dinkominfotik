<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/berita', [PostController::class, 'indexBerita'])->name('posts.berita');
Route::get('/artikel', [PostController::class, 'indexArtikel'])->name('posts.artikel');
Route::get('/{tipe}/{slug}', [PostController::class, 'show'])->name('posts.show')
    ->whereIn('tipe', ['berita', 'artikel']);

Route::get('/page/{slug}', [PageController::class, 'show'])->name('page.show');
