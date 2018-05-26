<?php

namespace App\Http\Controllers;

use App\Competition;
use App\Cup;
use App\Match;
use App\MatchBet;
use App\MatchesResult;
use App\Team;
use App\League;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Session;
class MatchController extends Controller
{
    public function addMatch(Request $request)
    {
                    
        $v=  $request->validate([
            'start_date'=>'required|DateToday',
            'end_date'=>'required',
            'venue'=>'required'
        ]);

        $match = new Match;
        if (($request->competition) == 'League'){
            $competition_type_is = League::select('league_name')->where('id', $request->competition_name)->get();
            $w = $request->competition;
            $match->competition_type = "App\League";
            $match->competition_id = $request->competition_name;
            $match->venue = $request->venue;
            $match->start_time = $request->start_time;
            $match->end_time = $request->end_time;
//            $home_team_id = Team::select('id')->where('id', $request->home_team)->get();;
//            $away_team_id = Team::select('id')->where('id', $request->away_team)->get();;
            if(($request->home_team) == ($request->away_team)){
                Session::flash('flash_message_error', 'Home team and away team can not be the same');
                return back();
            }
            if(($request->start_time) >= ($request->end_time)){
                Session::flash('flash_message_error', 'End time can not be less than start time');
                return back();
            }
            $match->save();
            $match->homeTeam()->save(Team::find($request->home_team));
            $match->awayTeam()->save(Team::find($request->away_team));
            Session::flash('flash_message', 'You have successfuly added the match');
            return back();
        }
    }

    public function viewMatch(Match $match)
    {
        $match = Match::all()->load('awayteam','hometeam','competition','bets');
        return $match;
    }
    public function getMatch($match)
    {
        $match =[ Match::find($match)->load('awayteam','hometeam','competition','bets')];
        return $match;
    }
    public function matchesPage()
    {
        $teams = Team::all();
        
        return view('matchespage')->with('teams', $teams);
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
    public function findLeagueToDropdownTwo(Request $request)
    {
        //$data = League::select('team_name', 'id')->where('league_id', $request->id)->take(100)->get();
        $data = League::select('league_name', 'id')->where('id', $request->id)->take(100)->get();
        //$data = League::all();
        return response()->json($data);
    }
    public function findCupToDropdown(Request $request)
    {
        //$data = Team::select('team_name', 'id')->where('league_id', $request->id)->take(100)->get();
        $data = Cup::all();
        return response()->json($data);
    }

    public function viewMatches()
    {
        $matches = Match::all()->load('awayteam','hometeam','competition','bets');
        $teams = Team::all();
        $competitions = Competition::all();
        $match_bets = MatchBet::all();
//        $mnbt = [];
//        foreach ($matches as $match){
//            $matches_betted_on = MatchBet::select('match_id')->where('match_id', $match->id)->get();
//            $mnbt[] = $matches_betted_on;
//            //return $match->id;
//        }
        //return $mnbt;
        return view('viewmatchespage')->with('matches', $matches)->with('competitions', $competitions)->with('teams', $teams);
    }

    public function deleteMatch($id)
    {
        DB::table('hometeam_team')->where('hometeam_id', '=', $id)->delete();
        DB::table('awayteam_team')->where('awayteam_id', '=', $id)->delete();
        DB::table('matches')->where('id', '=', $id)->delete();
        Session::flash('flash_message', 'You have successfuly deleted the match');
        return back();
//        $match->homeTeam()->detach(Team::find($request->home_team));
    }
    public function updateMatchView($match_id)
    {
        return view('updateMatch')->with('match_id', $match_id);
    }

    public function updateMatch(Request $request, $id)
    {
        if ($request->competition == 'League'){
            $competition_type_is = League::select('league_name')->where('id', $request->competition_name)->get();
            DB::table('matches')
                ->where('id', $id)
                ->update(['competition_type' => 'App\League',
                    'competition_id' => $request->competition_name,
                    'venue' => $request->venue,
                    'start_time' => $request->start_time,
                    'end_time' => $request->end_time]);
//            $match->competition_type = $competition_type_is[0]['league_name'];
//            $match->competition_id = $request->competition_name;
//            $match->venue = $request->venue;
//            $match->start_time = $request->start_time;
//            $match->end_time = $request->end_time;
//            $home_team_id = Team::select('id')->where('id', $request->home_team)->get();;
//            $away_team_id = Team::select('id')->where('id', $request->away_team)->get();;
            $home_id = Team::find($request->home_team);
            $away_id = Team::find($request->away_team);
            DB::table('hometeam_team')->where('hometeam_id', '=', $id)->update(['team_id' => $home_id->id]);
            DB::table('awayteam_team')->where('awayteam_id', '=', $id)->update(['team_id' => $away_id->id]);
            //$match->homeTeam()->update(Team::find($request->home_team));
            //$match->awayTeam()->update(Team::find($request->away_team));
            return back();
        }
    }
}
