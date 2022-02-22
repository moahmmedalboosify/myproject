<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;



Route::get('/test', function(){
  return view('office.offers.createoffer');
});
Route::get('/temp', function(){
  return view('office.buttons');
});

Route::get('/office','Auth\OfficeLoginController@show_login')->name('office.show.login');
Route::get('/office/login','Auth\OfficeLoginController@login')->name('office.login');
Route::get('/office/logout','Auth\OfficeLoginController@logout')->name('office.logout');



Route::group(['prefix'=>'office','namespace'=>'Office' , 'Middleware' => 'Auth:office'], function(){


      Route::get('home', 'homeController@index')->name('office.home');


      Route::get('profile/show', 'setting\profileSettingController@index')->name('office.profile');


  



      
  });


?>