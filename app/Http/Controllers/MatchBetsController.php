<?php

namespace App\Http\Controllers;
use App\BetsOnMatch;

use App\MatchBet;
use Illuminate\Http\Request;

use App\Account;

use Auth;
class MatchBetsController extends Controller
{
    
    public function addMatchBets(Request $request, $match_id)
    {
        $matchBet = new MatchBet;
        $matchBet->minimum_wage = $request->minimum_wage;
        $matchBet->maximum_wage = $request->maximum_wage;
        $matchBet->winning_odds_home = $request->winning_odds_home;
        $matchBet->winning_odds_away = $request->winning_odds_away;
        $matchBet->type_of_bet = 'Public';
        $matchBet->bet_created_at = $request->bet_created_at;
        $matchBet->match_id = $match_id;
        $matchBet->user_id = Auth::user()->id;
        $matchBet->save();
        return back();
    }

    public function addBetOnMatchView($match_id)
    {
        return view('addBetOnMatch')->with('match_id', $match_id);
    }

    public function index()
    {
        
        
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
                    $account =Account::find($bet->user_id);
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
