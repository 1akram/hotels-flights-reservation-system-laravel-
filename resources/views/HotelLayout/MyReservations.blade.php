@extends('layouts.masterPage')
@section('pageTitle','my reservations')
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
                

                 
                     
                     
                      
                     
                    @foreach ( Auth::user()->reservations as $reservation)
                        <div class="row   MyHotelsList" >
                            <a href="" class="col-md-8  ">
                                <div class=" d-flex flex-column"  >
                                    <h3>{{$reservation->pivot->first_name}} {{$reservation->pivot->last_name}}</h3>
                                <small><i class="far fa-map-marked-alt color-r mr-1"></i> {{$reservation->pivot->check_in}} --> {{$reservation->pivot->check_out}} , {{$reservation->pivot->total_price}}$</small>
                                </div>
                            </a>
                            <div class="col-md-3 d-flex flex-nowrap p-0"  >
                                   <a  href="{{route('printReservationDetials',["id"=>$reservation->pivot->id])}}" class="btn   btn-a  bg-color-g edit"><i class="far fa-edit"></i> print</a>
        
                            </div>
                        </div>
                    @endforeach
                 

                 
                
 
            </div>

        </div>
    </div>
    <!-- end body -->

 @endsection

 @section('extr')
 @endsection