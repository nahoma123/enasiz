<?php

namespace App\Http\Controllers;

use App\TransferBet;
use Illuminate\Http\Request;
use App\Account;
use Illuminate\Support\Facades\Session;

class TransferBetsController extends Controller
{
    public function addTransferBetView()
    {
        return view('addTransferBet');
    }

    public function addTransferBet(Request $request)
    {
        $transferBet = new TransferBet;
        $transferBet->player_name = $request->player_name;
        $transferBet->transfer_to = $request->transfer_to;
        $transferBet->transfer_from = $request->transfer_from;
//        $transferBet->profit_margin = $request->profit_margin;
        $transferBet->transfer_odd = $request->transfer_odd;
        $transferBet->minimum_wage = $request->minimum_wage;
        $transferBet->maximum_wage = $request->maximum_wage;
        if(($request->maximum_wage) <= ($request->minimum_wage)){
            Session::flash('flash_message_error', 'Maximum wage can not be less than or equal to minimum wage');
            return back();
        }
        if(($request->transfer_to) == ($request->transfer_from)){
            Session::flash('flash_message_error', 'Both teams can not be the same');
            return back();
        }
        $transferBet->save();
        Session::flash('flash_message', 'You have successfuly added transfer bet');
        return back(); 
    }
    
    public function settleBet(TransferBet $transferBet,$result)
    {
        //
      
        if($transferBet->bet_status==0 || isNull($transferBet->bet_status) ){
             $betsOnTransfer = \App\BetOnTransfer::where('transfer_bet_id',$transferBet->id)->get();
            foreach($betsOnTransfer as $bet){
                if($bet->bet_on == $result){

                $account = Account::where('users_id',$bet->user_id)->first();

                    if($bet->bet_on == 0){
                        $bet->bet_amount;
                        $transferBet->winning_odds_infavor;
                        $account->current_amount=$account->current_amount +$bet->amount*$transferBet->winning_odds_infavor  ;
                    }
                    else{

                        $account->current_amount=$account->current_amount + $bet->amount*$transferBet->winning_odds_against  ;

                    }
                    $account->save();
                    $trans = new \App\Transaction;
                    if ($bet->bet_on == 0){
                        $bet->profit_amount=$bet->amount * $transferBet->winning_odds_home;
                        $trans->amount=$bet->amount * $transferBet->winning_odds_home;
                    }else {
                        $bet->profit_amount=$bet->amount * $transferBet->winning_odds_away;
                        $trans->amount=$bet->amount * $transferBet->winning_odds_away;
                    }
                    $trans->account_id=$bet->user_id;
                    $trans->pay_mechanism='on play';
                    $trans->method='win Transfer Bet';
                    $trans->description='Bet win from a Transfer Bet';
                    $trans->save();

                }else{
                    $bet->profit_amount=$bet->amount * $transferBet->winning_odds_away*(-1);
                    $trans = new \App\Transaction;
                    $trans->amount=$bet->amount *(-1);
                    $trans->account_id=$bet->user_id;
                    $trans->pay_mechanism='on play';
                    $trans->method='Lose Transfer Bet';
                    $trans->description='Bet lose from a Transfer Bet';
                    $trans->save();
                    
                    $account = Account::where('users_id',$bet->user_id)->get()[0];
                    $account->current_amount=$account->current_amount - $bet->amount  ;
                    $account->save();
                }
                $bet->save();
            }
        }
        return 200;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TransferBet  $transferBet
     * @return \Illuminate\Http\Response
     */
    public function edit(TransferBet $transferBet)
    {
        //
    }
    public function showTransferBets(){
        $transferBets = \DB::table('transfer_bets')
            ->join('teams', 'transfer_bets.transfer_to', '=', 'teams.id')
            ->get();
//        $transferBets= TransferBet::all();

        return ($transferBets);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TransferBet  $transferBet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TransferBet $transferBet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TransferBet  $transferBet
     * @return \Illuminate\Http\Response
     */
    public function destroy(TransferBet $transferBet)
    {
        //
    }
}
