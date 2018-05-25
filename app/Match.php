<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\MatchBet;

class Match extends Model
{
    //  
    
    protected $fillable = ['home_team','away_team','competition_type','competition_id',
        'start_time','end_time','match_status','venue'
        ];
    public function homeTeam(){
        return $this->belongsToMany('App\Team','hometeam_team','hometeam_id')->withTimestamps();
    }
    public function awayTeam(){
        return $this->belongsToMany('App\Team','awayteam_team','awayteam_id')->withTimestamps();
    }
    public function bets(){
        return $this->hasMany(MatchBet::class);
    }
    public function competition(){
        return $this->morphTo();
    }
    public function isBetted(Match $match){
        $match_bets  = MatchBet::all();
        $resp = false;
        for($i = 0; $i < count($match_bets); $i++){
            if($match_bets[$i]->match_id == $match->id){
                $resp = true;
                break;
            }

        }
        return $resp;

    }
}