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
Route::get('/user/events' , 'Usercontroller@events')->name('user-events');
Route::get('/user/membership' , 'Usercontroller@membership')->name('user-membership');
Route::get('/user/invoice/{id}' , 'Usercontroller@showInvoice')->name('user-invoice');

Route::get('/user/all' , 'Usercontroller@all')->name('user.all');
Route::post('/user/update' , 'Usercontroller@update')->name('user.update');
Route::post('/user/store' , 'Usercontroller@store')->name('user.store');

Route::get('/payment/{user}/{type}/{id}' , 'PaymentController@index')->name('payment');
Route::post('/payment/create' , 'PaymentController@create')->name('payment.create');

Route::get('/admin/events', 'EventController@index')->name('events.index');
Route::post('/admin/events/create', 'EventController@store')->name('events.create');
Route::get('/admin/events/all', 'EventController@all')->name('events.all');


Route::get('/admin/client', 'UserController@index')->name('client.index');
Route::post('/admin/client/create', 'UserController@store')->name('client.create');

Route::get('/admin/bookings/index', 'BookingController@index')->name('booking.index');

Route::get('/sendmail','MailSendController@mailsend');
Auth::routes();
