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


Route::get('/offers', 'client\indexController@view_offers')->name('view.offers');


Route::get('/offers/search/simple', 'client\indexController@view_offers')->name('client.search_simple_ajax');




// #####################    login  new account and sigin

Route::post('/login/registration', 'Auth\clientLoginController@registration')->name('client.registration');

Route::get('/login', 'Auth\clientLoginController@loginClient')->name('client.login');

Route::get('/logout', 'Auth\clientLoginController@logoutClient')->name('client.logout');



// #####################    contact us   

Route::get('/contact', 'client\indexController@view_contact')->name('client.view_contact');
Route::post('/contact/send', 'client\indexController@contact_send')->name('client.contact_send');



// #####################    about us   

Route::get('/about', 'client\indexController@view_about')->name('client.view_about');


// #####################    offices

Route::get('/offices', 'client\indexController@view_offices')->name('client.view_offices');
Route::get('/offices/search', 'client\indexController@search_offices')->name('client.search_offices');
Route::get('/offices/view/{id}', 'client\indexController@single_office')->name('client.single_office');


