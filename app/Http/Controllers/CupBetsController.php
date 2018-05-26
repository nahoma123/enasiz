<?php

namespace App\Http\Controllers;

use App\CupBet;
use Illuminate\Http\Request;
use App\Cup;
use Illuminate\Support\Facades\DB;
use App\Team;
use Illuminate\Support\Facades\Session;

class CupBetsController extends Controller
{
    public function addCupBetView()
    {
        $cups = Cup::orderBy('name')->get();
        return view('viewCupForBets')->with('cups', $cups);
    }
    public function addBetOnACupView($cup_id)
    {
        $team_ids = DB::table('cup_team')->select('team_id')->where('cup_id', $cup_id)->get();
        //print_r($team_ids);
        $y = $team_ids;
        $f = [];
        foreach ($y as $x){
            $f[]=Team::find($x->team_id);
        }
        return view('addBetOnCup')->with('cup_id', $cup_id)->with('teams', $f);
    }
    public function addBetOnACup(Request $request, $cup_id)
    {
        $cup_bet = new CupBet;
        $cup_bet->minimum_wage = $request->minimum_wage;
        $cup_bet->maximum_wage = $request->maximum_wage;
        $cup_odd = ($request->cup_odd) / 10;
        $cup_bet->cup_odd = $cup_odd;
        $cup_bet->cups_id = $cup_id;
        //$team = Team::select('id')->where('team_name', $request->team)->get();
        $cup_bet->team_id = $request->team;
        $cup_bet->save();
        Session::flash('flash_message', 'You have successfuly added bet on cup');
        return back();
    }
}
