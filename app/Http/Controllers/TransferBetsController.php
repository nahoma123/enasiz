<?php

namespace App\Http\Controllers;

use App\TransferBet;
use Illuminate\Http\Request;

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
        //$transferBet->profit_margin = $request->profit_margin;
        $transferBet->minimum_wage = $request->minimum_wage;
        $transferBet->maximum_wage = $request->maximum_wage;
        $transferBet->save();
        return back();
    }

    public function show(TransferBet $transferBet)
    {
        //
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
