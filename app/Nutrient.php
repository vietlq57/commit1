<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nutrient extends Model
{
    public function foods(){
        return $this->belongsToMany('App\Food')
            ->withPivot('value');
    }
}
