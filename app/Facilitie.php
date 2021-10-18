<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facilitie extends Model
{
    protected $table ='facilities';

    public function hotels()
    {
        return $this->belongsToMany('App\Hotel','facilitie_hotel');
    }
}
