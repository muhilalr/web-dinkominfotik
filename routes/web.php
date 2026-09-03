<?php

use App\Http\Controllers\BankDataController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Models\LampiranBankData;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/berita', [PostController::class, 'indexBerita'])->name('posts.berita');
Route::get('/artikel', [PostController::class, 'indexArtikel'])->name('posts.artikel');
Route::get('/{tipe}/{slug}', [PostController::class, 'show'])->name('posts.show')
    ->whereIn('tipe', ['berita', 'artikel']);

Route::get('/page/{slug}', [PageController::class, 'show'])->name('page.show');

Route::get('/bank-data', [BankDataController::class, 'index'])->name('bank-data.index');

Route::get('/bank-data/{lampiran}/download', function (LampiranBankData $lampiran) {
    $disk = Storage::disk('public');

    abort_unless(
        $disk->exists($lampiran->file_path),
        404,
        'File tidak ditemukan.'
    );

    return response()->download(
        $disk->path($lampiran->file_path),
        $lampiran->file_name
    );
})->name('bank-data.download');
