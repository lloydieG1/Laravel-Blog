<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
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

Route::get('/users', [UserController::class,'index'])->name('users.index');

Route::get('/users/{id}', [UserController::class,'show'])->name('users.show');

Route::get('/logout', [UserController::class,'logout'])->name('users.logout');

// middleware(['auth']) means that the user must be logged in to access that route

Route::get('/page/create', [PageController::class,'create'])->middleware(['auth'])->name('page.create');

Route::post('/page/store', [PageController::class,'store'])->middleware(['auth'])->name('page.store');

Route::get('/page/createpost', [PostController::class,'create'])->middleware(['auth'])->name('post.create');

Route::post('/page/storepost', [PostController::class,'store'])->middleware(['auth'])->name('post.store');

Route::get('/page/{id}', [PageController::class,'show'])->middleware(['auth'])->name('page.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
