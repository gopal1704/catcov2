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
Route::get('/', function () {
    return view('homepage.mainpage');
});

Route::get('/about', function () {
    return view('homepage.about');
});

Route::get('/invest', function () {
    return view('homepage.invest');
});

Route::get('/tc', function () {
    return view('homepage.terms');
});


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

Route::get('/changepassword',      function () {   
     return view('auth.changepassword');
    
    });
Route::post('/cp','homeController@changePassword');

Route::get('/createprofile', 'createprofile@index');
Route::post('/saveprofile','createprofile@save');

//withdrawal
Route::get('/withdraw', 'withdrawController@index');
Route::post('/withdrawsubmit', 'withdrawController@selectwithdrawalmethod');
Route::post('/processwithdraw', 'withdrawController@processWithdraw');


//profile
Route::get('/viewprofile', 'createprofile@viewProfile');
Route::post('/editprofile', 'createprofile@goToEditProfile');



Auth::routes();

//registration routes


Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

