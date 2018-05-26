<?php

namespace App\Http\Controllers;

use App\BetsOnCup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BetsOnCupsController extends Controller
{
    public function addBetOnCup(Request $request)
    {
        $betsOnCup = new BetsOnCup;
        //$betOnCup->user_bet_id = Auth::user()->id;
        $betsOnCup->first_team = $request->first_team;
        $betsOnCup->second_team = $request->second_team;
        $betsOnCup->third_team = $request->third_team;
        $betsOnCup->fourth_team = $request->fourth_team;
        $betsOnCup->fifth_team = $request->fifth_team;
        $betsOnCup->profit_made = $request->profit_made;
        $betsOnCup->save();
        Session::flash('flash_message', 'You have successfuly added bet on cup');
        return back();
    }

    public function addBetOnCupGet(Request $request)
    {
        return view('testpage');
    }

    public function index()
    {
        //
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
     * @param  \App\BetOnCup  $betOnCup
     * @return \Illuminate\Http\Response
     */
    public function show(BetOnCup $betOnCup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BetOnCup  $betOnCup
     * @return \Illuminate\Http\Response
     */
    public function edit(BetOnCup $betOnCup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BetOnCup  $betOnCup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BetOnCup $betOnCup)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BetOnCup  $betOnCup
     * @return \Illuminate\Http\Response
     */
    public function destroy(BetOnCup $betOnCup)
    {
        //
    }
}
