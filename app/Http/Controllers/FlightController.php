<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Flight;
use App\StopOver;
use App\Reservation;

class FlightController extends Controller
{
    public function reservation(Request $request, $id){
        $request->request->add(['id' => $id]);
         $validate=Validator::make($request->all(), [
            'id' => 'nullable|integer|exists:flights,id',
             ])->validate();
        $flight=Flight::find($id);
        $user=Auth::user();
        return view('FlightLayout\FlightReservation',compact(
            'flight',
            'user',
        ));
    }
    public function reservationConfirm(Request $request){
        $validate=Validator::make($request->all(), [
            'flightId' => 'nullable|required|integer|exists:flights,id',
            'firstName'=>'nullable|required',
            'lastName'=>'nullable|required',
            'sexe'=>'nullable|required',
            'datebirth'=>'nullable|required', // hena lazem narj3alha  birth_date < date.now
            'passport'=>'nullable|required',
        ])->validate(); 
             
        if($this->payment($request )){
            $reservation=new Reservation();
            $reservation->first_name=$request->firstName;
            $reservation->last_name=$request->lastName;
            $reservation->sexe=$request->sexe;
            $reservation->birth_date=$request->datebirth;
            $reservation->passport_number=$request->passport;
            $reservation->flight_id=$request->flightId;
            $reservation->user_id=Auth::user()->id;
            $reservation->save();
            return redirect()->route('myReservations')->with('statusMsg','reservation  successful');
        }

        return redirect()->back()->with('statusMsg','could not reservation check your card info  ') ->with('statusError','error');

    }
    public function flights(){

        $flights=Flight::all()->where('aller','>=',Carbon::now());
        $flights=Flight::flightsWhoHaveAvialablePlaces($flights);
        return view('FlightLayout\FlightSearch',compact('flights'));
    }


    public function myFlighReservations(){
        
        return view('FlightLayout\MyReservations');

    }

    public function reservationDetails($id){
        $reservation=Auth::user()->flyReservations()->where('flight_id',$id)->first();
         
        if(!empty($reservation)&&$reservation->count()>0)
           return view('FlightLayout\PrintReservationDetials',compact(
               'reservation',
           ));
       

       return redirect()->route('myFlighReservations')->with('statusMsg','could not find this reservation  ') ->with('statusError','error');;
    }


    public function searcheFlights(Request $request ){
        
        $validate=Validator::make($request->all(), [
            'depart' => 'nullable|required|max:40',
            'arret' => 'nullable|required|max:40',
            'FlightType'=>'nullable|required|boolean',
            'aller'=> 'required|nullable|max:40 |after_or_equal:'.Carbon::now()->format('Y-m-d'),
            'retour'=> 'required_if:FlightType,1|nullable|max:40| after:'.$request->aller,
        ])->validate();
      
        $flights= Flight::all()->where('depart',$request->depart)->where('arret',$request->arret)->where('aller', $request->aller )->where('flight_type',(bool)$request->FlightType );
        if((bool)$request->FlightType){// 1 round trip 
            $flights=$flights->where('retour', $request->retour );
        }
        $flights=Flight::flightsWhoHaveAvialablePlaces($flights);


        return view('FlightLayout\FlightSearch',compact('flights'));
    }



    public function create(){
         return view('FlightLayout\AddFlight');
        
    }   
    public function store(Request $request){
             $this->validateInput($request);
        
             $flight=new Flight();
             $flight->depart=$request->depart;
             $flight->arret=$request->arret;
             $flight->price=(float)$request->price;
             $flight->place_num=(int)$request->place_num;
             $flight->service=$request->service;
             $flight->flight_type=(bool)$request->flight_type;
             $flight->air_lines_id= Auth::user()->airLine->id;
              if(!$flight->flight_type ){//one  way flight
                $flight->aller=Carbon::createFromFormat('yy-m-d', $request->aller1);
                $flight->aller_duree=$request->aller_duree1;
                $flight->aller_depar_heur=$request->aller_depar_heur1;
                $flight->aller_arret_heur=$request->aller_arret_heur1;
                $flight->save();
                for(  $i=0; $i < (int)$request->stopOverNum1;$i++){
                    $stopOver=new StopOver();
                    $stopOver->stop_over_type=false;
                    $stopOver->lieu=$request->lieu1[$i];
                    $stopOver->air_port=$request->air_port1[$i];
                    $stopOver->temp_arrive=$request->temp_arrive1[$i];
                    $stopOver->temp_depart=$request->temp_depart1[$i];
                    $stopOver->duree=$request->duree1[$i];
                    $stopOver->flight_id=$flight->id;
                    $stopOver->save();
                }

             }else{//two way flight
                
                $flight->aller=Carbon::createFromFormat('yy-m-d', $request->aller);
                $flight->aller_duree=$request->aller_duree;
                $flight->aller_depar_heur=$request->aller_depar_heur;
                $flight->aller_arret_heur=$request->aller_arret_heur;

                $flight->retour=Carbon::createFromFormat('yy-m-d', $request->retour);
                $flight->retour_duree=$request->retour_duree;
                $flight->retour_depar_heur=$request->retour_depar_heur;
                $flight->retour_arret_heur=$request->retour_arret_heur;

                $flight->save();
                for(  $i=0; $i < (int)$request->stopOverNum2;$i++){
                    $stopOver=new StopOver();
                    $stopOver->stop_over_type=false;
                    $stopOver->lieu=$request->lieu2[$i];
                    $stopOver->air_port=$request->air_port2[$i];
                    $stopOver->temp_arrive=$request->temp_arrive2[$i];
                    $stopOver->temp_depart=$request->temp_depart2[$i];
                    $stopOver->duree=$request->duree2[$i];
                    $stopOver->flight_id=$flight->id;
                    $stopOver->save();


                }
                for(  $i=0; $i < (int)$request->stopOverNum3;$i++){
                    $stopOver=new StopOver();
                    $stopOver->stop_over_type=true;
                    $stopOver->lieu=$request->lieu3[$i];
                    $stopOver->air_port=$request->air_port3[$i];
                    $stopOver->temp_arrive=$request->temp_arrive3[$i];
                    $stopOver->temp_depart=$request->temp_depart3[$i];
                    $stopOver->duree=$request->duree3[$i];
                    $stopOver->flight_id=$flight->id;
                    $stopOver->save();


                }
             }
               return redirect()->route('airLine')->with('statusMsg','your Flight add successfully. ');

    }
    function validateInput(Request $request){
        $validate=Validator::make($request->all(), [
            'depart' => 'nullable|required|max:40',
            'arret' => 'nullable|required|max:40',
            'price' => 'nullable|required|numeric|min:0',
            'place_num'=> 'nullable|required|integer|min:0',
            'service'=> 'nullable|required|max:40',
            'flight_type'=> 'nullable|required|boolean',
            'aller1'=> 'required_if:flight_type,0|nullable|max:40 |after_or_equal:'.Carbon::now()->format('Y-m-d'),
            'aller_duree1'=> 'required_if:flight_type,0|nullable|max:40 ',
            'aller_depar_heur1'=> 'required_if:flight_type,0|nullable|max:40 ',
            'aller_arret_heur1'=> 'required_if:flight_type,0|nullable|max:40 ',
            'stopOverNum1'=>' required_if:flight_type,0|integer|' ,
            'aller'=> 'required_if:flight_type,1|nullable|max:40 |before:'.$request->retour.'|after_or_equal:'.Carbon::now()->format('Y-m-d'),
            'aller_duree'=>'required_if:flight_type,1|nullable|max:40 ',
            'aller_depar_heur'=> 'required_if:flight_type,1|nullable|max:40 ',
            'aller_arret_heur'=>'required_if:flight_type,1|nullable|max:40 ',
            'stopOverNum2'=>' required_if:flight_type,1|integer ' ,
            'retour'=> 'required_if:flight_type,1|nullable|max:40  ',
            'retour_duree'=>'required_if:flight_type,1|nullable|max:40 ',
            'retour_depar_heur'=> 'required_if:flight_type,1|nullable|max:40 ',
            'retour_arret_heur'=>'required_if:flight_type,1|nullable|max:40 ',
            'stopOverNum3'=>' required_if:flight_type,1|integer|' ,
            'lieu1.*'=>'exclude_if:stopOverNum1,0|required_if:flight_type,0|nullable|max:40 ',
            'temp_arrive1.*'=>'exclude_if:stopOverNum1,0|required_if:flight_type,0|nullable|max:40 ',
            'temp_depart1.*'=>'exclude_if:stopOverNum1,0|required_if:flight_type,0|nullable|max:40 ',
            'duree1.*'=>'exclude_if:stopOverNum1,0|required_if:flight_type,0|nullable|max:40 ',
            'air_port1.*'=>'exclude_if:stopOverNum1,0|required_if:flight_type,0|nullable|max:40 ',
            
            'lieu2.*'=>'exclude_if:stopOverNum2,0|required_if:flight_type,1|nullable|max:40 ',
            'temp_arrive2.*'=>'exclude_if:stopOverNum2,0|required_if:flight_type,1|nullable|max:40 ',
            'temp_depart2.*'=>'exclude_if:stopOverNum2,0|required_if:flight_type,1|nullable|max:40 ',
            'duree2.*'=>'exclude_if:stopOverNum2,0|required_if:flight_type,1|nullable|max:40 ',
            'air_port2.*'=>'exclude_if:stopOverNum2,0|required_if:flight_type,1|nullable|max:40 ',

            'lieu3.*'=>'exclude_if:stopOverNum3,0|required_if:flight_type,1|nullable|max:40 ',
            'temp_arrive3.*'=>'exclude_if:stopOverNum3,0|required_if:flight_type,1|nullable|max:40 ',
            'temp_depart3.*'=>'exclude_if:stopOverNum3,0|required_if:flight_type,1|nullable|max:40 ',
            'duree3.*'=>'exclude_if:stopOverNum3,0|required_if:flight_type,1|nullable|max:40 ',
            'air_port3.*'=>'exclude_if:stopOverNum3,0|required_if:flight_type,1|nullable|max:40 ',

            
        ])->validate();

    }
    function payment($request){ 
        //this is just a test for payment 
        $card=$request->card;
        $cardnumbr=$request->cardnumbr;
        $cardcvv=$request->cardcvv;
        $ExpM=$request->ExpM;
        $ExpY=$request->ExpY;

        if((int)$card==0){//0 master card
            if($cardnumbr=='123456789123456'&&$cardcvv=='123'&&$ExpM=='11'&&$ExpY=='2021')
                return true;
        }else{//1 visa card
            if($cardnumbr=='987654321987654'&&$cardcvv=='321'&&$ExpM=='11'&&$ExpY=='2021')
            return true;

        }
    
        return false;

    }
}
