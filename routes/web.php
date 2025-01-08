<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;


Route::get('/', function () {
    return view('welcome');
});

/**
 * @path /users
 * @method GET
 */
Route::get('/users', [\App\Http\Controllers\UserController::class, 'index']);

/**
 * @path /posts
 * @method GET
 */
Route::get('/posts', [\App\Http\Controllers\PostController::class, 'index']);
Route::post('/comment', [CommentController::class, 'store'])->name('comment.store');