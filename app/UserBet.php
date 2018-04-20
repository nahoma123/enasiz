<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserBet extends Model
{
    //

    protected $users_id;
    public function user(){
        $this->belongsTo(User::class,'users_id','id');
    }
    public function bets(){
        $this->hasMany('UserBet','id');
    }
}
