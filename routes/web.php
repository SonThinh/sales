<?php

use Illuminate\Support\Facades\Route;

Route::GET('/', 'HomeController@index')->name('home');
Route::group(['middleware' => 'CheckLogin'], function () {
    Route::GET('/view-login', 'HomeController@showLogin')->name('view.login');
    Route::POST('/login', 'HomeController@postLogin')->name('login');
});
Route::group(['middleware' => 'CheckLogout'], function () {
    Route::group(['prefix' => 'view', 'as' => 'view.'], function () {
        Route::GET('/register', 'HomeController@showRegister')
             ->name('create');
        Route::GET('/{id}/edit-user', 'HomeController@showEditUser')
             ->name('edit');
        Route::GET('/{id}/delete-user', 'HomeController@showDeleteUser')
             ->name('delete');
    });
});
Route::GET('/logout', 'HomeController@logout')->name('logout');
