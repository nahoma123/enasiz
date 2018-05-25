<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BetOnTransfer extends Model
{
    protected $table ='bets_on_Transfers';
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function userBet(){
        $this->belongsTo(UserBet::class);
    }
    
    public function account(){
        $this->has(Account::class,'users_id','user_id');
    }
    
}