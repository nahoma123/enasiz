<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cup extends Model
{
    //
    public function matches(){
        $this->morphMany('App\Match', 'competition');
    }
}
    