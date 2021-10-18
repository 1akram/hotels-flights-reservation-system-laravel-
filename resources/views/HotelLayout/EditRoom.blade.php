 

 @extends('layouts.masterPage')
 @section('pageTitle','edit room')
 @section('head')
  <style>
    .c-navebar {
        background-color: #fff;
        border-bottom: .5px solid rgba(0, 0, 0, 0.200);
        position: relative;
    }
    .topbar{
        background-color: #6695a3;
    }
</style>
  @endsection
 
 @section('content')
      <!--  body -->
      <div class="container containerCost">
        <div class="row  ">
            <div class="row col-sm-8 m-auto log">
                <form action="{{ route('updateRoom',["hotel_id"=>$hotelId,"id"=>$room->id]) }}" method="post"class="w-100 form">
                    @csrf
                    <!-- tab one  -->
                    <div class="formTab">
                        <!-- room type  -->
                        <div class="row mb-3 align-items-center justify-content-center">
                            <div class="col-sm-6">
                                <div class="form-group mb-2">
                                    <label for="roomType" class="font-weight-bold">Room type </label>
                                    <select id="roomType" name="roomType" class="form-control custom-select">
                                        @foreach ($roomTypes as $roomType)
                                            <option value="{{$roomType->id}}"
                                                @if ($roomType->id==$room->roomType->id)
                                                selected
                                            @endif>{{$roomType->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="roomName" class="font-weight-bold">Room name</label>
                                    <input type="text" class="form-control" placeholder="Enter your Room name"
                                id="roomName" name="roomName"value="{{$room->name}}">
                                </div>

                            </div>
                        </div>
                         <!-- end room type  -->
                    </div>
                    <!-- end tab one  -->
                    <!-- tab two  -->
                    <div class="formTab">
                        <!-- bedoption  -->
                        <div class="row mb-3 align-items-center justify-content-center">
                            <div class="col-sm-6 " id="bedsOption">
                                <label for="bedType1" class=" ">What kind of beds are available in this room? </label>
                                @for ($i = 0; $i < 3; $i++)
                                    <div class="form-group mb-2">
                                        <select id="bedType{{$i}}" name="bedType{{$i}}" class="form-control custom-select bedType">
                                            <option value="0" data-bed-size="0" selected>select bad type</option>
                                            @foreach ($badTypes as $badType)
                                                <option value="{{$badType->id}}" data-bed-size="{{$badType->size}}"
                                                    @if ($room->bads->count() > $i && $room->bads[$i]->id==$badType->id )
                                                       selected
                                                    @endif    
                                                >{{$badType->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group mb-4 w-50 ">
                                        <label for="bedsNumber{{$i}}">number of beds</label>
                                        <select id="bedsNumber{{$i}}" name="bedsNumber{{$i}}" class="form-control custom-select bedsNumber">
                                            <option value="1" 
                                            @if ($room->bads->count() > $i && $room->bads[$i]->pivot->badsNum==1 )
                                               selected
                                            @endif 
                                            >One</option>
                                            <option value="2"
                                            @if ($room->bads->count() > $i && $room->bads[$i]->pivot->badsNum==2 )
                                               selected
                                            @endif 
                                            > Two</option>
                                            <option value="3"
                                            @if ($room->bads->count() > $i && $room->bads[$i]->pivot->badsNum==3 )
                                               selected
                                            @endif 
                                            > Three</option>
                                            <option value="4"
                                            @if ($room->bads->count() > $i && $room->bads[$i]->pivot->badsNum==4 )
                                               selected
                                            @endif 
                                            > Four</option>
                                            <option value="5"
                                            @if ($room->bads->count() > $i && $room->bads[$i]->pivot->badsNum==5 )
                                               selected
                                            @endif 
                                            > Five</option>
                                        </select>
                                        <div class="pN  ml-2 mt-2">
                                            <i class="far fa-user-times mr-1"></i><span class="personNumber">5</span>
                                        </div>
                                    </div>
                                @endfor
                            </div>
                        </div>
                        <!-- end bedoption  -->
                        <!-- price  -->
                        <div class=" row mb-3 align-items-center justify-content-center">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="price" class="font-weight-bold">Price<small>/</small>Night</label>
                                    <div class="input-group  room">
                                        <div class="input-group-prepend w-25 RM" id="RM">
                                        <span class="input-group-text w-100"><i class="far fa-minus icon-color-red m-auto"></i></span>
                                        </div>
                                        <input type="text" class="form-control"  name="price" pattern="[0-9]+"   value="{{$room->price}}">
                                        <div class="input-group-append w-25 RP" id="RP">
                                            <span class="input-group-text w-100"><i class="far fa-plus icon-color-red m-auto"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end price  -->
                    </div>
                    <!-- end tab tow  -->
                    <!-- tab therr  -->
                    <div class="formTab">
                        <div class="row mb-3 align-items-center justify-content-center">
                            <div class="col-sm-6">
                                <!-- amenities  -->
                                <div class="lable font-weight-bold" > Amenities </div>
                                <div class="filterFacility">
                                    @foreach ($amenities as $amenitie)
                                    <div class="custom-checkbox">
                                    <input type="checkbox" id='f{{$amenitie->id}}' name="amenities[]" value="{{$amenitie->id}}"
                                    @foreach ($room->amenities as $RoomAmenitie)
                                        @if ($RoomAmenitie->id==$amenitie->id)
                                             checked
                                        @endif
                                    @endforeach >
                                        <label for="f{{$amenitie->id}}">
                                            <i class="fas {{$amenitie->icon}} m-1"></i>   <span>{{$amenitie->name}}</span>
                                        </label>
                                    </div>
                                    @endforeach
                                </div>
                                <!-- end amenities  -->
                            </div>
                        </div>
                    </div>
                    <!-- end tab three  -->
                    <div class="row justify-content-around">
                        <button type="button" class="btn bg-color-r formPriv">priv</button>
                        <button type="button" class="btn bg-color-r formNext">next</button>
                        <button type="submit" class="btn  bg-color-r formBtn">update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end body -->

 
  
 
   


    @endsection

    @section('extr')
    <script>
        $(document).ready(function(){
            var bT=$(".bedType"); 
            for(var i=0;i<bT.length;i++){
                personNumber($(bT[i]));
            }
           $(".bedType").change(function(){
               personNumber($(this));
           });
           $(".bedsNumber").change(function(){
               personNumber($(this).parent().prev().children(".bedType"));
           });
        });
       function personNumber( bedType){
       
       
           var bedSize= parseInt( bedType.children("option:selected").attr("data-bed-size"));
           var bedsNumber= parseInt( bedType.parent().next().children('.bedsNumber').children("option:selected").val());
           bedType.parent().next().children(".pN").children(".personNumber").text(bedSize*bedsNumber);
           
       
       }
       </script>
    @endsection

 

 