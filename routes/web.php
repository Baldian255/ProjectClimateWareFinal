<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ArticleController;  // Add the ArticleController
use App\Http\Controllers\StatisticsController;  // Add the StatisticsController
use App\Http\Controllers\GalleryController;  // Add the GalleryController
use App\Http\Controllers\MapController;  // Add the MapController
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

// Arahkan root URL ke daftar postingan
Route::get('/', [PostController::class, 'index'])->name('home');

// Rute untuk manajemen postingan
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::put('/posts/{id}', [PostController::class, 'update'])->name('posts.update');
Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');

// Routes for Articles, Statistics, Gallery, and Map
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/articles', [ArticleController::class, 'index'])->name('articles');
Route::get('/statistics', [StatisticsController::class, 'index'])->name('statistics');
Route::get('/gallery', [GalleryController::class, 'showGallery'])->name('gallery');
Route::get('/map', [MapController::class, 'index'])->name('map');
Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');  

Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminController::class, 'login']);
    Route::middleware('auth:admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');
        Route::get('/', [PageController::class, 'home'])->name('home');
        Route::get('/articles', [ArticleController::class, 'index'])->name('articles');
        Route::get('/statistics', [StatisticsController::class, 'index'])->name('statistics');
        Route::get('/gallery', [GalleryController::class, 'showGallery'])->name('gallery');
        Route::get('/map', [MapController::class, 'index'])->name('map');
        Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');
        Route::get('/admin/users', [AdminController::class, 'index'])->name('admin.users');
        Route::delete('/admin/users/{id}', [AdminController::class, 'destroy'])->name('admin.delete.user');
    });
});