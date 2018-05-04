<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','gender','address','password','phone_number','privilage_level'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function account(){
        return $this->belongsTo('App\Account','id','users_id');
    }
    public function matchBets(){
        return $this->hasMany('App\BetsOnMatch','user_id');
    }
    public function betOnTransfer(){
        return $this->hasMany('App\BetsOnTransfer','user_id');
    }
    public function betsOnLeagues(){
        return $this->hasMany('App\BetsOnLeague','user_id');
    }
    public function betsOnCups(){
        return $this->hasMany('App\BetsOnCup','user_id');
    }
}
