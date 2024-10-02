<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/ideas/{idea}', [IdeaController::class, 'show'])->name('ideas.show');
Route::get('/ideas/{idea}/edit', [IdeaController::class, 'edit'])->name('ideas.edit');


Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'register'])->name('auth.register');
    Route::post('/register', [AuthController::class, 'store'])->name('auth.store');
    Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
    Route::post('/login', [AuthController::class, 'session'])->name('auth.session');
});

Route::get('/profile', [UserController::class, 'index'])->name('profile.index');

Route::middleware('auth')->group(function () {
    Route::delete('/logout', [AuthController::class, 'logout'])->name('auth.session.logout');
    Route::post('/ideas/{idea}/comments', [CommentController::class, 'store'])->name('ideas.comments.store');
    Route::put('/ideas/{idea}', [IdeaController::class, 'update'])->name('ideas.update');
    Route::post('/idea', [IdeaController::class, 'store'])->name('idea.store');
    Route::delete('/idea/{idea}', [IdeaController::class, 'destroy'])->name('idea.destroy');
});

Route::get('/terms', function () {
    return view('terms');
});
