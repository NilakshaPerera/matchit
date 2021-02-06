<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/user' , 'Usercontroller@index')->name('user');
Route::post('/user/update' , 'Usercontroller@update')->name('user.update');
Route::post('/user/store' , 'Usercontroller@store')->name('user.store');

Route::get('/admin/events', 'EventController@index')->name('events.index');
Route::post('/admin/events/create', 'EventController@store')->name('events.create');

Route::get('/admin/client', 'UserController@index')->name('client.index');
Route::post('/admin/client/create', 'UserController@store')->name('client.create');

Auth::routes();
