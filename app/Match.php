<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    //  
    
    protected $fillable = ['home_team','away_team','competition_type','competition_id',
        'start_time','end_time','match_status','venue'
        ];
    public function homeTeam(){
        return $this->belongsToMany('App\Team');
    }
    public function awayTeam(){
        return $this->belongsToMany('App\Team');
    }
    
}
