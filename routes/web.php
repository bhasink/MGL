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
    return view('main');
});

Route::get('/thankyou', function () {
    return view('thankyou');
});

Route::post('send_otp','registrationController@sendotp'); 
Route::post('submit_data','registrationController@register'); 
Route::post('submit_data1','registrationController@register1');
Route::get('/update/{phone}/{ign}/{tid}','registrationController@update_api');
/* paymoney payment gateway */ 
Route::get('payumoney/{id}','PayumoneyController@payumoneyPayment'); 
Route::post('payumoney/response','PayumoneyController@payumoneyResponse');