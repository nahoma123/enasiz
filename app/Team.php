<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    //
    public function awayteams(){
        return $this->belongsToMany('App\Match','awayteam_team','awayteam_id');
    }
    public function hometeams(){
        return $this->belongsToMany('App\Match','hometeam_team','hometeam_id');
    }
    public function cup(){
        return $this->belongsToMany('App\Cup');
    }
    public function league(){
        return $this->hasMany("App\League");
    }
    
}
