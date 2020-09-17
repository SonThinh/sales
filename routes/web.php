<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect(app()->getLocale());
});

Route::group([
    'prefix'     => '{locale}',
    'where'      => ['locale' => '[a-zA-Z]{2}'],
    'middleware' => 'setLocale',
], function () {
    Route::get('/', 'HomeController@index')->name('home');

    Route::group(['middleware' => 'CheckLogin'], function () {
        Route::get('/view-login', 'HomeController@showLogin')
             ->name('view.login');
        Route::post('/login', 'HomeController@postLogin')->name('login');
    });

    Route::group([
        'prefix'     => 'view',
        'as'         => 'view.',
        'middleware' => ['CheckLogout', 'role:admin'],
    ], function () {
        Route::get('/register', 'HomeController@showRegister')
             ->name('create');
        Route::get('/{id}/edit-user', 'HomeController@showEditUser')
             ->name('edit');
        Route::get('/{id}/delete-user', 'HomeController@showDeleteUser')
             ->name('delete');
    });

    Route::get('/logout', 'HomeController@logout')->name('logout');
});

