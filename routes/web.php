<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostsController;

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


Auth::routes();

Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

// Posts
Route::get('/', [PostsController::class, 'index'])->name('home');
Route::get('/create', [PostsController::class, 'create'])->name('create');
