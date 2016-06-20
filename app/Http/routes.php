<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@index');
Route::get('/login', 'Auth\AuthController@getLogin');
Route::post('/login', 'Auth\AuthController@postLogin');
Route::get('/logout', 'Auth\AuthController@getLogout');

Route::group(['prefix' => 'ajax', 'namespace' => 'Ajax'], function () {
    Route::get('home/eqStatus', 'HomeController@eqStatus');
    Route::get('home/eqRate', 'HomeController@eqRate');
    Route::get('home/labStatus', 'HomeController@labStatus');
    Route::get('home/userStatus', 'HomeController@userStatus');
    Route::get('home/ranking', 'HomeController@ranking');
    Route::get('home/newReserve', 'HomeController@newReserve');

    Route::get('image/delete/{id}', [
        'middleware' => 'auth',
        'use' => 'ImageController@delete'
    ]);
    Route::get('user/delete/{id}', [
        'middleware' => 'auth',
        'use' => 'UserController@delete'
    ]);
    Route::get('link/delete/{id}', [
        'middleware' => 'auth', 
        'use' => 'LinkController@delete'
    ]);
});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth'], function () {
    Route::get('/', 'IndexController@user');
    Route::get('user', 'IndexController@user');
    Route::get('image', 'IndexController@image');
    Route::get('link', 'IndexController@link');
});

Route::group(['prefix' => 'user', 'namespace' => 'Admin', 'middleware' => 'auth'], function () {
    Route::get('add', 'UserController@add');
    Route::post('add', 'UserController@postAdd');
    Route::post('delete', 'UserController@postDelete');
    Route::get('update/{id}', 'UserController@update');
    Route::post('update', 'UserController@postUpdate');
});

Route::group(['prefix' => 'image', 'namespace' => 'Admin', 'middleware' => 'auth'], function () {
    Route::get('add', 'ImageController@add');
    Route::post('add', 'ImageController@postAdd');
    Route::post('delete', 'ImageController@postDelete');
});

Route::group(['prefix' => 'link', 'namespace' => 'Admin', 'middleware' => 'auth'], function () {
    Route::get('add', 'LinkController@add');
    Route::post('add', 'LinkController@postAdd');
    Route::post('delete', 'LinkController@postDelete');
});
