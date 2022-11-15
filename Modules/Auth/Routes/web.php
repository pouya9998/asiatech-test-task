<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group([
    'as' => 'auth.'
], function () {

    // Routes for register
    Route::group([
        'as' => 'register.',
        'prefix' => 'register'
    ], function () {
        Route::get('', 'AuthController@register')->name('index');
        Route::post('', 'AuthController@registerAction')->name('action');
    });

    // Routes for login
    Route::group([
        'as' => 'login.',
        'prefix' => 'login'
    ], function () {
        Route::get('', 'AuthController@login')->name('index');
        Route::post('', 'AuthController@loginAction')->name('action');
    });

    Route::get('logout', 'AuthController@logout')->name('logout');

});
