<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    //
    protected $account_id;



    public function account(){

        return $this->belongsTo("App\Account",'account_id','id');
    }
}
