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

Route::get('/home', 'MatchController@matchesPage')->name('home');
Route::get('/matchdetail', function(){
	return view('matchdetail');
});
Route::get('/matches', 'MatchController@matchesPage');
Route::get('/findTeamToDropdown', 'MatchController@findTeamToDropdown');
Route::get('/findLeagueToDropdown', 'MatchController@findLeagueToDropdown');
Route::get('/findCupToDropdown', 'MatchController@findCupToDropdown');
Route::get('/findLeagueTeamToDropdown', 'MatchController@findLeagueTeamToDropdown');

Route::get('/manageaccounts', function(){
	return view('manageAccountspage');
});
Route::get('/betsmanagement', function(){
	return view('betsmanagement');
});
Route::get('/testlay',function(){
        return view('layouts.layout_login');
});

Route::get('/report/userAccountActivity/staffstatus',  'reportController@getAllStaffStatus');
Route::get('/report/userAccountActivity/getForm',  'reportController@showUserAccountActivityForm');
Route::get('/transactions/viewuser/{user}','reportController@showUserTransactions');


Route::post('/addMatch', 'MatchController@addMatch');

Route::get('/viewMatches',  'MatchController@viewMatches');
Route::get('/deleteMatch/{match_id}', 'MatchController@deleteMatch');
Route::get('/updateMatch/{match_id}', 'MatchController@updateMatchView');
Route::post('/updateMatch/{match_id}', 'MatchController@updateMatch');
Route::get('/addLeague',  'LeagueController@addLeagueView');
Route::post('/addLeague',  'LeagueController@addLeague');
Route::get('/addTeam',  'TeamController@addTeamView');
Route::post('/addTeam',  'TeamController@addTeam');
Route::get('/addBetOnMatch/{match_id}',  'MatchBetsController@addBetOnMatchView');
Route::post('/addBetOnMatch/{match_id}',  'MatchBetsController@addMatchBets');

Route::get('/user/deactivate/{user}', 'reportController@deactivate');
Route::get('/user/activate/{user}', 'reportController@activate');
Route::get('/addLeague',  'LeagueController@addLeagueView');
Route::post('/addLeague',  'LeagueController@addLeague');
Route::get('/addTransferBet', 'TransferBetsController@addTransferBetView');
Route::post('/addTransferBet', 'TransferBetsController@addTransferBet');
Route::get('/matchbet/settle/{matchBet}/{result}', 'MatchBetsController@settleBet');
Route::get('/transferbet/settle/{transferBet}/{result}', 'TransferBetsController@settleBet');
