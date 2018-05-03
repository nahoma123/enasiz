<?php

namespace App\Http\Controllers;

use App\MatchBet;
use Illuminate\Http\Request;
use Auth;

class MatchBetsController extends Controller
{
    
    public function addMatchBets(Request $request, $match_id)
    {
        $matchBet = new MatchBet;
        $matchBet->minimum_wage = $request->minimum_wage;
        $matchBet->maximum_wage = $request->maximum_wage;
        $matchBet->winning_odds_home = $request->winning_odds_home;
        $matchBet->winning_odds_away = $request->winning_odds_away;
        $matchBet->type_of_bet = 'Public';
        $matchBet->bet_created_at = $request->bet_created_at;
        $matchBet->match_id = $match_id;
        $matchBet->user_id = Auth::user()->id;
        $matchBet->save();
        return back();
    }

    public function addBetOnMatchView($match_id)
    {
        return view('addBetOnMatch')->with('match_id', $match_id);
    }

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MatchBet  $matchBet
     * @return \Illuminate\Http\Response
     */
    public function show(MatchBet $matchBet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MatchBet  $matchBet
     * @return \Illuminate\Http\Response
     */
    public function edit(MatchBet $matchBet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MatchBet  $matchBet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MatchBet $matchBet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MatchBet  $matchBet
     * @return \Illuminate\Http\Response
     */
    public function destroy(MatchBet $matchBet)
    {
        //
    }
}
