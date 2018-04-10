<?php

namespace App\Http\Controllers;

use App\Competition;
use App\Cup;
use App\Match;
use App\Team;
use App\League;
use Illuminate\Http\Request;

class MatchController extends Controller
{
    public function addMatch(Request $request)
    {
        $match = new Match;
        if ($request->competition == 'League'){
            $competition_type_is = League::select('league_name')->where('id', $request->competition_name)->get();
            $match->competition_type = $competition_type_is[0]['league_name'];
            $match->competition_id = $request->competition_name;
            $match->venue = $request->venue;
            $match->start_time = $request->start_time;
            $match->end_time = $request->end_time;
            $match->save();
//            $home_team_id = Team::select('id')->where('id', $request->home_team)->get();;
//            $away_team_id = Team::select('id')->where('id', $request->away_team)->get();;
            $match->homeTeam()->save(Team::find($request->home_team));
            $match->awayTeam()->save(Team::find($request->away_team));
            return back();
        }
    }

    public function viewMatch(Match $match)
    {
        $match = Match::all()->load('awayteam','hometeam','competition','bets');
        return $match;
    }
    public function matchesPage()
    {
        $teams = Team::all();
        $competitions = Competition::all();
        return view('matchespage')->with('teams', $teams)->with('competitions', $competitions);
    }
    public function findLeagueTeamToDropdown(Request $request)
    {
        $data = Team::select('team_name', 'id')->where('league_id', $request->id)->take(100)->get();
        return response()->json($data);
    }
    public function findLeagueToDropdown(Request $request)
    {
        //$data = League::select('team_name', 'id')->where('league_id', $request->id)->take(100)->get();
        $data = League::all();
        return response()->json($data);
    }
    public function findCupToDropdown(Request $request)
    {
        //$data = Team::select('team_name', 'id')->where('league_id', $request->id)->take(100)->get();
        $data = Cup::all();
        return response()->json($data);
    }
}
