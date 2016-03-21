<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{

    protected $table = 'foods';

    public function group(){
        return $this->belongsTo('App\Group');
    }

    public function nutrients(){
        return $this->belongsToMany('App\Nutrient')
            ->withPivot('value');
    }
}
