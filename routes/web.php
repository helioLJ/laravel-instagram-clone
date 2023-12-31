<?php

use App\Http\Controllers\FollowsController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfileInfoController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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


Route::get('/profile/{id}', [ProfileController::class, 'show'])->name('profile.show');

Route::post('/follow/{user}', [FollowsController::class, 'store'])->name('follow.store');

Route::get('/', [PostsController::class, 'index'])->name('post.index');
Route::get('/post/create', [PostsController::class, 'create'])->middleware(['auth', 'verified'])->name('post.create');
Route::get('/post/{post}', [PostsController::class, 'show'])->name('post.show');
Route::post('/post', [PostsController::class, 'store'])->name('post.store');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::patch('/profileinfo', [ProfileInfoController::class, 'update'])->name('profileinfo.update');
    Route::post('/profileinfo', [ProfileInfoController::class, 'store'])->name('profileinfo.store');
});

require __DIR__.'/auth.php';
