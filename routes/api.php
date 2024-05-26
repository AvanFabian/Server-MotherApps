<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\SportsActivityController;
use App\Http\Controllers\ActivityRecordController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
// Public routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Protected Routes
Route::group(['middleware' => ['auth:sanctum']], function() {

    // User
    Route::get('/user', [AuthController::class, 'user']);
    Route::put('/user', [AuthController::class, 'update']);
    Route::post('/logout', [AuthController::class, 'logout']);

    // Post
    Route::get('/posts', [PostController::class, 'index']); // all posts
    Route::post('/posts', [PostController::class, 'store']); // create post
    Route::get('/posts/{id}', [PostController::class, 'show']); // get single post
    Route::put('/posts/{id}', [PostController::class, 'update']); // update post
    Route::delete('/posts/{id}', [PostController::class, 'destroy']); // delete post

    // Comment
    Route::get('/posts/{id}/comments', [CommentController::class, 'index']); // all comments of a post
    Route::post('/posts/{id}/comments', [CommentController::class, 'store']); // create comment on a post
    Route::put('/comments/{id}', [CommentController::class, 'update']); // update a comment
    Route::delete('/comments/{id}', [CommentController::class, 'destroy']); // delete a comment

    // Like
    Route::post('/posts/{id}/likes', [LikeController::class, 'likeOrUnlike']); // like or dislike back a post

    // Sports Activities
    // Route::get('/sports_activities', [SportsActivityController::class, 'index']); // all sports activities
    Route::post('/sports_activities', [SportsActivityController::class, 'store']); // create sports activity
    Route::get('/sports_activities/{id}', [SportsActivityController::class, 'show']); // get single sports activity
    Route::put('/sports_activities/{id}', [SportsActivityController::class, 'update']); // update sports activity
    Route::delete('/sports_activities/{id}', [SportsActivityController::class, 'destroy']); // delete sports activity

    // Sports Activities by name and movements
    Route::get('/sports_activities', [SportsActivityController::class, 'getByName']);
    Route::get('/sport_movements', [SportsActivityController::class, 'getMovementsByActivityName']);

    // Activity Records
    Route::get('/activity_records', [ActivityRecordController::class, 'index']); // all activity records
    Route::post('/activity_records', [ActivityRecordController::class, 'store']); // create activity record
    Route::get('/activity_records/{id}', [ActivityRecordController::class, 'show']); // get single activity record
    Route::put('/activity_records/{id}', [ActivityRecordController::class, 'update']); // update activity record
    Route::delete('/activity_records/{id}', [ActivityRecordController::class, 'destroy']); // delete activity record
});