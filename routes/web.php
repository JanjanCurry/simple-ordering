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

Route::get('/', 'OrderController@order');
Route::get('/all-orders', 'OrderController@all_order');
Route::get('/get-by-order', 'OrderController@get_by_order');
Route::post('/save_order', 'OrderController@save_order');
