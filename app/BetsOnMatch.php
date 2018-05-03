<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BetsOnMatch extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function MatchBet(){
        $this->belongsTo(MatchBet::class);
    }
}
