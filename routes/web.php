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
Route::group(['namespace' => 'Admin'], function () {
    Route::group(['prefix' => 'admin'], function () {
        Route::get('Trangchu.html', [
            'as'=>'trangchu',
            'uses'=>'HomeController@home'
        ]);
        Route::group(['prefix' => 'Product'], function () {
            Route::get('home-product.html', [
                'as'=>'home-product',
                'uses'=>'ProductController@home'
            ]);
        });
        Route::group(['prefix' => 'Category'], function () {
            Route::get('home-category.html', [
                'as'=>'home-category',
                'uses'=>'CategoryController@home'
            ]);
        });
        
    });
    Route::get('logout', [
        'as'=>'logout',
        'uses'=>'HomeController@logout'
    ]);
});
