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

Route::get('admin/list', 'InfoController@index')->name('admin.list');
Route::get('register/{token?}', 'InfoController@create')->name('register.create')->middleware(CheckToken::class);
Route::post('register/{token}', 'InfoController@store')->name('register.store')->middleware(CheckToken::class);
Route::get('admin/show/{info}', 'InfoController@show')->name('admin.show');
Route::get('admin/list/export', 'InfoController@export')->name('admin.export');
Route::get('admin/register', 'InfoController@admin')->name('admin.register');
Route::post('admin/register', 'InfoController@register')->name('admin.register');
Route::get('admin/subscribers', 'InfoController@getSubscribers')->name('admin.subscribers');
Route::get('admin/emails', 'InfoController@getEmailList')->name('admin.emails.get');
Route::post('admin/emails', 'InfoController@addEmail')->name('admin.emails.post');
Route::delete('admin/emails', 'InfoController@removeEmail')->name('admin.email.delete');
Route::get('admin/addUser', 'InfoController@getFormAddUser')->name('admin.addUser');
Route::post('admin/addUser', 'InfoController@addUser')->name('admin.addUser');
Route::get('admin/users', 'InfoController@users')->name('admin.users');
Route::delete('admin/users', 'InfoController@removeUser')->name('admin.removeUser');

Auth::routes();


