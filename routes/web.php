<?php

use App\Http\Controllers\BuildController;
use App\Http\Controllers\ModificationController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\GarageController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\BetaController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FollowController;

Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});

// Beta 
Route::get('/beta', [BetaController::class, 'create'])->name('beta');
Route::post('/beta/signup', [BetaController::class, 'store'])->name('beta.store');

// Feedback
Route::get('/feedback', [FeedbackController::class, 'create'])->name('feedback');
Route::post('/feedback/submit', [FeedbackController::class, 'store'])->name('feedback.store');

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
Route::get('/profile/{user}', [ProfileController::class, 'show'])->name('profile.show')->middleware('auth');
Route::patch('/profile/{user}', [ProfileController::class, 'update'])->name('profile.update')->middleware('auth');

// Followers
Route::post('/follow/{user}', [FollowController::class, 'follow'])->name('follow');
Route::post('/unfollow/{user}', [FollowController::class, 'unfollow'])->name('unfollow');

// Passwords
Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');
Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
Route::post('/reset-password', [NewPasswordController::class, 'store'])->name('password.update');


// Builds
Route::get('/builds', [BuildController::class, 'index']);
Route::get('/builds/create', [BuildController::class, 'create'])->middleware('auth');
Route::post('/builds', [BuildController::class, 'store'])->middleware('auth');
Route::get('/builds/{build}', [BuildController::class, 'show'])->name('builds.show');
Route::get('/builds/{build}/edit', [BuildController::class, 'edit'])->middleware('auth')->can('edit', 'build')->name('builds.edit');
Route::patch('/builds/{build}', [BuildController::class, 'update'])->middleware('auth');
Route::delete('/builds/{build}', [BuildController::class, 'destroy'])->middleware('auth');


// Comments
Route::post('builds/{build}/comments', [CommentController::class, 'store'])->name('comments.store');
Route::get('comments/{comment}/edit', [CommentController::class, 'edit'])->name('comments.edit');
Route::patch('comments/{comment}', [CommentController::class, 'update'])->name('comments.update');
Route::delete('comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');


// Modifications
Route::get('/mods/{build}/create', [ModificationController::class, 'create'])->middleware('auth');
Route::post('/mods/{build}', [ModificationController::class, 'store'])->middleware('auth')->name('mods.store');
Route::get('/builds/{build}/mods/{modification}/edit', [ModificationController::class, 'edit'])->middleware('auth')->name('mods.edit');
Route::patch('/builds/{build}/mods/{modification}', [ModificationController::class, 'update'])->name('mods.update');
Route::delete('/builds/{build}/mods/{modification}', [ModificationController::class, 'destroy'])->middleware('auth')->name('mods.destroy');
Route::delete('/mods/image/{image}', [ModificationController::class, 'deleteImage'])->name('mods.deleteImage');
// Garage
Route::get('/garage/{user}', [GarageController::class, 'show'])->name('garage.show');

// Others -Invokable controllers
Route::get('/search', SearchController::class)->name('search');

Route::get('/tags/{tag:name}', TagController::class);
