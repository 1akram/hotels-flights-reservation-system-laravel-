@extends('layouts.masterPage')
@section('pageTitle','reservation detials')
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
            
        <div class="brd-cntc mb-4">
            <div class="mb-4">
                <span class="fas fa-align-left icn-tlt"></span>
                <span class="ml-2 tlt-fnt">Details of your reservation</span>
            </div>


            <div class="row   border-top pb-4 ml-4 mr-4 pt-3">

                <div class="row  w-100">
                    <div class="col-sm-4 font-weight-bold">
                        <div class="mb-3">E-mail adress :</div>
                    </div>
                     <div class="col-sm-8  text-center font-small font-weight-bold text-muted pt-2">
                        <div class="mb-3">{{$client->email}}</div>
                     </div>
                </div>

                <div class="row w-100 ">
                    <div class="col-sm-4 font-weight-bold">
                        <div class="mb-3">First Name:</div>
                    </div>
                     <div class="col-sm-8  text-center font-small font-weight-bold text-muted pt-2">
                        <div class="mb-3">{{$reservation->pivot->first_name}}</div>
                     </div>
                </div>

                <div class="row w-100 ">
                    <div class="col-sm-4 font-weight-bold">
                        <div class="mb-3">Last Name:</div>
                    </div>
                     <div class="col-sm-8  text-center font-small font-weight-bold text-muted pt-2">
                        <div class="mb-3">{{$reservation->pivot->last_name}}</div>
                     </div>
                </div>

                <div class="row w-100 ">
                    <div class="col-sm-4 font-weight-bold">
                        <div class="mb-3">Gender:</div>
                    </div>
                     <div class="col-sm-8  text-center font-small font-weight-bold text-muted pt-2">
                        <div class="mb-3">{{$reservation->pivot->sexe}}</div>
                     </div>
                </div>

                <div class="row w-100 ">
                    <div class="col-sm-4 font-weight-bold">
                        <div class="mb-3">Birth Day:</div>
                    </div>
                     <div class="col-sm-8  text-center font-small font-weight-bold text-muted pt-2">
                        <div class="mb-3">{{$reservation->pivot->birth_day}}</div>
                     </div>
                </div>

                <div class="row w-100 ">
                    <div class="col-sm-4 font-weight-bold">
                        <div class="mb-3">Passport Number</div>
                    </div>
                     <div class="col-sm-8  text-center font-small font-weight-bold text-muted pt-2">
                        <div class="mb-3">{{$reservation->pivot->passport_number}}</div>
                     </div>
                </div>
                
 

                <div class="row w-100 ">
                    <div class="col-sm-4 font-weight-bold">
                        <div class="mb-3">Hotel :</div>
                    </div>
    
                    <div class="col-sm-8  text-center font-small font-weight-bold text-muted pt-2">
                        <div class="mb-3">{{$reservation->hotel->name }}</div>
 
                    </div>
                </div>

                <div class="row w-100 ">
                    <div class="col-sm-4 font-weight-bold">
                        <div class="mb-3">Hotel Address :</div>
                    </div>
    
                    <div class="col-sm-8  text-center font-small font-weight-bold text-muted pt-2">
                        <div class="mb-3">{{$reservation->hotel->street}},{{$reservation->hotel->city}},{{$reservation->hotel->state}},{{$reservation->hotel->country}}</div>
 
                    </div>
                </div>

                <div class="row w-100 ">
                    <div class="col-sm-4 font-weight-bold">
                        <div class="mb-3">Check in :</div>
                    </div>
    
                    <div class="col-sm-8  text-center font-small font-weight-bold text-muted pt-2">
                        <div class="mb-3">{{$reservation->pivot->check_in  }}</div>
 
                    </div>
                </div>

                <div class="row w-100 ">
                    <div class="col-sm-4 font-weight-bold">
                        <div class="mb-3">Check out</div>
                    </div>
    
                    <div class="col-sm-8  text-center font-small font-weight-bold text-muted pt-2">
                        <div class="mb-3">{{$reservation->pivot->check_out  }}</div>
                         
                    </div>
                </div>

                <div class="row w-100 ">
                    <div class="col-sm-4 font-weight-bold">
                        <div class="mb-3">Room Type</div>
                    </div>
    
                    <div class="col-sm-8  text-center font-small font-weight-bold text-muted pt-2">
                        <div class="mb-3">{{$reservation->roomType->name.':'.$reservation->name}}</div>

                    </div>
                </div>

                <div class="row w-100 ">
                    <div class="col-sm-4 font-weight-bold">
                        <div class="mb-3">Rooms  </div>
                    </div>
    
                    <div class="col-sm-8  text-center font-small font-weight-bold text-muted pt-2">
                        <div class="mb-3">{{$reservation->pivot->rooms}}</div>
 
                    </div>
                </div>

                <div class="row w-100 ">
                    <div class="col-sm-4 font-weight-bold">
                        <div class="mb-3">Total Price  </div>
                    </div>
    
                    <div class="col-sm-8  text-center font-small font-weight-bold text-muted pt-2">
                        <div class="mb-3">{{$reservation->pivot->total_price}}</div>
 
                    </div>
                </div>

                <div class="row w-100 ">
                    <div class="col-sm-4 font-weight-bold">
                        <div class="mb-3">Reservation Date  </div>
                    </div>
    
                    <div class="col-sm-8  text-center font-small font-weight-bold text-muted pt-2">
                        <div class="mb-3">{{$reservation->pivot->created_at->format('d-m-Y')}}</div>
 
                    </div>
                </div>

 
               
            </div>
 
        </div>

        </div>
           
    </div>
    <!-- end body -->

 @endsection

 @section('extr')
 @endsection