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
    'as' => 'order.',
    'prefix' => 'order',
    'middleware' => 'auth'
], function () {
    Route::get('', 'OrderController@index')->name('index');
    Route::get('{id}', 'OrderController@create')->name('create');
    Route::post('status/{id}', 'OrderController@status')->name('status');
});

