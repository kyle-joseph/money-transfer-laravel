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



Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/send', 'HomeController@send');
Route::get('/receive', 'HomeController@receive');
Route::get('/transactions', 'HomeController@transactions');
Route::get('/transactions/unclaimed', 'TransactionsController@unclaimed');
Route::get('/transactions/claimed', 'TransactionsController@claimed');
Route::get('/transactions/report', 'ReportChartController@index');
Route::get('/transactions/unclaimed/edit/', 'TransactionsController@edit');
Route::post('/transactions/unclaimed/edit/', 'TransactionsController@editSave');
Route::post('/send', 'SendController@saveToDb');
Route::get('/claim', 'ReceiveController@search');
Route::get('/claim/{ctrlNum}', 'ReceiveController@claim');
