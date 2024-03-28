<?php

use App\Http\Controllers\API\Post\PostAPIController;
use App\Http\Controllers\Views\Main\IndexController;
use App\Http\Controllers\Views\PostView\PostController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::group(['namespace' => 'Main'], function () {
    Route::get('/', [IndexController::class, 'index'])->name('main.index');
});
Route::group(['namespace' => 'Post'], function () {
    Route::get('/Post/Page', [PostController::class, 'page'])->name('post.page');
    Route::get('/Post', [PostController::class, 'create'])->name('post.create');
    Route::get('/Post/MyPosts', [PostController::class, 'myPosts'])->name('post.myPosts');
    Route::delete('/Post/destroy', [PostController::class, 'destroy'])->name('post.destroy');
    Route::post('/Post/Store', [PostController::class, 'store'])->name('post.store');
});
Route::group(['namespace' => 'API/Post'], function () {
    Route::get('/API/Post/GetPosts', [PostAPIController::class, 'getPosts'])->name('postApi.getPosts');
    Route::get('/API/Post/GetMyPosts', [PostAPIController::class, 'getMyPosts'])->name('postApi.getMyPosts');
    Route::post('/API/Post/Store', [PostAPIController::class, 'store'])->name('postApi.store');
    Route::delete('/API/Post/Destroy', [PostAPIController::class, 'destroy'])->name('postApi.destroy');
});