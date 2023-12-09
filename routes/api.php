<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/', [Controller::class, 'health']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['guest'])->group(function() {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
});

Route::as('api.')->middleware(['auth', 'active'])->group(function() {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.create');
    Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show')->whereNumber('post');
    Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update')->whereNumber('post');
    Route::delete('/posts/{post}', [PostController::class, 'delete'])->name('posts.delete')->whereNumber('post');

    // Route::resource('/comments');
});

