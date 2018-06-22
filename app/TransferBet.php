<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransferBet extends Model
{
    public function betOnTransfer(){
        return $this->hasMany(BetOnTransfer::class);
    }
    
}
