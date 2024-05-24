<?php

use App\Http\Controllers\BuildController;
use App\Http\Controllers\ModificationController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\NewPasswordController;

Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});

// Index
Route::get('/', [BuildController::class, 'index']);
Route::get('/filtered', [BuildController::class, 'filtered'])->name('filtered');

// Users
Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisteredUserController::class, 'create']);
    Route::post('/register', [RegisteredUserController::class, 'store']);
    Route::get('/login', [SessionController::class, 'create'])->name('login');
    Route::post('/login', [SessionController::class, 'store']);
});
Route::delete('/logout', [SessionController::class, 'destroy'])->middleware('auth');

// Password resets
Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');
Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
Route::post('/reset-password', [NewPasswordController::class, 'store'])->name('password.update');


// Builds
Route::get('/builds/create', [BuildController::class, 'create'])->middleware('auth');
Route::post('/builds', [BuildController::class, 'store'])->middleware('auth');
Route::get('/builds/{build}', [BuildController::class, 'show'])->name('builds.show');
Route::get('/builds/{build}/edit', [buildController::class, 'edit'])
->middleware('auth')
->can('edit', 'build')
->name('builds.update');
Route::patch('/builds/{build}', [buildController::class, 'update']);
Route::delete('/builds/{build}', [buildController::class, 'destroy']);

// Modifications
Route::get('/mods/{build}/create', [ModificationController::class, 'create'])->middleware('auth');
Route::post('/mods', [ModificationController::class, 'store']);
Route::get('/mods/{modification}/edit', [ModificationController::class, 'edit'])
->middleware('auth')
// ->can('edit', 'modification')
->name('mods.update');
Route::patch('/mods/{modification}', [ModificationController::class, 'update']);
Route::delete('/mods/{modification}', [ModificationController::class, 'destroy']);

Route::delete('/modifications/{build}', [ModificationController::class, 'destroy']);

// Other Views
Route::get('/garage', [BuildController::class, 'garage'])->name('garage');
// Using invokable controller
Route::get('/search', SearchController::class);
Route::get('/tags/{tag:name}', TagController::class);
Route::get('/feedback', function () {
    return view('feedback');
})->name('feedback');