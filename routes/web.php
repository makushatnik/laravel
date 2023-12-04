<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('/', 'welcome');

Route::get('/about', function () {
    return view('about');
});

Route::get('/login', [AuthController::class, 'login_form'])->name('login_form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register_form'])->name('register_form');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/profile', [ProfileController::class, 'show'])->name('profile');


Route::get('/posts', [PostController::class, 'index'])->name('posts');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show')->whereNumber('post');
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit')->whereNumber('post');
Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update')->whereNumber('post');
Route::delete('/posts/{post}', [PostController::class, 'delete'])->name('posts.delete')->whereNumber('post');

// Route::resource('/comments');
