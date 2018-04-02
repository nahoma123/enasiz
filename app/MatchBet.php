<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App;
class MatchBet extends Model
{
    public function match(){
        return $this->belongsTo(Match::class);
    }

    public function betOnMatch(){
        return $this->hasMany(BetOnMatch::class);
    }
}
