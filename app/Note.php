<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use app\Type;
use app\Category;
use app\Label;
class Note extends Model
{

    public function type(){

        return $this->belongsTo('App\Type');
    }

    public function category(){

        return $this->belongsTo('App\Category');
    }
}
