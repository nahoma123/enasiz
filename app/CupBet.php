<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CupBet extends Model
{
    public function betOnCup(){
        return $this->hasMany(BetOnCup::class);
    }
}
