<?php

namespace App;
use Illuminate\Auth\Passwords\CanResetPassword ;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    protected $table ='users';

    
    protected $fillable = [
        'name', 'email', 'password','role','avatar','lastName','sex','birthDay','phone','street','city','state','postal_code','country'
    ];

     
    protected $hidden = [
        'password', 'remember_token',
    ];

     
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function reviews()
    {
        return $this->belongsToMany('App\Hotel','reviews')->withPivot('review','rating')->withTimestamps();
    }
    public function hotels()
    {
        return $this->hasMany('App\Hotel','user_id');
    }
    public function reservations()
    {
        return $this->belongsToMany('App\Room','reservation')->withPivot('id','first_name','last_name','sexe','birth_day','passport_number','check_in','check_out','rooms','total_price' )->withTimestamps();
    }
    public function flyReservations()
    {
        return $this->hasMany('App\Reservation','user_id');
    }
    public function airLine()
    {
        return $this->hasOne('App\AirLine','user_id');
    }
}
