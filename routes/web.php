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
    return redirect(route('login'));
    //redirect('/login');
});

Auth::routes();

Route::get('/home', 'MatchController@matchesPage')->name('home');
Route::get('/matchdetail', function(){
	return view('matchdetail');
});
Route::get('/matches', 'MatchController@matchesPage');
Route::get('/findTeamToDropdown', 'MatchController@findTeamToDropdown');
Route::get('/findLeagueToDropdown', 'MatchController@findLeagueToDropdown');
Route::get('/findVenueToDropdown', 'MatchController@findVenueToDropdown');

//for add results on leagues
Route::get('/findLeagueToDropdownTwo', 'MatchController@findLeagueToDropdownTwo');
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

//for adding bets on match
Route::get('/addBetOnMatch/{match_id}',  'MatchBetsController@addBetOnMatchView');
Route::post('/addBetOnMatch/{match_id}',  'MatchBetsController@addMatchBets');

Route::get('/addResultOnMatch/{match_id}',  'MatchBetsController@addResultOnMatchView');
Route::post('/addResultOnMatch/{match_id}',  'MatchBetsController@addMatchResult');

Route::get('/user/deactivate/{user}', 'reportController@deactivate');
Route::get('/user/activate/{user}', 'reportController@activate');
Route::get('/addLeague',  'LeagueController@addLeagueView');
Route::post('/addLeague',  'LeagueController@addLeague');

Route::get('/addTransferBet', 'TransferBetsController@addTransferBetView');
Route::post('/addTransferBet', 'TransferBetsController@addTransferBet');
Route::get('/matchbet/settle/{matchBet}/{result}', 'MatchBetsController@settleBet');
Route::get('/transferbet/settle/{transferBet}/{result}', 'TransferBetsController@settleBet');


//for adding transfer bets


//for adding cup bets
Route::get('/addCupBet', 'CupBetsController@addCupBetView');
Route::get('/addCupBet/{cup_id}', 'CupBetsController@addBetOnACupView');
Route::post('/addCupBet/{cup_id}', 'CupBetsController@addBetOnACup');

//for adding league bets
Route::get('/addLeagueBet', 'LeagueBetsController@addLeagueBetView');
Route::get('/addLeagueBet/{league_id}', 'LeagueBetsController@addBetOnALeagueView');
Route::post('/addLeagueBet/{league_id}', 'LeagueBetsController@addBetOnALeague');



Route::get('/addLeagueResult', 'LeagueController@viewLeagues');
Route::get('/addResultOnALeague/{id}', 'LeagueController@addResultOnALeagueView');
Route::post('/addResultOnALeague/{id}', 'LeagueController@addResultOnALeague');

//for adding results on a cup competitions
Route::get('/addCupResult', 'CupController@viewCups');
Route::get('/addResultOnACup/{id}', 'CupController@addResultOnACupView');
Route::post('/addResultOnACup/{id}', 'CupController@addResultOnACup');

//for adding teams on cup competitions
Route::get('/addTeamOnCups', 'CupController@addTeamOnCupView');
Route::post('/addTeamOnCups/{cup_id}', 'CupController@addTeamOnCup');

//for recharging a user account
Route::get('recharge_account', 'AccountController@rechargeAccountView');
Route::get('recharge_account/{user_id}', 'AccountController@rechargeUserAccount');
Route::post('recharge_account/{user_id}', 'AccountController@rechargeAccount');

//searching user
Route::get('/search', 'AccountController@search');

//firebase testing
Route::get('/phpfirebase_sdk', 'FirebaseController@index');

