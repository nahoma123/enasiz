<?php

namespace App\Http\Controllers;
use App\BetsOnMatch;

use App\Match;
use App\MatchBet;
use App\MatchesResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Support\Facades\Session;
use App\Account;
use Illuminate\Support\Facades\Hash;


use Auth;
class MatchBetsController extends Controller
{
    
    public function addMatchBets(Request $request, $match_id)
    {
        $matchBet = new MatchBet;
        $matchBet->minimum_wage = $request->minimum_wage;
        $matchBet->maximum_wage = $request->maximum_wage;
        $odds_for_home_team = ((($request->shots_on_goal_home) / 5) + (5 / ($request->shots_on_goal_away))) / 5;
        $odds_for_away_team = ((($request->shots_on_goal_away) / 5) + (5 / ($request->shots_on_goal_home))) / 10;
        $matchBet->winning_odds_home = $odds_for_home_team;
        $matchBet->winning_odds_away = $odds_for_away_team;
        //$matchBet->draw_odds = ($odds_for_home_team + $odds_for_away_team) / 2;
        $matchBet->type_of_bet = 'Public';
        $matchBet->match_id = $match_id;
        $matchBet->user_id = Auth::user()->id;
        $matchBet->save();
        Session::flash('flash_message', 'You have successfuly added bet on the match');
        return back();
    }
    public function checkBetExists(Request $request){
        $matchBet=MatchBet::find($request->betId);
        if(is_null($matchBet)){
            return 501;
        }else{
            return 200;
        }
    }

    public function addBetOnMatchView($match_id)
    {
        return view('addBetOnMatch')->with('match_id', $match_id);
    }

    public function index()
    {
        
        
    }
    public function settleAllBets($match_id, $result)
    {
        $matche_bets = MatchBet::where('match_id', $match_id)->get();
        foreach ($matche_bets as $matche_bet){
            $this->settleBet($matche_bet->id, $result);
        }
    }
    public function settleBet($matchBet,$result){
        $matchBet= MatchBet::find($matchBet)->first();
        if($matchBet->status == 0){


            foreach ($matchBet->with('betsOnMatch')->get()[0]->betsOnMatch as $bet){
                if(is_null($bet)){
                    return 200;
                }
                if($bet->team == $result){ // if win
                    // 
                    $account =Account::where('users_id',$bet->user_id)->first();
                    if($bet->team ==0){
                        $account->current_amount=$account->current_amount +$bet->bet_amount*$matchBet->winning_odds_home  ;
                    }
                    else{
                        $account->current_amount=$account->current_amount +$bet->bet_amount*$matchBet->winning_odds_away  ;
                    }
                    $account->save();
                    //todo: notification here to the user
                    /*$headers=array('authorization:key='.'fadikfhuadhfn','Content-Type:application/json');
                    $fields=array('to'=>'dfghiudkhfi',
                        'notification'=>array("title"=>"ITS me","body"=>"duhhh")
                        );
                    $payload = json_encode($fields);
                    $curl_session= curl_init();
                    curl_setopt($curl_session, CURLOPT_URL, '');
                    // add to trarnsation
                    */
                    $trans = new \App\Transaction;
                    if ($bet->team == 0){
                        $bet->profit_made=$bet->bet_amount * $matchBet->winning_odds_home;
                        $trans->amount=$bet->bet_amount * $matchBet->winning_odds_home;
                    }else {
                        $bet->profit_made=$bet->bet_amount * $matchBet->winning_odds_away;
                        $trans->amount=$bet->bet_amount * $matchBet->winning_odds_away;
                    }
                    $trans->account_id=$bet->user_id;
                    $trans->pay_mechanism='on play';
                    $trans->method='win match';
                    
                    $trans->description='Bet win from a Match';
                    $trans->save();
                    
                }else{ // if lose
                    //dd($bet->user_id);
                    $account =Account::where('users_id',$bet->user_id)->first();
                    //dd($account);
                    $account->current_amount=$account->current_amount -$bet->bet_amount  ;
                    $bet->profit_made=$bet->bet_amount * (-1);
                    $account->save();
                    //todo: notifications here to the user
                    
                    
                    // add to trarnsation
                    
                    $trans = new \App\Transaction;
                    $trans->amount=$bet->bet_amount *(-1);
                    $trans->account_id=$bet->user_id;
                    $trans->pay_mechanism='on play';
                    $trans->method='Lose match Bet';
                    $trans->description='Bet Lose from a Match Bet';
                    $trans->save();
                }
            }
            $matchBet->status=1;
            $matchBet->save();
        }
//        $matchBet->status=0;
//            $matchBet->save();
            return 200;
    }
    public function addMatchResult(Request $request, $match_id)
    {
        $matchResult = new MatchesResult;
        $matchResult->home_team_score = $request->home_team_score;
        $matchResult->away_team_score = $request->away_team_score;
        $matchResult->possession = $request->possession;
        $matchResult->home_team_shots_on_target = $request->home_team_shots_on_target;
        $matchResult->away_team_shots_on_target = $request->away_team_shots_on_target;
        $matchResult->home_team_corners = $request->home_team_corners;
        $matchResult->away_team_corners = $request->away_team_corners;
        $matchResult->home_team_fouls = $request->home_team_fouls;
        $matchResult->away_team_fouls = $request->away_team_fouls;
        $matchResult->match_id = $match_id;
        DB::table('matches')
            ->where('id', $match_id)
            ->update(['match_status' => 1,
                ]);
        $matchResult->save();
        if(($request->home_team_score) > ($request->away_team_score)){
            $result = 0;
        }
        elseif (($request->home_team_score) < ($request->away_team_score)){
            $result = 1;
        }
        $this->settleAllBets($match_id, $result);
        Session::flash('flash_message', 'You have successfuly added result on the match');
        return back();
    }

    public function addResultOnMatchView($match_id)
    {
        return view('addResultOnMatch')->with('match_id', $match_id);
    }
    public function addPrivateBet(Request $request){
        $user= User::where("email",$request->email)->first();
        $user_id=$user->id;

        $matchBet = new MatchBet;
        $matchBet->type_of_bet="Private";
        $matchBet->password=Hash::make($request->password);
        $matchBet->minimum_wage=$request->minimum_wage;
        $matchBet->maximum_wage=$request->maximum_wage;
        $matchBet->away_bets=0;
        $matchBet->home_bets=0;
        $matchBet->away_bets_amount=0;
        $matchBet->home_bets_amount=0;
        $matchBet->winning_odds_away=0;
        $matchBet->winning_odds_home=0;
        $matchBet->status=0;
        $matchBet->match_id=$request->match_id;
        $matchBet->user_id=$user_id;

        $matchBet->save();
        return $matchBet->id;
    }
}
