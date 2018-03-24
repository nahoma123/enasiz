<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MatchBet extends Model
{
    public function betOnMatch(){
        return $this->hasMany(BetOnMatch::class);
    }
}
