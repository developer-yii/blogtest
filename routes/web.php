<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlogsController;

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

// frrontend routes start
Route::get('/', [FrontController::class, 'index']);
Route::get('/post/{id}', [FrontController::class, 'single_post']);
// frrontend routes end

// backend routes start

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

// blogs routes
Route::get('/blogs', [BlogsController::class, 'index'])->name('blogs');
Route::get('/blogs/list', [BlogsController::class, 'getData'])->name('blogs.list');
Route::post('/blogs/store', [BlogsController::class, 'store'])->name('blogs.store');
Route::get('/blogs/get', [BlogsController::class, 'detail'])->name('blogs.detail');
Route::post('/blogs/update', [BlogsController::class, 'update'])->name('blogs.update');
Route::post('/blogs/delete', [BlogsController::class, 'delete'])->name('blogs.delete');


// backend routes end