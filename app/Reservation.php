<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $table ='flight_reservation';

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
    public function flight()
    {
        return $this->belongsTo('App\Flight','flight_id');
    }
}
