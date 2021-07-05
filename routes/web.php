<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TourController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;

Route::get('language/{language}', [LanguageController::class, 'index'])->name('language');
Route::get('search/', [TourController::class, 'search'])->name('search');
Route::get('/', function () {
    return view('home_user');
})->name('home');
Route::get('users/profile/{id}', [UserController::class, 'show_edit'])->name('edit_profile');
Route::resource('users', UserController::class)->only([
    'index', 'show', 'store', 'update',
])->middleware(['auth']);
Route::resource('comments', CommentController::class)->only([
    'index', 'show', 'store',
])->middleware(['auth']);
Route::get('/dashboard', function () {
    return view('dashboard')->name('dashboard');
})->middleware(['auth']);
Route::resource('tours', TourController::class)->only([
    'index', 'show',
]);
Route::resource('reviews', ReviewController::class)->only([
    'index', 'show',
]);
require __DIR__ . '/auth.php';
