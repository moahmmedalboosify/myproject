<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;



Route::get('/test', function(){
  return view('office.form-validation');
});
Route::get('/temp', function(){
  return view('office.buttons');
});


                 #######################   login    #####################

Route::get('/office','Auth\OfficeLoginController@show_login')->name('office.show.login');
Route::get('/office/login','Auth\OfficeLoginController@login')->name('office.login');
Route::get('/office/logout','Auth\OfficeLoginController@logout')->name('office.logout');



Route::group(['prefix'=>'office','namespace'=>'Office' , 'Middleware' => 'Auth:office'], function(){


      Route::get('home', 'homeController@index')->name('office.home');


          ################  route offers [ show - create - update - delete ]  ####################

          Route::group(['prefix'=>'offers','namespace'=>'offers'], function(){
                
            Route::get('/step-one','offerController@show_step_one')->name('offers.step-one');
            Route::post('/step-one','offerController@check_step_one')->name('check.step-one');

            Route::get('/step-two','offerController@show_step_two')->name('offers.step-two');
            Route::post('/step-two','offerController@check_step_two')->name('check.step.two');
 
          });



     
     
 
});
