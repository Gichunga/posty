<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function(){
    return view('welcome');
});

//Dashboard
Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

// Posts
// Route::resource('posts', PostsController::class);
Route::get('/posts', [PostsController::class, 'index'])->name('posts.index');
Route::post('/posts', [PostsController::class, 'store'])->name('posts.store')->middleware('auth');
Route::get('/posts/create', [PostsController::class, 'create'])->name('posts.create')->middleware('auth');
Route::get('/posts/{post}', [PostsController::class, 'show'])->name('posts.show');
Route::patch('/posts/{post}', [PostsController::class, 'update'])->name('posts.update')->middleware('auth');
Route::delete('/posts/{post}', [PostsController::class, 'destroy'])->name('posts.destroy')->middleware('auth');
Route::get('/posts/{post}/edit', [PostsController::class, 'edit'])->name('posts.edit')->middleware('auth');
