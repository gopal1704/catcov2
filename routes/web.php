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

Route::get('/', 'homeController@index');
Route::get('/home', 'homeController@index');
Route::get('/logout', 'homeController@logout');


Route::get('/holdings','holdingsController@index');

Route::get('/placeorder', 'placeorderController@index');
Route::get('/walletpayment', 'walletPaymentController@index');

Route::post('/createinvestment/{type}', 'createInvestment@fromWallet');
Route::post('/gotopayment','placeorderController@selectPayment');


Route::get('/referrals', function () {
    return view('referrals');
});

Route::get('/transactions', 'transactionsController@index');

Route::get('/wallettransfer', function () {
    return view('wallettransfer');
});

Route::get('/withdraw', function () {
    return view('withdraw');
});

Route::get('/test', 'homecontroller@test1');

Route::get('/createprofile', 'createprofile@index');


Auth::routes();

