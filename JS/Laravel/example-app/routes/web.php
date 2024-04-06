<?php


use App\Http\Controllers\API\Post\PostAPIController;
use App\Http\Controllers\API\User\UserController;
use App\Http\Controllers\AuthController;
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

});

Route::group(['namespace' => 'api/user'], function () {
    Route::get('/api/user/getusers', [UserController::class, 'getUsers'])->name('user.getUsers');
    Route::get('/api/user', [UserController::class, 'getUserById'])->name('user.getUserById');
    Route::post('/test', function () {
        $a = 5;
        return $a;
    });
});