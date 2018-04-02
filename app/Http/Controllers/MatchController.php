<?php

namespace App\Http\Controllers;

use App\Match;
use Illuminate\Http\Request;

class MatchController extends Controller
{
    public function addMatch(Request $request)
    {
<<<<<<< HEAD
<<<<<<< HEAD
        $match = new Match;
        $match->group_name = $request->group_name;
        $match->description = $request->description;
        $match->user_id = Auth::user()->id;
        $match->department = Auth::user()->department;
        $match->visibility = $request->visibility;

=======
        $m = Match::all()->load('awayteam','hometeam','competition','bets');
        return $m; 
>>>>>>> fba5d5848770efd28ad9764df2b8536687dbd748
=======
        $m = Match::all()->load('awayteam','hometeam','competition','bets');
        return $m; 
>>>>>>> fba5d5848770efd28ad9764df2b8536687dbd748
    }

    public function viewMatch(Match $match)
    {
<<<<<<< HEAD
<<<<<<< HEAD
    
=======
        
>>>>>>> fba5d5848770efd28ad9764df2b8536687dbd748
=======
        
>>>>>>> fba5d5848770efd28ad9764df2b8536687dbd748
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
     * @param  \App\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function show(Match $match)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function edit(Match $match)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Match $match)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function destroy(Match $match)
    {
        //
    }
}
