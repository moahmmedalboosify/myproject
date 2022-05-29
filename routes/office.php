<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;





#######################   login    #####################

Route::get('/office', 'Auth\OfficeLoginController@show_login')->name('office.show.login');
Route::post('/office/login', 'Auth\OfficeLoginController@login')->name('office.login');
Route::get('/office/logout', 'Auth\OfficeLoginController@logout')->name('office.logout');






Route::group(['prefix' => 'office', 'namespace' => 'Office', 'Middleware' => 'Auth:office'], function () {
  
  Route::post('/test', 'roles\testController@store')->name('office.test');

 

  Route::get('home', 'homeController@index')->name('office.home');


  ################  route offers [ show - create - update - delete ]  ####################

  Route::group(['prefix' => 'offers', 'namespace' => 'offers', 'Middleware' => 'Auth:office'], function () {
    Route::get('/test', function () {
      dd (Auth::guard('office')->user()->office_info_id) ;
    });
    Route::get('/add', 'offerController@add_offer')->name('office.add.offer');
    Route::get('/step/one', 'offerController@step_one')->name('office.step_one.offer');
    Route::get('/step/two', 'offerController@step_two')->name('office.step_two.offer');
    Route::get('/step/four/city', 'offerController@step_four_city')->name('office.step_four_city.offer');
    Route::post('/step/final', 'offerController@step_final')->name('office.step_final.offer');
    Route::post('/test', 'offerController@step_final')->name('test');


  });


  ###############  Route employee [ show - create - update - delete ]  المستخدمين

  Route::group(['prefix' => 'users', 'namespace' => 'roles'], function () {

    Route::get('/show', 'employeeController@index')->name('office.show.users');
    Route::get('/create', 'employeeController@create')->name('office.create.users');
    Route::post('/store', 'employeeController@store')->name('office.store.users');
    Route::post('/delete/{id}', 'employeeController@delete')->name('office.delete.users');
    Route::get('/edit/{id}', 'employeeController@edit')->name('office.edit.users');
    Route::post('/update/{id}', 'employeeController@update')->name('office.update.users');
  });


    ###############  Route roles [ show - create - update - delete ]  الصلاحيات

  Route::group(['prefix' => 'roles', 'namespace' => 'roles'], function () {

    Route::get('/show', 'roleController@index')->name('office.show.roles');
  
    Route::post('/create', 'roleController@store')->name('office.store.roles');
    Route::get('/show/single/{id}', 'roleController@show')->name('office.show_single.roles');
    Route::post('/delete/{id}', 'roleController@delete')->name('office.delete.roles');
    Route::get('/edit/{id}', 'roleController@edit')->name('office.edit.roles');
    Route::post('/update/{id}', 'roleController@update')->name('office.update.roles');
  });

});
Route::get('/show/test', 'office\roles\roleController@fetch_data')->name('office.show_ajax.roles');

Route::get('/show/users', 'office\roles\employeeController@fetch_data')->name('office.show_users.roles');