<?php

use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use Illuminate\Support\Facades\Route;

Route::GET('/', [PostController::class, 'index'])->name('home');

Route::GET('/test', [PostController::class, 'test'])->name('test');

Route::GET('posts/{post:slug}', [PostController::class, 'show']);
Route::POST('posts/{post:slug}/comments', [PostCommentsController::class, 'store']);

Route::POST('newsletter', NewsletterController::class);

Route::GET('register', [RegisterController::class, 'create'])->middleware('guest');
Route::POST('register', [RegisterController::class, 'store'])->middleware('guest');

Route::GET('login', [SessionsController::class, 'create'])->middleware('guest');
Route::POST('login', [SessionsController::class, 'store'])->middleware('guest');

Route::POST('logout', [SessionsController::class, 'destroy'])->middleware('auth');

// Admin Section
// Route::middleware('can:admin')->group(function () {
    Route::resource('admin/posts', AdminPostController::class)->except('show');
// });
