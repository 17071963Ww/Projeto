<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return redirect()->route('admin.painel');
    })->name('admin');

    Route::get('/painel', [AdminController::class, 'painel'])->name('admin.painel');

    Route::prefix('tags')->group(function () {
        Route::get('/', [AdminController::class, 'tagsIndex'])->name('admin.tags.index');
        Route::post('/', [AdminController::class, 'storeTag'])->name('admin.tags.store');
        Route::put('/{tag}', [AdminController::class, 'updateTag'])->name('admin.tags.update');
        Route::delete('/{tag}', [AdminController::class, 'destroyTag'])->name('admin.tags.destroy');
    });

    Route::prefix('cards')->group(function () {
        Route::get('/', [AdminController::class, 'cardsIndex'])->name('admin.cards.index');
        Route::get('/create', [AdminController::class, 'createCard'])->name('admin.cards.create');
        Route::post('/', [AdminController::class, 'storeCard'])->name('admin.cards.store');
        Route::get('/{card}/edit', [AdminController::class, 'editCard'])->name('admin.cards.edit');
        Route::put('/{card}', [AdminController::class, 'updateCard'])->name('admin.cards.update');
        Route::delete('/{card}', [AdminController::class, 'destroyCard'])->name('admin.cards.destroy');
    });
});