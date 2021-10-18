<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\AirLine;
use Illuminate\Http\Request;

class AirLineController extends Controller
{


public function airLine(){
    return view('FlightLayout\AdminAccieul');

}

public function roundTrip(){
    $flights= Auth::user()->airLine->towWayFlights;
    return view('FlightLayout\RoundTrip',compact('flights'));
     
}
public function OneWayTrip(){
    $flights= Auth::user()->airLine->oneWayFlights;
    return view('FlightLayout\OneWay',compact('flights'));
     
}
}
