@extends('layouts.masterPage')
@section('pageTitle','my rooms')
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
        <div class="row">
           
            
            <div class="col-md-12  col-sm-12 ">
                <!-- room  -->

                @if ($rooms->count()<=0)
                    {{-- msg there is no rooms  --}}ther is no Rooms
                @else
                    @foreach ($rooms as $room)
                        <div class="row   MyHotelsList" >
                            <a href="{{route('showRoom',['hotel_id'=>$room->hotel->id,'id'=>$room->id])}}" class="col-md-6 ">
                                <div class=" d-flex flex-column"  >
                                    <h3>{{$room->name}}</h3>
                                <div class=" p-0 m-0 d-flex flex-row ">
                                    <small class="mr-3 "><i class="far fa-door-open color-r mr-1"></i> {{$room->roomsNum}}</small>
                                    <small class="mr-3 "><i class="far fa-user-times color-r mr-1"></i> {{$room->guests}}</small>
                                    <small class="mr-3 "><i class="far fa-dollar-sign color-r mr-1"></i> {{$room->price}}</small>

                                </div>
                                </div>
                            </a>
                            <div class="col-md-6 d-flex flex-nowrap p-0"  >
                                <form action="{{route('deleteRoom',["hotel_id"=>$hotelId,'id'=>$room->id])}}" method="POST" id="deleteForm">@csrf</form>
                                <button type="submit" class="btn btn-a bg-color-r delete" form="deleteForm"><i class="far fa-trash-alt mr-2"></i> Delete</button>
                                 <a  href="{{route('editRoom',["hotel_id"=>$hotelId,'id'=>$room->id])}}" class="btn btn-a  bg-color-g edit"><span><i class="far fa-edit"></i> Edit</span></a>
        
                            </div>
                        </div>
                    @endforeach
                @endif

                <!-- end room  -->
                
                <!-- addroomBTN  -->
                <div class="row justify-content-center addNewHotel">
                    <a href="{{ route('addRoom',['hotel_id'=>$hotelId]) }}"class="col-sm-8  ">
                            <i class="fas fa-plus " ></i>
                    </a>
                </div>
                <!-- end addroomBTN  -->
            </div>

        </div>
    </div>
    <!-- end body -->

 @endsection

 @section('extr')
 @endsection