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

Route::get('/about', function () {
    return view('site.about');
})->name('about');

Route::get('/terms', function () {
    return view('site.terms');
})->name('terms');

Route::get('/user', 'Usercontroller@index')->name('user');
Route::post('/user/update', 'Usercontroller@update')->name('user.update');

Route::middleware(['auth', 'client.user'])->prefix('/user')->group(function () {

    Route::get('/events', 'Usercontroller@events')->name('user-events');
    Route::get('/membership', 'Usercontroller@membership')->name('user-membership');
    Route::get('/invoice/{id}', 'Usercontroller@showInvoice')->name('user-invoice');
    Route::get('/matches', 'UserController@showMatches')->name('user-matches');
    Route::post('/store', 'Usercontroller@store')->name('user.store');

    Route::get('/payment/{user}/{type}/{id}', 'PaymentController@index')->name('payment');
    Route::post('/payment/create', 'PaymentController@create')->name('payment.create');

});

Route::middleware(['auth', 'admin.user'])->prefix('/admin')->group(function () {

    Route::get('/eventtype', 'EventTypeController@index')->name('eventtype.index');
    Route::post('/eventtype/create', 'EventTypeController@store')->name('eventtype.create');
    Route::get('/eventtype/edit/{id}', 'EventTypeController@edit')->name('eventtype.edit');
    Route::post('/eventtype/update', 'EventTypeController@update')->name('eventtype.update');

    Route::get('/personality', 'PersonalityDetailController@index')->name('personality.index');
    Route::post('/personality/create', 'PersonalityDetailController@store')->name('personality.create');
    Route::get('/personality/edit/{id}', 'PersonalityDetailController@edit')->name('personality.edit');
    Route::post('/personality/update', 'PersonalityDetailController@update')->name('personality.update');

    Route::get('/hobby', 'HobbiesController@index')->name('hobby.index');
    Route::post('/hobby/create', 'HobbiesController@store')->name('hobby.create');
    Route::get('/hobby/edit/{id}', 'HobbiesController@edit')->name('hobby.edit');
    Route::post('/hobby/update', 'HobbiesController@update')->name('hobby.update');

    Route::get('/events', 'EventController@index')->name('events.index');
    Route::post('/events/create', 'EventController@store')->name('events.create');
    Route::get('/events/show', 'EventController@show')->name('events.show');
    Route::get('/events/edit/{id}', 'EventController@edit')->name('events.edit');
    Route::post('/events/update', 'EventController@update')->name('events.update');


    Route::get('/user/all', 'Usercontroller@all')->name('user.all');
    Route::get('/client', 'UserController@index')->name('client.index');
    Route::get('/client/create', 'UserController@store')->name('client.create');
    Route::get('/client/edit/{id}', 'UserController@edit')->name('client.edit');
    Route::post('/client/update', 'UserController@update')->name('client.update');

    Route::get('/reports/{type}', 'ReportController@index')->name('reports');
    Route::post('/report/get', 'ReportController@get')->name('report.get');

    Route::get('/bookings/index', 'BookingController@index')->name('booking.index');
});

Auth::routes();
