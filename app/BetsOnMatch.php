<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BetsOnMatch extends Model
{
    
    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function matchbet(){
        return $this->belongsTo(MatchBet::class,'match_bet_id','id');
    }
    
    public function account(){
        return $this->has(Account::class,'users_id','user_id');
    }
    
    public function matchbetsActive(){
        return $this->matchbet();
    }
    
}
