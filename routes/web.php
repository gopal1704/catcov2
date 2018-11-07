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

// Route::get('/', function () {
//     return view('maintenance');
// });
Route::get('/', 'homeController@index');

Route::get('/home', 'homeController@index');
Route::get('/homem/{message}', 'homeController@message')->name('home');
Route::get('/logout', 'homeController@logout');


Route::get('/holdings','holdingsController@index');

Route::get('/placeorder', 'placeorderController@index');
Route::get('/walletpayment', 'walletPaymentController@index');

Route::post('/createinvestment/{type}', 'createInvestment@fromWallet');
Route::post('/gotopayment','placeorderController@selectPayment');


Route::get('/referrals', 'referral@index');

Route::get('/transactions', 'transactionsController@index');

Route::get('/wallettransfer', function () {
    return view('wallettransfer');
});

///wallet transfer otp
Route::post('/wtotp','walletTransferController@sendOtp');

Route::post('/wtprocess','walletTransferController@processtransfer');

Route::get('/withdraw', function () {
    return view('withdraw');
});

Route::get('/test', 'homecontroller@testreturns');

Route::get('/createprofile', 'createprofile@index');
Route::post('/saveprofile','createprofile@save');

//withdrawal
Route::get('/withdraw', 'withdrawController@index');
Route::post('/withdrawsubmit', 'withdrawController@selectwithdrawalmethod');


Auth::routes();

//registration routes


Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

