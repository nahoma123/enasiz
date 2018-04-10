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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/matchdetail', function(){
	return view('matchdetail');
});
Route::get('/matches', function(){
	return view('matchespage');
});
Route::get('/manageaccounts', function(){
	return view('manageAccountspage');
});
Route::get('/betsmanagement', function(){
	return view('betsmanagement');
});
Route::get('/testlay',function(){
        return view('layouts.layout_login');
});
Route::get('/report/userAccountActivity/getForm',  'reportController@showUserAccountActivityForm');
Route::get('/transactions/viewuser/{user}','reportController@showUserTransactions');