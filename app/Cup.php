<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cup extends Model
{
    //
    public function matches(){
        $this->morphTo('App\Match', 'competition');
    }
    public function team(){
        return $this->belongsToMany('App\Team');
    }
}
    