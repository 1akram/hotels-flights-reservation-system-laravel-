<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Facilitie;
use App\Language;
use App\Hotel;
use Illuminate\Support\Carbon;
use App\User;
use App\Room;
 
class HotelController extends Controller
{
    
    
    public function myHotels(){
        $hotels=Auth::user()->hotels;
        
         
        return view('HotelLayout\MyHotels',compact(
            'hotels',
        ));
    }
    
    public function edit($id){
        $hotel=Hotel::find($id);
         
        $facilities=Facilitie::all()->sortBy("name");
        $languages=Language::all()->sortBy("name");
        return view('HotelLayout\EditHotel',compact(
            'hotel',
            'facilities',
            'languages'
        ));


    }
    public function update(Request $request,$id){
        $request->request->add(['id' => $id]);
         $this->validateInput($request);
        $validate=Validator::make($request->all(), [
            'id' => 'nullable|integer|exists:hotels,id'
            ])->validate();
            
            
            
        $hotel=Hotel::find($id);
        $hotel->name=$request->hotelName;
        $hotel->description=$request->hotelDescription;
        $hotel->stars=(int)$request->stars;
        $hotel->contact_name=$request->contactName;
        $hotel->contact_phone=$request->contactPhone;
        $hotel->contact_email=$request->contactEmail;
        $hotel->street=$request->street;
        $hotel->city=$request->city;
        $hotel->state=$request->state;
        $hotel->postal_code=$request->zipCode;
        $hotel->country=$request->country;
        $hotel->lat=$request->lat;
        $hotel->lng=$request->lng;
        $hotel->save();
        $hotel->facilities()->sync($request->facilities);
        $hotel->languages()->sync($request->languages);
        return redirect()->route('myHotels')->with('statusMsg','Hotel update successfully');


    }
    public function delete(Request $request,$id){
        dd( "delet hotel function henna  lazem tatakhdam (isDeleted==1) ");
    }
    public function create(){
        $facilities=Facilitie::all()->sortBy("name");
        $languages=Language::all()->sortBy("name");
        return view('HotelLayout\AddHotel',compact(
            'facilities',
            'languages'
        ));
        
    }   
    public function store(Request $request){

            $this->validateInput($request);
            $hotel= new Hotel();
            $hotel->name=$request->hotelName;
            $hotel->description=$request->hotelDescription;
            $hotel->stars=(int)$request->stars;
            $hotel->contact_name=$request->contactName;
            $hotel->contact_phone=$request->contactPhone;
            $hotel->contact_email=$request->contactEmail;
            $hotel->street=$request->street;
            $hotel->city=$request->city;
            $hotel->state=$request->state;
            $hotel->postal_code=$request->zipCode;
            $hotel->country=$request->country;
            $hotel->lat=$request->lat;
            $hotel->lng=$request->lng;
            $hotel->user_id= Auth::user()->id;
            $hotel->save();
            $hotel->facilities()->sync($request->facilities);
            $hotel->languages()->sync($request->languages);
 

            return redirect()->route('myHotels')->with('statusMsg','Hotel add successfully');
           

    }
    public function show(Request $request){
        $hotels=Hotel::all();
        $facilities=Facilitie::all();
        if($request->exists('checkIn')&& $request->exists('checkOut')){
            $validate=Validator::make($request->all(), [
                'checkOut' => 'nullable|required ',
                'checkIn' => 'nullable|required|before:'.$request->checkOut.'|after_or_equal:'.Carbon::now()->format('Y-m-d'),
                ])->validate();
            $b=Carbon::createFromFormat('yy-m-d', $request->checkIn);
            $a=Carbon::createFromFormat('yy-m-d', $request->checkOut);
                $hotelss=collect();
            foreach($hotels as $hotel){
                $ht=$hotel->avialableRooms($b,$a,(int)$request->rooms);
                if($ht->count()>0 &&  $ht->where('guests','>=',$request->guests)->count()>0 ){
                    $hotelss->push($hotel);
                }
            }
           
            $hotels=$hotelss;
        }
         
        return view('HotelLayout\Hotels',compact(
            'hotels', 
            'facilities',
        ));

    }
    public function hotelDetail(Request $request ,$id){
        $request->request->add(['id' => $id]);
         $validate=Validator::make($request->all(), [
            'id' => 'nullable|integer|exists:hotels,id'
            ])->validate();
        $hotel=Hotel::find($id);
        $defInDays=null;
        if($request->exists('checkIn')&& $request->exists('checkOut')){
            $validate=Validator::make($request->all(), [
                'checkOut' => 'nullable|required ',
                'checkIn' => 'nullable|required|before:'.$request->checkOut.'|after_or_equal:'.Carbon::now()->format('Y-m-d'),
                ])->validate();
            $b=Carbon::createFromFormat('yy-m-d', $request->checkIn);
            $a=Carbon::createFromFormat('yy-m-d', $request->checkOut);
            $hotel->rooms=$hotel->avialableRooms($b,$a);
            $defInDays=$b->diffInDays($a);

        }
        

        return view('HotelLayout\HotelDetails',compact(
            'hotel',
            'defInDays',

        ));

    }

    
    public function hotelReservation(Request $request,$id){
        $request->request->add(['id' => $id]);
         $validate=Validator::make($request->all(), [
            'id' => 'nullable|integer|exists:hotels,id',
            'roomId' => 'nullable|integer|exists:rooms,id'
            ])->validate();
        $room=Room::find($request->roomId);
        $defInDays=(int)$request->defInDays;
        $checkIn=$request->checkIn;
        $checkOut=$request->checkOut;
        $room->roomsNumAvialable=(int)$request->rooms;
        $user=  Auth::user() ;
         return view('HotelLayout\HotelReservationDetail',compact(
            'room',
            'defInDays',
            'checkIn',
            'checkOut',
            'user',


        ));
    }

    public function confirmation(Request $request){
        $validate=Validator::make($request->all(), [
            'roomId' => 'nullable|integer|exists:rooms,id',
            'firstName'=>'nullable|required',
            'lastName'=>'nullable|required',
            'sexe'=>'nullable|required',
            'datebirth'=>'nullable|required',
            'passport'=>'nullable|required',
            'checkIn'=>'nullable|required',
            'checkOut'=>'nullable|required',
            'rooms'=>'nullable|required',
             
 

            ]) ;
            if ($validate->fails()) {
                return redirect()->route('showHotels' ) 
                            ->withErrors($validate)
                            ->withInput();
            }
        $room=Room::find($request->roomId);
        if($this->payment($request )){
            $room->reservations()->attach(Auth::user()->id,  [
                'first_name' => $request->firstName,
                'last_name'=>$request->lastName,
                'sexe'=>$request->sexe,
                'birth_day'=> $request->datebirth ,
                'passport_number' => $request->passport,
                'check_in'=>Carbon::createFromFormat('yy-m-d', $request->checkIn),
                'check_out'=>Carbon::createFromFormat('yy-m-d', $request->checkOut),
                'rooms'=>(int)$request->rooms,
                'total_price'=>(int)$request->rooms*(Carbon::createFromFormat('yy-m-d', $request->checkIn)->diffInDays(Carbon::createFromFormat('yy-m-d', $request->checkOut)))*$room->price,
                
            ]) ;
            return redirect()->route('myReservations')->with('statusMsg','reservation  successful');
        }

        return redirect()->route('myReservations' )->with('statusMsg','could not reservation  ') ->with('statusError','error');

    }
    public function myReservations(){

        return view('HotelLayout\MyReservations');
    }


    public function printReservationDetials($id,$roomId=null){

        if(Auth::user()->role==config('roles.role')['client']) 

            $reservation=Auth::user()->reservations()->wherePivot('id',$id)->get()->first();  
            
        else{
            $room=Room::find($roomId);
            $client_id=Auth::user()->hotels->where('id',$room->hotel->id)->first()
                                    ->rooms->where('id',$room->id)->first()
                                    ->reservations()->wherePivot('id',$id)->get()->first()->pivot->user_id;
            $reservation=User::find($client_id)->reservations()->wherePivot('id',$id)->get()->first();   
        }
        $client=User::find($reservation->pivot->user_id);
        
        if(!empty($reservation)&&$reservation->count()>0)
            return view('HotelLayout\PrintReservationDetials',compact(
                'reservation','client'
            ));
        

        return redirect()->back()->with('statusMsg','could not find this reservation  ') ->with('statusError','error');;

    }


    public function addReview(Request $request){

        $hotel=Hotel::find($request->hotelId);
         if(!empty($hotel)&&$hotel->canAddReview(1)){
            $hotel->reviews()->attach($hotel->id, ['review' => $request->review,'rating' => $request->rating]);
            return redirect()->back()->with('statusMsg','review add  successfuly');
        }
        return redirect()->back()->with('statusMsg','could not add review  ') ->with('statusError','error');;

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
    function validateInput(Request $request){
        $validate=Validator::make($request->all(), [
            'hotelName' => 'nullable|required|max:40',
            'hotelDescription' => 'nullable|required|max:512',
            'stars'=> 'nullable|required|integer|between:1,5',
            'contactName'=> 'nullable|required|alpha_dash|max:40',
            'contactEmail'=> 'nullable|required|email|max:40',
            'contactPhone'=> 'nullable|required|integer|',
            'facilities.*'=> 'nullable|required|exists:facilities,id',
            'languages.*'=> 'nullable|required|exists:languages,id',
            'street'=> 'nullable|required|string|max:40',
            'city'=> 'nullable|required|string|max:40' ,
            'state'=>'nullable|required|string|max:40' ,
            'zipCode'=>'nullable|required|integer|' ,
            'country'=> 'nullable|required|string|max:40',
            'lat'=> 'nullable|required|numeric',
            'lng'=> 'nullable|required|numeric',

            
        ])->validate();

    }
}
