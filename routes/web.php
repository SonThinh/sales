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
        'middleware' => ['CheckLogout', 'role:admin'],
    ], function () {
        Route::resource('users', UserController::class)->only([
            'create',
            'edit',
        ]);
        Route::get('users/{id}/delete', 'UserController@delete');
    });
    Route::get('/logout', 'HomeController@logout')->name('logout');
});

