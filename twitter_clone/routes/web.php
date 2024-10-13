<?php

use App\Http\Controllers\Admin\AdminConroller;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\Lang\LangController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', FeedController::class)->name('dashboard');
Route::get('/ideas/{idea}', [IdeaController::class, 'show'])->name('ideas.show');
Route::get('/ideas/{idea}/edit', [IdeaController::class, 'edit'])->name('ideas.edit');

Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'register'])->name('auth.register');
    Route::post('/register', [AuthController::class, 'store'])->name('auth.store');
    Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
    Route::post('/login', [AuthController::class, 'session'])->name('auth.session');
});

Route::resource('user', UserController::class)->only(['show', 'edit', 'update']);
Route::get('/profile/{id}', [UserController::class, 'profile'])->name('user.profile');
Route::post('/user/{user}/follow', [FollowController::class, 'follow'])->name('user.follow');
Route::post('/user/{user}/unfollow', [FollowController::class, 'unfollow'])->name('user.unfollow');
Route::post('/idea/{idea}/like', [LikeController::class, 'like'])->name('user.like');
Route::post('/idea/{idea}/unlike', [LikeController::class, 'unlike'])->name('user.unlike');

Route::middleware('auth')->group(function () {
    Route::delete('/logout', [AuthController::class, 'logout'])->name('auth.session.logout');
    Route::post('/ideas/{idea}/comments', [CommentController::class, 'store'])->name('ideas.comments.store');
    Route::put('/ideas/{idea}', [IdeaController::class, 'update'])->name('ideas.update');
    Route::post('/idea', [IdeaController::class, 'store'])->name('idea.store');
    Route::delete('/idea/{idea}', [IdeaController::class, 'destroy'])->name('idea.destroy');
});

Route::get('/terms', function () {
    return view('terms');
})->name('terms');

//localization
Route::get('/lang/{language}', [LangController::class, 'lang'])->name('lang');



//admin
Route::get('/admin', [AdminConroller::class, 'index'])->name('admin.dashboard')->middleware('auth');

//admin user routes;
Route::get('/admin/users/{user}', [AdminConroller::class, 'showUser'])->name('admin.user');
Route::get('/admin/users/{user}/edit', [AdminConroller::class, 'editUser'])->name('admin.user.edit');
Route::put('/admin/users/update/{user}', [AdminConroller::class, 'updateUser'])->name('admin.user.update');
