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

//rutas INDEX
Route::get('/','indexController@index');
Route::resource('admin/employees','employeesController');
Route::get('auth/login','authController@showLogin')->middleware('authentication');
Route::post('auth/login','authController@login')->middleware('authentication');
Route::get('auth/logout','authController@logout');
Route::get('search/{name}','indexController@searchEmployee');
