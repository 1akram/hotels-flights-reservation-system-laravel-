<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StopOver extends Model
{ protected $table ='stop_over';
    public function stopOver()
    {
        return $this->belongsTo('App\Flight','flight_id');
    }

}
