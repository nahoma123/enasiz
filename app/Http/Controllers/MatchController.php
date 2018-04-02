<?php

namespace App\Http\Controllers;

use App\Match;
use Illuminate\Http\Request;

class MatchController extends Controller
{
    public function addMatch(Request $request)
    {
        $match = new Match;
        $match->group_name = $request->group_name;
        $match->description = $request->description;
        $match->user_id = Auth::user()->id;
        $match->department = Auth::user()->department;
        $match->visibility = $request->visibility;

    }
    public function viewMatch(Match $match)
    {
        $match = Match::all()->load('awayteam','hometeam','competition','bets');
        return $match;
    }
}
