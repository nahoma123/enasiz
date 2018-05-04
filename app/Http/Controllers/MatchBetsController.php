<?php

namespace App\Http\Controllers;
use App\BetsOnMatch;

use App\MatchBet;
use Illuminate\Http\Request;
use App\Account;
class MatchBetsController extends Controller
{
    
    public function addMatchBets(MatchBet $matchBet, Match $match)
    {
        $matchBet = new matchBet;
        //$matchBet->matchBet_id = $->id;
        $matchBet->minimum_wage = $request->minimum_wage;
        $matchBet->maximum_wage = $request->maximum_wage;
        $matchBet->type_of_bet = $request->type_of_bet;

        $matchBet->match_id = $match->id;
        $matchBet->user_id = Auth::user()->id;
        $matchBet->save();


        return back();
    }


    public function index()
    {
        //
    }
    public function settleBet(MatchBet $matchBet,$result){
        if($matchBet->status == 0){

            foreach ($matchBet->with('betsOnMatch')->get()[0]->betsOnMatch as $bet){
                if($bet->team == $result){ // if win
                    // 
                    $account =Account::find($bet->user_id);
                    if($bet->team ==0){
                        $account->current_amount=$account->current_amount +$bet->bet_amount*$matchBet->winning_odds_home  ;
                    }
                    else{
                        $account->current_amount=$account->current_amount +$bet->bet_amount*$matchBet->winning_odds_away  ;
                    }
                    $account->save();
                    //todo: notification here to the user
                    
                    // add to trarnsation
                    
                    $trans = new \App\Transaction;
                    if ($bet->team == 0){
                        $trans->amount=$bet->bet_amount * $matchBet->winning_odds_home;
                    }else {
                        $trans->amount=$bet->bet_amount * $matchBet->winning_odds_away;
                    }
                    $trans->account_id=$bet->user_id;
                    $trans->pay_mechanism='on play';
                    $trans->method='win match';
                    $trans->description='Bet win from a Match';
                    $trans->save();
                    
                }else{ // if lose
                    $account =Account::find($bet->user_id);
                    $account->current_amount=$account->current_amount -$bet->bet_amount  ;
                    $account->save();
                    //todo: notifications here to the user
                    
                    
                    // add to trarnsation
                    
                    $trans = new \App\Transaction;
                    $trans->amount=$bet->bet_amount *(-1);
                    $trans->account_id=$bet->user_id;
                    $trans->pay_mechanism='on play';
                    $trans->method='win match';
                    $trans->description='Bet win from a Match';
                    $trans->save();
                }
            }
            $matchBet->status=1;
            $matchBet->save();
        }
        $matchBet->status=0;
            $matchBet->save();
            return 201;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MatchBet  $matchBet
     * @return \Illuminate\Http\Response
     */
    public function show(MatchBet $matchBet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MatchBet  $matchBet
     * @return \Illuminate\Http\Response
     */
    public function edit(MatchBet $matchBet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MatchBet  $matchBet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MatchBet $matchBet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MatchBet  $matchBet
     * @return \Illuminate\Http\Response
     */
    public function destroy(MatchBet $matchBet)
    {
        //
    }
}
