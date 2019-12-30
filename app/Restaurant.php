<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    public function consumable(){
        return $this->hasMany('App\Consumable');
    }

}
