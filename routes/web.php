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
Auth::routes();
Route::get('/', 'HomeController@index')->name('home');
Route::get('admin/home', 'HomeController@adminHome')->name('admin.home')->middleware('is_admin');
// Route::resource('admin/users','AdminUsersController')->middleware('is_admin');
// Route::resource('admin/citys','AdminCityController')->middleware('is_admin');
Route::group(['middleware' => ['auth','is_admin']], function () { 
    Route::resource('admin/users','Admin\AdminUsersController')->middleware('is_admin');
    Route::resource('admin/citys','Admin\AdminCityController')->middleware('is_admin');
});