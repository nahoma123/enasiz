<?php

namespace App\Http\Controllers;

use App\League;
use Illuminate\Http\Request;

class LeagueController extends Controller
{
    public function addLeagueView()
    {
        return view('addleagues');
    }

    public function addLeague(Request $request)
    {
        $league = new League;
        $league->nation = $request->nation;
        $league->league_name = $request->league_name;
        $league->start_time = $request->start_time;
        $league->end_time = $request->end_time;
        $league->description = $request->description;
        $league->number_of_teams = $request->number_of_teams;
        $league->save();
        return back();
    }
    public function showAllLeagues()
    {
        $leagues = League::all();
        return $leagues;
    }
}
