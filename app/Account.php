<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    //
    protected $users_id;

    public function user(){
        return $this->hasOne("App\User",'users_id','id');
    }
    public function transactions(){
        return $this->hasMany(Transaction::class,'id');
    }
}

