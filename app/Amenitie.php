<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Amenitie extends Model
{
    protected $table ='amenities';



    public function rooms()
    {
        return $this->belongsToMany('App\Room','amenitie_room');
    }
}
