<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $table ='languages';

    public function hotels()
    {
        return $this->belongsToMany('App\Hotel','hotel_language');
    }
}
