<?php


use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;


Route::get('/', [PublicController::class, 'index'])->name('public.index');


// 2. Rute Perantara Pelacak Klik (Intermediary Tracking)
Route::get('/go/{link}', [PublicController::class, 'redirect'])->name('public.redirect');


Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
});


Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout')
    ->middleware('auth');


// Route Group untuk halaman Admin
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {


// RUTE DASHBOARD ANALYTICS (BARU)
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


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