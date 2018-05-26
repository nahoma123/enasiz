<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Cup;
use App\Team;
use App\CupTeam;
use Illuminate\Support\Facades\DB;
use App\CupResult;
use Illuminate\Support\Facades\Session;

class CupController extends Controller
{
    //
    function showAllCups(){
    	$cups = Cup::all();
    	return $cups;
    }
    public function addTeamOnCupView()
    {
        $cups = Cup::orderBy('name')->get();
        $teams = Team::orderBy('team_name')->get();
        return view('addTeamsOnCup')->with('cups', $cups)->with('teams', $teams);
    }
    public function addTeamOnCup(Request $request, $cup_id)
    {
        //$cup_team = new CupTeam;
        DB::table('cup_team')->insert(['cup_id' => $cup_id, 'team_id' => $request->team]);
        //$cup_team->save();
        Session::flash('flash_message', 'You have successfuly added team on cup');
        return back();
    }
    public function viewCups()
    {
        $cups = Cup::orderBy('name')->get();
        return view('viewCups')->with('cups', $cups);
    }
    public function addResultOnACupView($cup_id)
    {
        $team_ids = DB::table('cup_team')->select('team_id')->where('cup_id', $cup_id)->get();
        //print_r($team_ids);
        $y = $team_ids;
        $f = [];
        foreach ($y as $x){
            $f[]=Team::find($x->team_id);
        }
       return view('addResultOnCup')->with('cup_id', $cup_id)->with('teams', $f);
    }
    public function addResultOnACup(Request $request, $cup_id)
    {
        $cup_result = new CupResult;
        $cup_result->cup_id = $cup_id;
        $cup_result->winner = $request->winner;
        $cup_result->save();
        Session::flash('flash_message', 'You have successfuly added result on cup');
        return back();
    }
    
}