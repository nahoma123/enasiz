<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BetOnMatch extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function userBet(){
        $this->belongsTo(UserBet::class);
    }
}
