<?php

use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FollowsController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');
});

Route::controller(FollowsController::class)->group(function () {
    Route::post('follow' , 'follow');
    Route::post('unfollow' , 'destroy');
});

Route::controller(LikeController::class)->group(function () {
    Route::post('like' , 'like');
    Route::post('unlike' , 'destroy');
});

Route::controller(PostController::class)->group(function(){
    Route::post('post','createPost');
    Route::get('get_feed', 'getFeedPosts');
});

Route::controller(CommentController::class)->group(function(){
    Route::post('comment','comment');
    Route::post('get_post_comments','getPostComments');
    Route::post('delete_comment','destroy');
});

Route::controller(UserController::class)->group(function(){
    Route::get('get_follow_suggestions','suggestions');
    Route::get('get_user','getUser');
    Route::post('update_user','updateUser');
});