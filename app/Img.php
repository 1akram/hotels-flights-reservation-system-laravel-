<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Img extends Model
{
    protected $table ='imgs';

    public function room()
    {
        return $this->belongsTo('App\Room','room_id');
    }

}
