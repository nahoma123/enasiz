<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\BetsOnMatch;
class MatchBet extends Model
{
    public function match(){
        return $this->belongsTo(Match::class);
    }

    public function betsOnMatch(){
        return $this->hasMany(BetsOnMatch::class);
    }
}
