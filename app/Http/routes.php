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

Route::group(['prefix' => 'ajax', 'namespace' => 'Ajax'], function () {
    Route::get('home/eqStatus', 'HomeController@eqStatus');
    Route::get('home/eqRate', 'HomeController@eqRate');
    Route::get('home/labStatus', 'HomeController@labStatus');
    Route::get('home/userStatus', 'HomeController@userStatus');
    Route::get('home/ranking', 'HomeController@ranking');
    Route::get('home/newReserve', 'HomeController@newReserve');
});

