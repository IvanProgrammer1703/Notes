<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{

    public function type_name(){

        return $this->hasMany('App\Note');
    }
}
