<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LeagueBet extends Model
{
    public function betOnLeague(){
        return $this->hasMany(BetOnLeague::class);
    }
}
