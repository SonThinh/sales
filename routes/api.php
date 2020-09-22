<?php

use API\UserController;
use API\PostController;
use API\CategoryController;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => 'auth'], function () {
    Route::apiResource('users', UserController::class);
});

Route::apiResource('posts', PostController::class);
Route::apiResource('categories', CategoryController::class);
