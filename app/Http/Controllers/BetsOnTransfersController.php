<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\BetOnTransfer;
use Illuminate\Support\Facades\Session;
class BetsOnTransfersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    
    
    public function addTransferBet(Request $request){
        $betOnTransfer= new BetOnTransfer;
        $betOnTransfer->user_id=$request->user_id;
        $betOnTransfer->transfer_bet_id=$request->transfer_bet_id;
        $betOnTransfer->amount=$request->amount;
        $betOnTransfer->profit_amount=0;
        $betOnTransfer->bet_on=$request->bet_on;
        $betOnTransfer->save();
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
     * @param  \App\BetOnTransfer  $betOnTransfer
     * @return \Illuminate\Http\Response
     */
    public function show(BetOnTransfer $betOnTransfer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BetOnTransfer  $betOnTransfer
     * @return \Illuminate\Http\Response
     */
    public function edit(BetOnTransfer $betOnTransfer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BetOnTransfer  $betOnTransfer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BetOnTransfer $betOnTransfer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BetOnTransfer  $betOnTransfer
     * @return \Illuminate\Http\Response
     */
    public function destroy(BetOnTransfer $betOnTransfer)
    {
        //
    }
}
