<?php

use App\Http\Controllers\API\Auth\AuthController;
use App\Http\Controllers\API\Post\PostController;
use App\Http\Controllers\API\User\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user2', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/auth/register', [AuthController::class, 'register']);
Route::post('/auth/login', [AuthController::class, 'login']);
Route::get('/auth/user', [AuthController::class, 'me']);
Route::post('/auth/logout', [AuthController::class, 'logout']);
Route::post('/auth/refresh', [AuthController::class, 'refresh']);

Route::get('/post/getmyposts', [PostController::class, 'getMainPost'])->name('post.getMyPosts');
Route::get('/post/getpostbyuser', [PostController::class, 'getPostByUser'])->name('post.getPostByUser');
Route::get('/post/getpostbyhash', [PostController::class, 'getPostByHash'])->name('post.getPostByHash');
Route::get('/post', [PostController::class, 'getById'])->name('post.getById');
Route::delete('/post/destroy', [PostController::class, 'destroy'])->name('post.destroy');
Route::post('/post/store', [PostController::class, 'store'])->name('post.store');


Route::post('/user/subscribeuser', [UserController::class, 'subscribeUser']);
Route::post('/user/unsubscribeuser', [UserController::class, 'unSubscribeUser']);