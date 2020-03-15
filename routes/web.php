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
// ------------
// frontend
Route::group(['namespace' => 'frontend'], function () {
    //------
    // home frontend
    Route::get('/', [
        'as'=>'home',
        'uses'=>'homeController@home'
    ]);
    Route::get('test', 'homeController@test');
});
// -- end frontend
// ----------
// test pass
Route::get('pass', function () {
    echo bcrypt(123456);
});
// -- end test pass --
// -------
// Backend
Route::group(['namespace' => 'Admin'], function () {
    // master
    Route::group(['prefix' => 'admin','middleware'=>'LoginAdmin'], function () {
        // home backend
        Route::get('Trangchu.html', [
            'as'=>'trangchu',
            'uses'=>'HomeController@home'
        ]);
        Route::get('/', [
            'as'=>'trangchu',
            'uses'=>'HomeController@home'
        ]);
        // -- end home backend
        // -----------
        // product
        Route::group(['prefix' => 'Product'], function () {
            Route::get('home-product.html', [
                'as'=>'home-product',
                'uses'=>'ProductController@home'
            ]);
            Route::get('/', [
                'as'=>'home-product',
                'uses'=>'ProductController@home'
            ]);
            Route::get('add-product.html', [
                'as'=>'add-product',
                'uses'=>'ProductController@add'
            ]);
            Route::post('add-product.html', [
                'as'=>'add-product',
                'uses'=>'ProductController@go_add'
            ]);
            Route::post('edit-product.html', [
                'as'=>'go-edit-product',
                'uses'=>'ProductController@go_edit'
            ]);
            Route::get('edit-product.html/{id}', [
                'as'=>'edit-product',
                'uses'=>'ProductController@edit'
            ]);
            Route::get('delete-product/{id}', [
                'as'=>'delete-product',
                'uses'=>'ProductController@delete'
            ]);
        });
        // -- end Product
        // -----------
        // Category
        Route::group(['prefix' => 'Category'], function () {
            Route::get('home-category.html', [
                'as'=>'home-category',
                'uses'=>'CategoryController@home'
            ]);

            Route::get('add-category.html', [
                'as'=>'add-category',
                'uses'=>'CategoryController@add'
            ]);
            Route::post('add-category.html', [
                'as'=>'add-category',
                'uses'=>'CategoryController@go_add'
            ]);
            Route::get('edit-category.html', [
                'as'=>'edit-category',
                'uses'=>'CategoryController@edit'
            ]);

        });
        // -- end Category
        //-- 
        // -- type-Info
        Route::group(['prefix' => 'type'], function () {
            Route::get('home-type.html', [
                'as'=>'home-type',
                'uses'=>'TypeController@home'
            ]);
        });

    });
    //--- Login and logout
    Route::get('logout', [
        'as'=>'logout',
        'uses'=>'HomeController@logout'
    ]);
    Route::get('login', [
        'as'=>'login',
        'uses'=>'HomeController@login'
    ]);
    Route::post('login', [
        'as'=>'login',
        'uses'=>'HomeController@PostLogin'
    ]);
    // end login and logout
});
