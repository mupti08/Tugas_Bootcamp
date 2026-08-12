<?php

use App\Http\Controllers\LinkController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicController::class, 'index'])->name('public.index');

// Route Group untuk halaman Admin
Route::prefix('admin')->name('admin.')->group(function () {

    // Rute Index, Create, dan Store
    Route::get('/links', [LinkController::class, 'index'])
        ->name('links.index');

    Route::get('/links/create', [LinkController::class, 'create'])
        ->name('links.create');

    Route::post('/links', [LinkController::class, 'store'])
        ->name('links.store');

    // Rute Edit, Update, dan Destroy
    Route::get('/links/{link}/edit', [LinkController::class, 'edit'])
        ->name('links.edit');

    Route::put('/links/{link}', [LinkController::class, 'update'])
        ->name('links.update');

    Route::delete('/links/{link}', [LinkController::class, 'destroy'])
        ->name('links.destroy');
});