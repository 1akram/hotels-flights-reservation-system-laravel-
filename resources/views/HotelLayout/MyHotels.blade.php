@extends('layouts.masterPage')
@section('pageTitle','my hotels')
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
                <!-- hotel  -->

                @if ($hotels->count()<=0)
                    {{-- msg there is no hotels  --}} there is no hotels yet
                @else
                    @foreach ($hotels as $hotel)
                        <div class="row   MyHotelsList" >
                            <a href="{{route('myRooms',["hotel_id"=>$hotel->id])}}" class="col-md-6 ">
                                <div class=" d-flex flex-column"  >
                                    <h3>{{$hotel->name}}</h3>
                                <small><i class="far fa-map-marked-alt color-r mr-1"></i> {{$hotel->street}},{{$hotel->city}},{{$hotel->state}},{{$hotel->country}}</small>
                                </div>
                            </a>
                            <div class="col-md-6 d-flex flex-nowrap p-0"  >
                                <form action="{{route('deleteHotel',["id"=>$hotel->id])}}" method="POST" id="deleteForm">@csrf</form>
                                <button type="submit" class="btn btn-a bg-color-r delete" form="deleteForm"><i class="far fa-trash-alt mr-2"></i> Delete</button>
                                 <a  href="{{route('editHotel',["id"=>$hotel->id])}}" class="btn btn-a  bg-color-g edit"><i class="far fa-edit"></i> Edit</a>
 
        
                            </div>
                        </div>
                    @endforeach
                @endif

                <!-- end hotel  -->
                
                <!-- addHotelbutton  -->
                <div class="row justify-content-center addNewHotel">
                    <a href="{{ route('addHotel') }}"class="col-sm-8  ">
                            <i class="fas fa-plus " ></i>
                    </a>
                </div>
                <!-- end addHotelbutton  -->
            </div>

        </div>
    </div>
    <!-- end body -->

 @endsection

 @section('extr')
 @endsection