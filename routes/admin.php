<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AdminController::class, 'admin']);

Route::as('admin.')->middleware(['auth', 'active', 'admin'])->group(function() {

    Route::get('/posts', [PostController::class, 'index'])->name('posts');
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show')->whereNumber('post');
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit')->whereNumber('post');
    Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update')->whereNumber('post');
    Route::delete('/posts/{post}', [PostController::class, 'delete'])->name('posts.delete')->whereNumber('post');

    // Route::resource('/comments');
});
