<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AirLine extends Model
{
    protected $table ='air_lines';
    public function flights()
    {
        return $this->hasMany('App\Flight','air_lines_id');
    }
    public function oneWayFlights()
    {
        return $this->hasMany('App\Flight','air_lines_id')->where('flight_type',false);
    }
    public function towWayFlights()
    {
        return $this->hasMany('App\Flight','air_lines_id')->where('flight_type',true);
    }
    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }

}
