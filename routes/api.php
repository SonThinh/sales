<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
    Route::group(['middleware' => 'auth'], function () {
        Route::GET('/', 'UserController@show')->name('show');
        Route::GET('/{id}', 'UserController@showInfo');
        Route::POST('/register', 'UserController@store')->name('create');
        Route::PUT('/{id}/update', 'UserController@update')->name('edit');
        Route::DELETE('/{id}/delete', 'UserController@delete')->name('delete');

        Route::group(['prefix' => 'posts', 'as' => 'posts.'], function () {
            Route::GET('/', 'PostController@show');
            Route::GET('/{id}', 'PostController@showDetail');
            Route::POST('/create', 'PostController@store');
            Route::PUT('/{id}/update', 'PostController@update');
            Route::DELETE('/{id}/delete', 'PostController@delete');
        });
    });
});
