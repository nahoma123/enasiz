<?php

namespace App\Http\Controllers;

use App\Match;
use App\Team;
use App\League;
use Illuminate\Http\Request;

class MatchController extends Controller
{
    public function addMatch(Request $request)
    {
        $match = new Match;
        $match->competition_type = $request->competition_type;
        $match->competition_name = $request->competition_name;
        $match->venue = $request->description;
        $match->start_time = $request->start_time;
        $match->end_time = $request->end_time;
        $match->save();

        $match->homeTeam()->save(App\Team::find($request->home_team_id));
        $match->awayTeam()->save(App\Team::find($request->away_team_id));
    }

    public function viewMatch(Match $match)
    {
        $match = Match::all()->load('awayteam','hometeam','competition','bets');
        return $match;
    }
    public function matchesPage()
    {
        $teams = Team::all();
        $leagues = League::all();
        return view('matchespage')->with('teams', $teams)->with('leagues', $leagues);
    }
    public function findTeamToDropdown(Request $request)
    {
        $data = Team::select('team_name', 'id')->where('league_id', $request->id)->take(100)->get();
        return response()->json($data);
    }
}
