<?php

use App\Http\Controllers\BoardController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('welcome');
})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return Inertia::render('dashboard');
    })->name('dashboard');

    Route::get('board/create', [BoardController::class, 'create']);
    Route::get('boards', [BoardController::class, 'index'])->name('boards.index');
    Route::get('boards/{board}', [BoardController::class, 'edit']);
    Route::post('boards', [BoardController::class, 'store']);
    Route::delete('boards/{board}', [BoardController::class, 'destroy']);
    Route::put('boards/{board}', [BoardController::class, 'update']);
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
