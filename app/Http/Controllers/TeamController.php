<?php

namespace App\Http\Controllers;

use App\League;
use App\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TeamController extends Controller
{
    public function addTeamView()
    {
        $leagues = League::all();
        return view('addTeam')->with('leagues', $leagues);
    }

    public function addTeam(Request $request)
    {
        $team = new Team;
        $team->team_name = $request->team_name;
        $team->league_id = $request->league;
        if ($request->hasFile('team_thumbnail')){
            $filename = $request->team_thumbnail->getClientOriginalName();
            $request->team_thumbnail->storeAs('public/upload/team_thumbnail', $filename);
            $team->team_thumbnail = $filename;
            $team->save();
            Session::flash('flash_message', 'You have successfuly added the team');
            return back();
        }
        Session::flash('flash_message', 'You have successfuly added the team');
        return back();
    }

}
