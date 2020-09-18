<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
    Route::group(['middleware' => 'auth'], function () {
        Route::get('/', 'UserController@show')->name('show');
        Route::get('/{id}', 'UserController@showInfo');
        Route::post('/register', 'UserController@store')->name('create');
        Route::put('/{id}/update', 'UserController@update')->name('edit');
        Route::delete('/{id}/delete', 'UserController@delete')->name('delete');

        Route::group(['prefix' => 'posts', 'as' => 'posts.'], function () {
            Route::get('/', 'PostController@show');
            Route::get('/{id}', 'PostController@showDetail');
            Route::post('/create', 'PostController@store');
            Route::put('/{id}/update', 'PostController@update');
            Route::delete('/{id}/delete', 'PostController@delete');
        });
    });
});
