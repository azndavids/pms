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
    return view('welcome');
});

Route::get('login', function () {
    return view('login');
});

Route::get('create', function () {
    return view('create');
});

Route::get('registration', function () {
    return view('registration');
});

Route::get('update', function () {
    return view('update');
});

Route::get('performance', function () {
    return view('performance');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/create', 'TicketController@create')->name('ticket.create');
Route::post('/update', 'TicketController@update')->name('ticket.update');
Route::post('/add', 'TicketController@add')->name('remark.add');


Route::get('/remarks/{ticket}', 'TicketController@remarks')->name('ticket.remarks');
Route::get('/edit/{ticket}', 'TicketController@edit')->name('ticket.edit');



Route::resource('tickets','TicketController');
Route::resource('remarks','RemarkController');

Auth::routes();
