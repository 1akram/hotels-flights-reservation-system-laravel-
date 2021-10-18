<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $table ='rooms';
    public $roomsNumAvialable=0;
    public function reservations()
    {
        return $this->belongsToMany('App\User','reservation')->withPivot('id','first_name','last_name','sexe','birth_day','passport_number','check_in','check_out','rooms','total_price' )->withTimestamps();
    }
    public function amenities()
    {
        return $this->belongsToMany('App\Amenitie','amenitie_room');
    }
    public function bads()
    {
        return $this->belongsToMany('App\BadType','bad_room')->withPivot('badsNum' );
    }
    public function roomType()
    {
        return $this->belongsTo('App\RoomType','room_type_id');
    }
    public function hotel()
    {
        return $this->belongsTo('App\Hotel','hotel_id');
    }
    public function imgs()
    {
        return $this->hasMany('App\img','room_id');
    }
   
    public function isReserved($checkIn,$checkOut){
         $reservedRooms=$this->reservations()->wherePivot('check_in','<',$checkOut)->wherePivot('check_out','>',$checkIn)->get();
         $reservedTimes=0;
         foreach($reservedRooms as $room){
             $reservedTimes+=$room->pivot->rooms;
         }
        if($reservedTimes<$this->roomsNum){

            $this->roomsNumAvialable=$this->roomsNum -$reservedTimes;
            return $this;
        }
        return null;
    }
}
