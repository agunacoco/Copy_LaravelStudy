<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\LikesController;

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
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
Route::delete('/posts/{post}/image', [PostsController::class, 'deleteImage'])->middleware(['auth']);
Route::resource('/posts', PostsController::class)->middleware(['auth']);
Route::post('/like/{id}',[LikesController::class, 'store'])->middleware(['auth'])->name('like.store');
require __DIR__.'/auth.php';
