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

Route::get('/', function () { return view('welcome'); });
Route::get('/about', function () { return view('site.about');})->name('about');
Route::get('/terms', function () { return view('site.terms');})->name('terms');

Route::get('/user' , 'Usercontroller@index')->name('user');
Route::get('/user/events' , 'Usercontroller@events')->name('user-events');
Route::get('/user/membership' , 'Usercontroller@membership')->name('user-membership');
Route::get('/user/invoice/{id}' , 'Usercontroller@showInvoice')->name('user-invoice');
Route::get('/user/matches', 'UserController@showMatches')->name('user-matches');

Route::get('/user/all' , 'Usercontroller@all')->name('user.all');
Route::post('/user/update' , 'Usercontroller@update')->name('user.update');
Route::post('/user/store' , 'Usercontroller@store')->name('user.store');

Route::get('/payment/{user}/{type}/{id}' , 'PaymentController@index')->name('payment');
Route::post('/payment/create' , 'PaymentController@create')->name('payment.create');

Route::get('/admin/events', 'EventController@index')->name('events.index');
Route::post('/admin/events/create', 'EventController@store')->name('events.create');
Route::get('/admin/events/show', 'EventController@show')->name('events.show');
Route::get('/admin/events/edit/{id}', 'EventController@edit')->name('events.edit');
Route::post('/admin/events/update', 'EventController@update')->name('events.update');



Route::get('/admin/client', 'UserController@index')->name('client.index');
Route::get('/admin/client/create', 'UserController@store')->name('client.create');
Route::get('/admin/client/edit/{id}', 'UserController@edit')->name('client.edit');
Route::post('/admin/client/update', 'UserController@update')->name('client.update');


Route::get('admin/reports/{type}', 'ReportController@index')->name('reports');

Route::post('admin/report/get', 'ReportController@get')->name('report.get');



Route::get('/admin/bookings/index', 'BookingController@index')->name('booking.index');

Route::get('/send-booking-email','MailSendController@mailsend');
Auth::routes();