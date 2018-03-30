<?php

namespace App\Http\Controllers;

use App\MatchBet;
use Illuminate\Http\Request;

class MatchBetsController extends Controller
{
    
    public function addMatchBets(MatchBet $matchBet, Match $match)
    {
        $matchBet = new matchBet;
        //$matchBet->matchBet_id = $->id;
        $matchBet->minimum_wage = $request->minimum_wage;
        $matchBet->maximum_wage = $request->maximum_wage;
        $matchBet->type_of_bet = $request->type_of_bet;

        $matchBet->match_id = $match->id;
        $matchBet->post_id = $post->id;
        $matchBet->save();


        return back();
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
