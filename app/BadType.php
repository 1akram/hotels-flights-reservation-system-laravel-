<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BadType extends Model
{
    protected $table ='bads';

    
    
    public function rooms()
    {
        return $this->belongsToMany('App\Room','bad_room')->withPivot('badsNum' );
    }
}
