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

Route::get('/refresh/header', 'client\indexController@refresh_header')->name('client.refresh_header');



// #####################    contact us   

Route::get('/contact', 'client\indexController@view_contact')->name('client.view_contact');
Route::post('/contact/send', 'client\indexController@contact_send')->name('client.contact_send');



// #####################    about us   

Route::get('/about', 'client\indexController@view_about')->name('client.view_about');


// #####################    offices

Route::get('/offices', 'client\indexController@view_offices')->name('client.view_offices');
Route::get('/offices/search', 'client\indexController@search_offices')->name('client.search_offices');
Route::get('/offices/single/{id}', 'client\indexController@single_office')->name('client.search_single_offices');
Route::get('/offices/view/{id}', 'client\indexController@single_office')->name('client.single_office');


// #####################    offer single
Route::get('/offer/{id}', 'client\indexController@view_offer_single')->name('client.view_offer_single');




// #####################    request preview
Route::get('/send/preview', 'client\indexController@send_preview')->name('client.request_send_preview');



// #####################    request private
Route::get('/view/private/request', 'client\indexController@view_private_request')->name('client.view_private_request');
Route::post('/send/private/request', 'client\indexController@send_private_request')->name('client.send_private_request');


// #####################   My request 

Route::get('/my/request/{id}', 'client\indexController@my_requests')->name('client.myrequests');
Route::get('/delete/request/{id}', 'client\indexController@delete_requests')->name('client.delete_request');
Route::get('/details/request/{id}', 'client\indexController@details_requests')->name('client.details_request');




// #####################   Search  
Route::get('/Search/offer', 'client\indexController@view_offers')->name('client.search_advanced');

