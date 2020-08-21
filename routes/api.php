<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
    Route::GET('/', 'UserController@show');
    Route::GET('/{id}', 'UserController@showInfo');
    Route::POST('/register', 'UserController@create');
    Route::PUT('/update/{id}', 'UserController@update');
    Route::DELETE('/delete/{id}', 'UserController@delete');
});

Route::group(['prefix' => 'post', 'as' => 'post.'], function () {
    Route::GET('/', 'PostController@show');
    Route::GET('/{id}', 'PostController@showDetail');
    Route::POST('/create', 'PostController@create');
    Route::PUT('/update/{id}', 'PostController@update');
    Route::DELETE('/delete/{id}', 'PostController@delete');
});
