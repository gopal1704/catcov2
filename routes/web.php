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


Route::get('/home', 'homeController@index')->middleware('verified');
Route::get('/homem/{message}', 'homeController@message')->name('home');
Route::get('/logout', 'homeController@logout');


Route::get('/holdings','holdingsController@index');

Route::get('/placeorder', 'placeorderController@index');
Route::get('/walletpayment', 'walletPaymentController@index');

Route::post('/createinvestment/{type}', 'createInvestment@fromWallet');
Route::post('/gotopayment','placeorderController@selectPayment');


Route::get('/referrals', 'referral@index');

Route::get('/referralsviewinv', 'referral@viewinv');
Route::get('/referralsviewlevel', 'referral@viewlevel');

Route::get('/transactions', 'transactionsController@index');

Route::get('/wallettransfer', function () {
    return view('wallettransfer');
});
Route::get('/bplan', function () {
    return view('bplan');
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

Route::get('/editprofile', 'createprofile@goToEditProfile');
Route::get('/mailtest', 'homeController@mailtest');

Route::post('/editprofiles', 'createprofile@processEdit');
Route::post('/editprofileadmin', 'adminController@processEdit');


Auth::routes();
Auth::routes(['verify' => true]);


//registration routes


Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

/////ADMIN ROUTES

Route::get('admin/home', 'adminController@index')->name('adminhome');

Route::get('admin', 'admin\LoginController@showLoginForm')->name('admin.login');

Route::post('admin/login', 'admin\LoginController@login');


Route::get('admin/users', 'adminController@users');
Route::get('admin/transactions', 'adminController@transactions');
Route::get('admin/withdrawalrequests', 'adminController@withdrawalrequests')->name('wd');
Route::get('admin/approvedwithdrawalrequests', 'adminController@approvedwithdrawalrequests');

Route::get('admin/approveuser', 'adminController@approveuser');
Route::post('admin/approveuserconfirm', 'adminController@approveuserconfirm');



Route::get('admin/holdings', 'adminController@holdings');


Route::get('admin/addwalletbalance', 'adminController@addwalletbalance');
Route::post('admin/addwalletbalanceconfirm', 'adminController@addwalletbalanceconfirm');
Route::get('admin/editprofile', 'adminController@editprofile');


//COINBASE ROUTES
Route::get('/coinbasetest', 'homeController@test1');
//webhook
Route::post('/cb', 'cbController@cb');


Route::get('/mbt', 'mbt@bt');


Route::get('/mbtview', 'mbt@mbtview');

/////


//upload id proof address proof
Route::post('/uploadidproof', 'createprofile@uploadidproof');
Route::post('/uploadadproof', 'createprofile@uploadadproof');


//

Route::get('admin/approvewd', 'approvewithdrawal@approve');
Route::post('admin/confirmwdapproval', 'approvewithdrawal@confirm');


Route::get('gp', 'globepay@index');
