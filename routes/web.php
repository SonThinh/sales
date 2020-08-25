<?php

use Illuminate\Support\Facades\Route;

Route::GET('/', 'HomeController@index')->name('home');
Route::GET('/view-login', 'HomeController@showLogin')->name('view.login');
Route::POST('/login', 'HomeController@postLogin')->name('login');
Route::GET('/logout', 'HomeController@logout')->name('logout');



