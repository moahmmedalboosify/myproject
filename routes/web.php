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

// Route::get('/', function () {
//     return view('client.index');
// });

// Route::get('about','client\AboutPageController@index');
// Route::get('offers','client\AboutPageController@offers')->name('client.offers');

Auth::routes();

Route::get('/', 'client\indexController@index')->name('home');
