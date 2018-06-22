<?php

use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
	
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/check',function(){
	return response()->json([[
    'name' => ['cr' => 'shit_less home'],
    'state' => 'CA'
]]);
});

Route::post('/addUsersBetOnCup', 'BetsOnCupsController@addBetOnCup');
Route::get('/matches/showall', 'MatchController@viewMatch');
Route::get('/matches/showLeagueMatches', 'MatchController@viewLeagueMatches');
Route::get('/leagues/showall', 'LeagueController@showAllLeagues');
Route::get('/cups/showall', 'CupController@showAllCups');
Route::post('/matchbets/betOnMatch',"betsOnMatchesController@store");
Route::post('/betsontransfer/add','BetsOnTransfersController@addTransferBet');
Route::post('/register','Auth\RegisterController@registerApi');
Route::get('/match/{match}',"MatchController@getMatch");
Route::post('/checkMatchBetExists',"MatchBetsController@checkBetExists");
Route::post('/placeprivatebet','BetsOnMatchesController@joinPrivate');
Route::post('/getBalance','AccountController@getCurrentBalance');
Route::post('/createPrivate','MatchBetsController@addPrivateBet');
Route::get('/showTransferBets','TransferBetsController@showTransferBets');
Route::get('/testsend','pushNotification@test');
Route::get('/testsend1','pushNotification@test1');
Route::get('/testsend2','pushNotification@junk');
Route::get('/activeMatchBets/{email}/{status}','BetsOnMatchesController@showActiveBets');
Route::post('/recharge/{email}','AccountController@rechargeAccountApi');
Route::post('/discharge/{email}','AccountController@dischargeAccountApi');
Route::get("/matches/showCupsMatches",'MatchController@viewCupMatches');
Route::get("/checkmoney/{cashid}","AccountController@checkIfUserMade");
Route::get("/payUsingHelloCash/{amount}/{email}","AccountController@payUsingHelloCash");


