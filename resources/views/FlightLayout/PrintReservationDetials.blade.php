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
                        <div class="mb-3">{{Auth::user()->email}}</div>
                     </div>
                </div>

                <div class="row w-100 ">
                    <div class="col-sm-4 font-weight-bold">
                        <div class="mb-3">First Name:</div>
                    </div>
                     <div class="col-sm-8  text-center font-small font-weight-bold text-muted pt-2">
                        <div class="mb-3">{{$reservation->first_name}}</div>
                     </div>
                </div>

                <div class="row w-100 ">
                    <div class="col-sm-4 font-weight-bold">
                        <div class="mb-3">Last Name:</div>
                    </div>
                     <div class="col-sm-8  text-center font-small font-weight-bold text-muted pt-2">
                        <div class="mb-3">{{$reservation->last_name}}</div>
                     </div>
                </div>

                <div class="row w-100 ">
                    <div class="col-sm-4 font-weight-bold">
                        <div class="mb-3">Gender:</div>
                    </div>
                     <div class="col-sm-8  text-center font-small font-weight-bold text-muted pt-2">
                        <div class="mb-3">{{$reservation->sexe}}</div>
                     </div>
                </div>

                <div class="row w-100 ">
                    <div class="col-sm-4 font-weight-bold">
                        <div class="mb-3">Birth Day:</div>
                    </div>
                     <div class="col-sm-8  text-center font-small font-weight-bold text-muted pt-2">
                        <div class="mb-3">{{$reservation->birth_date}}</div>
                     </div>
                </div>

                <div class="row w-100 ">
                    <div class="col-sm-4 font-weight-bold">
                        <div class="mb-3">Passport Number</div>
                    </div>
                     <div class="col-sm-8  text-center font-small font-weight-bold text-muted pt-2">
                        <div class="mb-3">{{$reservation->passport_number}}</div>
                     </div>
                </div>
                
 

                <div class="row w-100 ">
                    <div class="col-sm-4  d-flex     align-items-center  font-weight-bold">
                        <div class="mb-3">AirLine :</div>
                    </div>
    
                    <div class="col-sm-8  d-flex flex-column align-items-center justify-content-center  text-center font-small font-weight-bold text-muted pt-2">
                        <div class=""><img class="logo   pt-2" src="@if (!empty($reservation->flight->airLine->user->avatar))
                            {{asset( Storage::url($reservation->flight->airLine->user->avatar))}} 
                          @else
                          {{asset('img/avatar.png')}} 
                          @endif"
                          width="55" height="55" alt="air-algerie-logo"></div>
                        <div class="mb-3">{{$reservation->flight->airLine->name }}</div>
 
                    </div>
                </div>

                <div class="row w-100 ">
                    <div class="col-sm-4 font-weight-bold">
                        <div class="mb-3">Depart :</div>
                    </div>
    
                    <div class="col-sm-8  text-center font-small font-weight-bold text-muted pt-2">
                        <div class="mb-3">{{$reservation->flight->depart}} </div>
 
                    </div>
                </div>

                <div class="row w-100 ">
                    <div class="col-sm-4 font-weight-bold">
                        <div class="mb-3">arrive :</div>
                    </div>
    
                    <div class="col-sm-8  text-center font-small font-weight-bold text-muted pt-2">
                        <div class="mb-3">{{$reservation->flight->arret}}</div>
 
                    </div>
                </div>

                <div class="row w-100 ">
                    <div class="col-sm-4 font-weight-bold">
                        <div class="mb-3">service :</div>
                    </div>
    
                    <div class="col-sm-8  text-center font-small font-weight-bold text-muted pt-2">
                        <div class="mb-3">{{$reservation->flight->service}}</div>
                         
                    </div>
                </div>



              
                    
               

                <div class="row w-100 ">
                    <div class="col-sm-4 font-weight-bold">
                        <div class="mb-3">Aller :</div>
                    </div>
    
                    <div class="col-sm-8  text-center font-small font-weight-bold text-muted pt-2">
                        <div class="mb-3">
                            <div>{{$reservation->flight->aller}}</div>
                            {{$reservation->flight->aller_depar_heur}} H - {{$reservation->flight->aller_arret_heur}} H
                        </div>

                    </div>
                </div>

                <div class="row w-100 ">
                    <div class="col-sm-4 font-weight-bold">
                        <div class="mb-3">Time:  </div>
                    </div>
    
                    <div class="col-sm-8  text-center font-small font-weight-bold text-muted pt-2">
                        <div class="mb-3">{{$reservation->flight->aller_duree}} Hours</div>
 
                    </div>
                </div>

                @if ($reservation->flight->flight_type)
                <div class="row w-100 ">
                    <div class="col-sm-4 font-weight-bold">
                        <div class="mb-3">Retour :</div>
                    </div>
    
                    <div class="col-sm-8  text-center font-small font-weight-bold text-muted pt-2">
                        <div class="mb-3">
                            <div>{{$reservation->flight->retour}}</div>
                            {{$reservation->flight->retour_depar_heur}} H - {{$reservation->flight->retour_arret_heur}} H
                        </div>

                    </div>
                </div>

                <div class="row w-100 ">
                    <div class="col-sm-4 font-weight-bold">
                        <div class="mb-3">Time:  </div>
                    </div>
    
                    <div class="col-sm-8  text-center font-small font-weight-bold text-muted pt-2">
                        <div class="mb-3">{{$reservation->flight->retour_duree}} Hours</div>
 
                    </div>
                </div>

                @endif

                <div class="row w-100 ">
                    <div class="col-sm-4 font-weight-bold">
                        <div class="mb-3">Price :  </div>
                    </div>
    
                    <div class="col-sm-8  text-center font-small font-weight-bold text-muted pt-2">
                        <div class="mb-3">{{$reservation->flight->price}} $</div>
 
                    </div>
                </div>

                <div class="row w-100 ">
                    <div class="col-sm-4 font-weight-bold">
                        <div class="mb-3">Reservation Date  </div>
                    </div>
    
                    <div class="col-sm-8  text-center font-small font-weight-bold text-muted pt-2">
                        <div class="mb-3">{{$reservation->created_at->format('d-m-Y')}}</div>
 
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