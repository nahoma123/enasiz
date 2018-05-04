<?php

namespace App\Http\Controllers;

use \App\BetsOnMatch;
use Illuminate\Http\Request;
use App\MatchBet;

class BetsOnMatchesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //todo: validation on the amount of money and the maximum amount of users goes here
        
        
        $userBet =new BetsOnMatch;
        $userBet->user_bet_id=$request->user_id;
        
        $userBet->match_bet_id =$request->match_bet_id;
        $userBet->team=$request->team;
        $userBet->status=0;
        $userBet->profit_made=0;
        $userBet->bet_amount=$request->bet_amount;
        $userBet->save();
        
        // update the match bet table to count the amount of bets for the away and home
        $matchbet= MatchBet::find($request->match_bet_id);
        if($request->team==1){
            $matchbet->away_bets_amount= $matchbet->away_bets_amount+$request->bet_amount;
            $matchbet->away_bets= $matchbet->away_bets+1;
        }
        else{
            $matchbet->home_bets_amount= $matchbet->home_bets_amount+$request->bet_amount;
            $matchbet->home_bets= $matchbet->home_bets+1;
        }
        
        
        // recalculate the odds as per the addition of a bet by the user and total amount of bet money
        //todo: algorithm goes here
        if(!($matchbet->home_bets_amount && $matchbet->away_bets_amount) ){
            $matchbet->winning_odds_away=1;
            $matchbet->winning_odds_home=1;
        }else{
        $matchbet->winning_odds_home = $matchbet->home_bets_amount/$matchbet->away_bets_amount;
        $matchbet->winning_odds_away = $matchbet->away_bets_amount/$matchbet->home_bets_amount;
        }
        $matchbet->save();
        
        
        
        
        return 200;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BetOnMatch  $betOnMatch
     * @return \Illuminate\Http\Response
     */
    public function show(BetOnMatch $betOnMatch)
    {
        //
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BetOnMatch  $betOnMatch
     * @return \Illuminate\Http\Response
     */
    public function edit(BetOnMatch $betOnMatch)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BetOnMatch  $betOnMatch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BetOnMatch $betOnMatch)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BetOnMatch  $betOnMatch
     * @return \Illuminate\Http\Response
     */
    public function destroy(BetOnMatch $betOnMatch)
    {
        //
    }
}
