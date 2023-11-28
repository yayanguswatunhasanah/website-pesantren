<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\VideoController;
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

Route::get('/', [AppController::class, 'index']);
Route::get('/berita', [AppController::class, 'berita']);
Route::get('/berita/{slug}', [AppController::class, 'detail']);

Route::get('/foto', function () {
    return view('foto.foto');
});

Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'autenticate']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');

Route::get('/blog', [BlogController::class, 'index'])->middleware('auth')->name('blog.index');
Route::get('/blog/create', [BlogController::class, 'create'])->middleware('auth')->name('blog.create');
Route::post('/blog', [BlogController::class, 'store'])->middleware('auth')->name('blog.store');
Route::get('/blog/{id}/edit', [BlogController::class, 'edit'])->middleware('auth')->name('blog.edit');
Route::put('/blog/{id}', [BlogController::class, 'update'])->middleware('auth')->name('blog.update');
Route::delete('/blog/{id}', [BlogController::class, 'destroy'])->middleware('auth')->name('blog.destroy');

Route::get('/photo', [PhotoController::class, 'index'])->middleware('auth')->name('photo.index');
Route::post('/photo/create', [PhotoController::class, 'store'])->middleware('auth')->name('photo.store');
Route::put('/photo/{id}/update', [PhotoController::class, 'update'])->middleware('auth')->name('photo.update');
Route::delete('/photo/{id}', [PhotoController::class, 'destroy'])->middleware('auth')->name('photo.destroy');

Route::get('/video', [VideoController::class, 'index'])->middleware('auth')->name('video.index');
Route::post('/video/create', [VideoController::class, 'store'])->middleware('auth')->name('video.store');
Route::put('/video/{id}/update', [VideoController::class, 'update'])->middleware('auth')->name('video.update');
Route::delete('/video/{id}', [VideoController::class, 'destroy'])->middleware('auth')->name('video.destroy');
