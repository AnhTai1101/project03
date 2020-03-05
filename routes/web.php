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
Route::group(['namespace' => 'frontend'], function () {
    Route::get('/', [
        'as'=>'home',
        'uses'=>'homeController@home'
    ]);
    Route::get('test', 'homeController@test');
});
Route::get('pass', function () {
    echo bcrypt(123);
});
