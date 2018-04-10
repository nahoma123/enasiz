<?php

namespace App\Http\Controllers;

use App\BetOnLeague;
use App\League;
use Illuminate\Http\Request;

class BetsOnLeaguesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function putABetOnLeague(League $league, Request $request)
    {
        $betOnLeague = new BetOnLeague;
        $betOnLeague->user_bet_id = Auth::user()->id;
        $betOnLeague->first_team = $request->first_team;
        $betOnLeague->second_team = $request->second_team;
        $betOnLeague->third_team = $request->third_team;
        $betOnLeague->fourth_team = $request->fourth_team;
        $betOnLeague->fifth_team = $request->fifth_team;
        $total_bets_on_a_league = BetOnLeague::where('league_id', '==', $league)->get();
        $number_of_wagers = ($total_bets_on_a_league).length();
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
     * @param  \App\BetOnLeague  $betOnLeague
     * @return \Illuminate\Http\Response
     */
    public function show(BetOnLeague $betOnLeague)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BetOnLeague  $betOnLeague
     * @return \Illuminate\Http\Response
     */
    public function edit(BetOnLeague $betOnLeague)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BetOnLeague  $betOnLeague
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BetOnLeague $betOnLeague)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BetOnLeague  $betOnLeague
     * @return \Illuminate\Http\Response
     */
    public function destroy(BetOnLeague $betOnLeague)
    {
        //
    }
}
