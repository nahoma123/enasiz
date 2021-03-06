<?php

namespace App\Http\Controllers;

use App\League;
use App\LeagueResult;
use Illuminate\Http\Request;
use App\Team;
use Illuminate\Support\Facades\Session;

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
        if(($request->start_time) >= ($request->end_time)){
            Session::flash('flash_message_error', 'End time can not be less than start time');
            return back();
        }
        $league->save();
        Session::flash('flash_message', 'You have successfuly added the league');
        return back();
    }

    public function showAllLeagues()
    {
        $leagues = League::all();
        return $leagues;
    }

    public function viewLeagues()
    {
        $leagues = League::orderBy('league_name')->get();
        return view('viewLeagues')->with('leagues', $leagues);
    }
    public function addResultOnALeagueView($league_id)
    {
        $teams = Team::where('league_id', $league_id)->orderBy('team_name')->get();
        return view('addResultOnALeague')->with('league_id', $league_id)->with('teams', $teams);
    }
    public function addResultOnALeague(Request $request, $league_id)
    {
        $league_result = new LeagueResult;
        $league_result->league_id = $league_id;
        $first_team = Team::select('id')->where('id', $request->first_team)->get();
        $second_team = Team::select('id')->where('id', $request->second_team)->get();
        $third_team = Team::select('id')->where('id', $request->third_team)->get();
        $fourth_team = Team::select('id')->where('id', $request->fourth_team)->get();
        $fifth_team = Team::select('id')->where('id', $request->fifth_team)->get();
        $league_result->first_team = $first_team[0]['id'];
        $league_result->second_team = $second_team[0]['id'];
        $league_result->third_team = $third_team[0]['id'];
        $league_result->fourth_team = $fourth_team[0]['id'];
        $league_result->fifth_team = $fifth_team[0]['id'];
        if((($request->first_team) == ($request->second_team))
            || (($request->first_team) == ($request->third_team))
            || (($request->first_team) == ($request->fourth_team))
            || (($request->first_team) == ($request->fifth_team))
            || (($request->second_team) == ($request->third_team))
            || (($request->second_team) == ($request->fourth_team))
            || (($request->second_team) == ($request->fifth_team))
            || (($request->third_team) == ($request->fourth_team))
            || (($request->third_team) == ($request->fifth_team))
            || (($request->fourth_team) == ($request->fifth_team))

        ){
            Session::flash('flash_message_error', 'Two fields can not be the same');
            return back();
        }
        $league_result->save();
        Session::flash('flash_message', 'You have successfuly added result on the league');
        return back();
    }
}
