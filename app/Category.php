<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    // public function category(){

    //     return $this->belongsTo('App\Category');
    // }
    public function note(){

        return $this->hasMany('App\Note');
    }
}
