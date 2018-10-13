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

Route::get('/', 'homecontroller@index');

Route::get('/logout', 'homecontroller@logout');


Route::get('/holdings', function () {
    return view('holdings');
});

Route::get('/order', function () {
    return view('order');
});

Route::get('/referrals', function () {
    return view('referrals');
});

Route::get('/transactions', function () {
    return view('transactions');
});

Route::get('/wallettransfer', function () {
    return view('wallettransfer');
});

Route::get('/withdraw', function () {
    return view('withdraw');
});

Route::get('/test', 'homecontroller@test1');

Route::get('/createprofile', 'createprofile@index');


Auth::routes();

