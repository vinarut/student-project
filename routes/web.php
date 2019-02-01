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

Route::get('/', function () {
    return view('form');
});

Route::resource('info', 'InfoController');
Route::get('export', 'InfoController@export')->name('info.export');

//Route::get('info', 'InfoController@index');
//Route::post('info', 'InfoController@store');

Auth::routes();


