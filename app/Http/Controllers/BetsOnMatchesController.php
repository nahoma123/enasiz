<?php

namespace App\Http\Controllers;

use \App\User;
use \App\Account;
use \App\BetsOnMatch;
use Illuminate\Http\Request;
use App\MatchBet;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class BetsOnMatchesController extends Controller
{
    public function store(Request $request)
    {
        //todo: validation on the amount of money and the maximum amount of users goes here
        
        $user= User::where("email",$request->email)->first();
        $balance= Account::where("users_id",$user->id)->first();
        
        if($balance->current_amount<$request->bet_amount){
            return 203;
        }else{
            $balance->current_amount= $balance->current_amount- $request->bet_amount;
            $balance->save();
        }

        $userBet =new BetsOnMatch;
        if(is_null($request->user_id)){
            $user=User::where('email',$request->email)->first();
            $userBet->user_id=$user->id;   
            // dd($user);    
        }else{
            $userBet->user_id=$request->user_id;
   
        }
        
        $userBet->match_bet_id =$request->match_bet_id;
        $userBet->team=$request->team;
        $userBet->status=0;
        $userBet->profit_made=0;
        $userBet->bet_amount=$request->bet_amount;
        $userBet->save();
        
        // update the match bet table to count the amount of bets for the away and home
        $matchbet= MatchBet::find($request->match_bet_id);
        if($request->team==1){
            $matchbet->away_bets_amount= $matchbet->away_bets_amount+$request->bet_amount;
            $matchbet->away_bets= $matchbet->away_bets+1;
        }
        else{
            $matchbet->home_bets_amount= $matchbet->home_bets_amount+$request->bet_amount;
            $matchbet->home_bets= $matchbet->home_bets+1;
        }
        
        $matchbet->save();
        return 200;
    }
    public function showActiveBets($email,$status){
        $user= User::where("email",$email)->first();
        $user_id= $user->id;
        $matches = \DB::table('Bets_On_Matches')
            ->join('match_bets', 'Bets_On_Matches.match_bet_id', '=', 'match_bets.id')
                ->join('matches','match_bets.match_id','=','matches.id')
                ->where('Bets_On_Matches.user_id',$user_id)
             ->select('match_bets.status as match_bet_status','Bets_On_Matches.status as statusnonsense','Bets_On_Matches.*','match_bets.*','Bets_On_Matches.created_at as userbet_created','match_bets.created_at as matchbet_created','matches.*','match_bets.updated_at as bet_settled')
            ->get();
        foreach ($matches as $match){
            $match->userbet_created = date("l, F j, Y, g:i A", strtotime($match->userbet_created) );
            $match->matchbet_created = date("l, F j, Y, g:i A", strtotime($match->matchbet_created) );
            $match->bet_settled = date("l, F j, Y, g:i A", strtotime($match->bet_settled) );
        }
        return $matches;
    }
    
    public function joinPrivate(Request $request){
                //todo: validation on the amount of money and the maximum amount of users goes here
        $user= User::where("email",$request->email)->first();
        $balance= Account::where("users_id",$user->id)->first();
        
        if($balance->current_amount<$request->bet_amount){
            return 206;
        }
        $userBet =new BetsOnMatch;
        if(is_null($request->user_id)){
            $user=User::where('email',$request->email)->first();
            $userBet->user_id=$user->id;   
            // dd($user);    
        }else{
            $userBet->user_id=$request->user_id;
        }
        $matchbet= MatchBet::find($request->match_bet_id);
        if(!Hash::check(request()->password,$matchbet->password)){    
            return 203;
        }
        if((request()->bet_amount > $matchbet->maximum_wage) || (request()->bet_amount < $matchbet->mimimum_wage)  ){
            return 204;
        }
        $userBet->match_bet_id =$request->match_bet_id;
        $userBet->team=$request->team;
        $userBet->status=0;
        $userBet->profit_made=0;
        $userBet->bet_amount=$request->bet_amount;
        $userBet->save();
        
        // update the match bet table to count the amount of bets for the away and home
        
        if($request->team==1){
            $matchbet->away_bets_amount= $matchbet->away_bets_amount+$request->bet_amount;
            $matchbet->away_bets= $matchbet->away_bets+1;
        }
        else{
            $matchbet->home_bets_amount= $matchbet->home_bets_amount+$request->bet_amount;
            $matchbet->home_bets= $matchbet->home_bets+1;
        }
        
        
        // recalculate the odds as per the addition of a bet by the user and total amount of bet money
        //todo: algorithm goes here
        if(!($matchbet->home_bets_amount && $matchbet->away_bets_amount) ){
            $matchbet->winning_odds_away=1;
            $matchbet->winning_odds_home=1;
        }else{
        $matchbet->winning_odds_home = $matchbet->home_bets_amount/$matchbet->away_bets_amount;
        $matchbet->winning_odds_away = $matchbet->away_bets_amount/$matchbet->home_bets_amount;
        }
        $matchbet->save();
        $balance->current_amount= $balance->current_amount- $request->bet_amount;
            $balance->save();
        return 200;
    }
}
