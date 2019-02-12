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

use App\Http\Middleware\CheckToken;

Route::get('list', 'InfoController@index')->name('info.index');
Route::get('register/{token?}', 'InfoController@create')->name('info.create')->middleware(CheckToken::class);
Route::post('register/{token}', 'InfoController@store')->name('info.store')->middleware(CheckToken::class);
Route::get('show/{info}', 'InfoController@show')->name('info.show');
Route::get('list/export', 'InfoController@export')->name('info.export');
Route::get('admin/register', 'InfoController@admin')->name('info.admin');
Route::post('admin/register', 'InfoController@register')->name('info.admin');
Route::get('admin/list', 'InfoController@getUsersList')->name('users.list');

Auth::routes();


