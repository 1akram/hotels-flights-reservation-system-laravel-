<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
   static public function flightsWhoHaveAvialablePlaces($allFlights){
        $flights=collect();
        
        foreach($allFlights as $flight){
              if($flight->reservations->count()<$flight->place_num  ){
                $flights->push($flight);
            }
        }
        return $flights;
    }
    protected $table ='flights';
    public function airLine()
    {
        return $this->belongsTo('App\AirLine','air_lines_id');
    }
    public function stopOvers()
    {
        return $this->hasMany('App\StopOver','flight_id');
    }
    public function reservations()
    {
        return $this->hasMany('App\Reservation','flight_id');
    }


}
