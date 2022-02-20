<?php
use Illuminate\Support\Facades\Route;

Route::get('/office','Auth\OfficeLoginController@show_login')->name('office.show.login');
Route::get('/office/login','Auth\OfficeLoginController@login')->name('office.login');
Route::get('/office/logout','Auth\OfficeLoginController@logout')->name('office.logout');



Route::group(['prefix'=>'office','namespace'=>'Office'], function(){


      Route::get('home', 'homeController@index')->name('office.home');


      Route::get('profile/show', 'setting\profileSettingController@index')->name('office.profile');



      
  });


?>