<?php

namespace App;
use App\User;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $table ='hotels';

    public function reviews()
    {
        return $this->belongsToMany('App\User','reviews')->withPivot('review','rating')->withTimestamps();
    }
    public function rating(){
        $reviews=$this->reviews;
        $sum=0;
        foreach($reviews as $review ){
            $sum+=$review->pivot->rating;
        }
        if($reviews->count()<=0)
            return 0;
        return round($sum/$reviews->count(),1);
    }

    public function facilities()
    {
        return $this->belongsToMany('App\Facilitie','facilitie_hotel');
    }
    public function languages()
    {
        return $this->belongsToMany('App\Language','hotel_language');
    }
    public function rooms()
    {
        return $this->hasMany('App\Room','hotel_id');
    }
    public function avialableRooms($checkIn,$checkOut,int  $roomsNum = 1){
        $rooms=collect();
        
        foreach($this->rooms as $room){
              if(!empty($room->isReserved($checkIn,$checkOut)) &&($room->isReserved($checkIn,$checkOut)->roomsNumAvialable) >= $roomsNum){
                $rooms->push($room->isReserved($checkIn,$checkOut));
            }
        }
        return $rooms;
    }
    
    public function owner()
    {
        return $this->belongsTo('App\User','user_id');
    }
    public function randomIMG(){
        $index=$this->rooms->count()>0?rand(0,$this->rooms->count()-1):0;
        $index2=$this->rooms[$index]->imgs->count()>0?rand(0,$this->rooms[$index]->imgs->count()-1):0;
        try{

            return $this->rooms[$index]->imgs[$index2]->url;
        } catch (\Throwable $th) {
             return null;
        }
    }

    public function latlng(){
        return "{lat:".$this->lat.", lng:".$this->lng."}";
    }

    public function canAddReview( $userId){
        $user=User::find($userId);
        return ($user->reviews->where('id',$this->id)->count())<($user->reservations->where('hotel_id',$this->id)->count());

    }
}
