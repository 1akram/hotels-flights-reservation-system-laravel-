<?php

namespace App\Http\Controllers;
 use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Storage;

use App\RoomType;
use App\BadType;
use App\Room;
use App\Amenitie;
use App\Img;


class RoomController extends Controller
{
    public function edit($hotelId,$id){
        $room=Room::find($id) ;
        $amenities=Amenitie::all()->sortBy("name");
        $roomTypes=RoomType::all()->sortBy("name");
        $badTypes=BadType::all()->sortBy("name");
         return view('HotelLayout\EditRoom',compact(
            'hotelId',
            'roomTypes',
            'badTypes',
            'room',
            'amenities',
            
        ));


    }
    public function update(Request $request,$hotelId,$id){

        $request->request->add(['id' => $id]); 
        $request->request->add(['rooms' => 1]);
        $this->validateInput($request);
        $validate=Validator::make($request->all(), [
            'id' => 'nullable|integer|exists:hotels,id'
            ])->validate();

        $room=  Room::find($id) ;
       
        $room->name=$request->roomName;
         $room->price=(float)$request->price;
        $room->room_type_id=$request->roomType;
         
        $bedType=BadType::find($request->bedType0);
        $guests=((int)$request->bedsNumber0)*((int)$bedType->size);
        $bedType=BadType::find($request->bedType1);
          if($bedType&&$bedType->count()>0){

            $guests+=((int)$request->bedsNumber1)*((int)$bedType->size);
         }
        $bedType=BadType::find($request->bedType2);
        if($bedType&&$bedType->count()>0){

            $guests+=((int)$request->bedsNumber2)*((int)$bedType->size);
         }
        $room->guests=$guests;
        
        $room->save();
        $room->amenities()->sync($request->amenities);
        $room->bads()->sync([]);
        $bedType=BadType::find($request->bedType0);
        $room->bads()->attach($bedType->id, ['badsNum' => $request->bedsNumber0]);
        $bedType=BadType::find($request->bedType1);
          if($bedType&&$bedType->count()>0){

            $room->bads()->attach($bedType->id,  ['badsNum' => $request->bedsNumber1]);
        }
        $bedType=BadType::find($request->bedType2);
        if($bedType&&$bedType->count()>0){

            $room->bads()->attach($bedType->id,  ['badsNum' => $request->bedsNumber2]);
        }

         


        return redirect()->route('myRooms',['hotel_id'=>$hotelId])->with('statusMsg','room update successfully');

    }
    public function delete(){
        dd('delet function heena mn ba3d lazem tatakhdam ');
    }
    public function create($hotelId){
        $roomTypes=RoomType::all()->sortBy("name");
        $amenities=Amenitie::all()->sortBy("name");

        $badTypes=BadType::all()->sortBy("name");
         return view('HotelLayout\AddRoom',compact(
            'hotelId',
            'roomTypes',
            'badTypes',
            'amenities',
            
        ));
        
    }   


    public function store(Request $request,$hotelId){
       
         $this->validateInput($request);

        $room= new Room();
        $room->name=$request->roomName;
        $room->roomsNum=$request->rooms;
        $room->price=(float)$request->price;
        $room->room_type_id=$request->roomType;
        $room->hotel_id=$hotelId;
        
        $bedType=BadType::find($request->bedType0);
        $guests=((int)$request->bedsNumber0)*((int)$bedType->size);
        $bedType=BadType::find($request->bedType1);
          if($bedType&&$bedType->count()>0){

            $guests+=((int)$request->bedsNumber1)*((int)$bedType->size);
         }
        $bedType=BadType::find($request->bedType2);
        if($bedType&&$bedType->count()>0){

            $guests+=((int)$request->bedsNumber2)*((int)$bedType->size);
         }
        $room->guests=$guests;
        
        $room->save();
        $room->amenities()->sync($request->amenities);
        $bedType=BadType::find($request->bedType0);
        $room->bads()->attach($bedType->id, ['badsNum' => $request->bedsNumber0]);
        $bedType=BadType::find($request->bedType1);
          if($bedType&&$bedType->count()>0){

            $room->bads()->attach($bedType->id,  ['badsNum' => $request->bedsNumber1]);
        }
        $bedType=BadType::find($request->bedType2);
        if($bedType&&$bedType->count()>0){

            $room->bads()->attach($bedType->id,  ['badsNum' => $request->bedsNumber2]);
        }

         


        return redirect()->route('myRooms',['hotel_id'=>$hotelId])->with('statusMsg','room add successfully');
           

    }
    public function show($hotelId,$id){
        $room=Room::find($id);
        return view("HotelLayout\img",compact(
            'room',
            'hotelId',
        ));
    }
    public function uploadIMG(Request $request,$hotelId,$id){
         if ($request->hasFile('imgs')) {
                
            $validate=Validator::make($request->all(), [
                'imgs.*' => 'mimes:jpeg,png|max:2050',
                ])->validate();
                $room=Room::find($id);
                foreach($request->file('imgs')as $img){
                    if ($img->isValid()) {
                        $url=  $img->store('images', 'public' );
                        $img= new Img();
                        $img->url=$url;
                        $room->imgs()->save($img);
                     }
                }
                return redirect()->route('showRoom',['hotel_id'=>$hotelId,'id'=>$id])->with('statusMsg','images uploaded successfully');
        }
        return redirect()->route('showRoom',['hotel_id'=>$hotelId,'id'=>$id])->with('statusMsg','could not upload images') ->with('statusError','error');
 
    }

    public function deleteIMG(Request $request,$hotelId,$roomId,$id){
        $room=Room::find($roomId);
        $img=$room->imgs->find($id);
         
        if(!empty($img))
        {

           if( Storage::disk('public')->delete($img->url) ){
               $img->delete();
               return redirect()->route('showRoom',['hotel_id'=>$hotelId,'id'=> $roomId])->with('statusMsg','image deleted successfully') ;
           }
            
        }
        return redirect()->route('showRoom',['hotel_id'=>$hotelId,'id'=>$roomId])->with('statusMsg','could not delete image ') ->with('statusError','error');

    }
    public function myRooms($hotelId){
         $rooms =Room::all()->where("hotel_id",$hotelId);
         return view('HotelLayout\MyRooms',compact(
            'rooms',
            'hotelId',
        ));

    }
    
    function validateInput(Request $request){
        $validate=Validator::make($request->all(), [
            'roomType' => 'nullable|required|integer|exists:room_types,id',
            'roomName' => 'nullable|required|max:40',
            'rooms'=> 'nullable|required|integer|min:0',
            'amenities.*'=> 'nullable|required|exists:amenities,id',
            'bedType0'=> 'nullable|required|integer|exists:bads,id',
            'bedType1'=> 'nullable|integer',
            'bedType2'=> 'nullable|integer',
            'bedsNumber0'=>'nullable|required|integer|between:1,5',
            'bedsNumber1'=>'nullable|required|integer|between:1,5',
            'bedsNumber2'=>'nullable|required|integer|between:1,5',
            'price'=> 'nullable|required|numeric|min:0',
        ])->validate();

    }
}
