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
Route::get('/leagues/showall', 'LeagueController@showAllLeagues');
Route::get('/cups/showall', 'CupController@showAllCups');
Route::post('/matchbets/betOnMatch',"betsOnMatchesController@store");