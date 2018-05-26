<?php

namespace App\Http\Controllers;

use App\League;
use App\LeagueBet;
use App\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LeagueBetsController extends Controller
{
    public function addLeagueBetView()
    {
        $leagues = League::orderBy('league_name')->get();
        return view('viewLeagueForBets')->with('leagues', $leagues);
    }
    public function addBetOnALeagueView($league_id)
    {
        //$team_ids = DB::table('team')->select('team_id')->where('cup_id', $cup_id)->get();
        $teams = Team::select('team_name', 'id')->where('league_id', $league_id)->get();
        return view('addBetOnLeague')->with('league_id', $league_id)->with('teams', $teams);
    }
    public function addBetOnALeague(Request $request, $league_id)
    {
        $league_bet = new LeagueBet;
        $league_bet->minimum_wage = $request->minimum_wage;
        $league_bet->maximum_wage = $request->maximum_wage;
        $league_odd = ($request->league_odd) / 10;
        $league_bet->league_odd = $league_odd;
        $league_bet->league_id = $league_id;
        $league_bet->team_id = $request->team;
        $league_bet->save();
        Session::flash('flash_message', 'You have successfuly added bet on league');
        return back();
    }
}
