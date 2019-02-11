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

//Route::resource('info', 'InfoController');

Route::get('list', 'InfoController@index')->name('info.index');
Route::get('/{token?}', 'InfoController@create')->name('info.create');
Route::post('/{token}', 'InfoController@store')->name('info.store');
Route::get('info/{info}', 'InfoController@show')->name('info.show');
Route::get('list/export', 'InfoController@export')->name('info.export');
Route::get('admin/register', 'InfoController@admin')->name('info.admin');
Route::post('admin/register', 'InfoController@register')->name('info.admin');
Route::get('admin/list', 'InfoController@getUsersList');

Auth::routes();


