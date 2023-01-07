<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('home');

// admin routes
Route::get('/tags/create', [TagController::class,'create'])->middleware(['admin'])->name('tags.create');

Route::post('/tags/store', [TagController::class,'store'])->middleware(['admin'])->name('tags.store');

// user routes

Route::get('/tags', [TagController::class,'index'])->name('tags.index');

Route::get('/tags/{id}', [TagController::class,'show'])->name('tags.show');

Route::get('/users', [UserController::class,'index'])->name('users.index');

Route::get('/users/{page}', [UserController::class,'show'])->name('users.show');

Route::get('/logout', [UserController::class,'logout'])->name('users.logout');

// middleware(['auth']) means that the user must be logged in to access that route

Route::get('/page/create', [PageController::class,'create'])->middleware(['auth'])->name('page.create');

Route::post('/page/store', [PageController::class,'store'])->middleware(['auth'])->name('page.store');

Route::get('/page/createpost', [PostController::class,'create'])->middleware(['auth'])->name('post.create');

Route::post('/page/storepost', [PostController::class,'store'])->middleware(['auth'])->name('post.store');

Route::get('/posts/{post}', [PostController::class,'show'])->name('post.show');

Route::get('/posts/{post}/edit', [PostController::class,'edit'])->name('post.edit');

Route::patch('/posts/{post}', [PostController::class, 'update'])->name('posts.update');

Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

Route::get('/page/{id}', [PageController::class,'show'])->name('page.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
