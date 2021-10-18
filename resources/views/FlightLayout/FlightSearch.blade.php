@extends('layouts.masterPage')
@section('pageTitle','flights')
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


 
      
      <!--body-->
      <div class="container-fluid pad">
        <div class="row">
          <div class="col-foor">
          <form action="{{route('searcheFlights')}}" method="POST">@csrf
              <div class="d-flex mb-2">
                <div class="custom-radio ">
                  <input type="radio" id="rdoundtrip" class=" tablink"   checked name="FlightType" value="1">
                  <label for="rdoundtrip" class="font-weight-bold">Round Trip</label>
                  <input type="radio"   class="  tablink"id="oneWay" name="FlightType" value="0">
                  <label for="oneWay" class="font-weight-bold">one way Trip</label>
                </div>
              </div>

              <div >
                <div class="input-grp-rslt">
                  <input type="text" class="form-control" name="depart" placeholder="From ?">
                  <label class="from"><i class="fas fa-plane-departure mr-1"></i> | </label>
                </div>

                <div class="input-grp-rslt mr-3">
                  <input type="text" class="form-control" name="arret" placeholder="To .. ?">
                  <label class="to"><i class="fas fa-plane-arrival mr-1"></i> | </label>
                </div>

                <div class="input-grp-rslt">
                  <input type="date" class="form-control select-date" name="aller" placeholder="DD/MM/YYYY">
                  <label class="to"><i class="fas fa-calendar-alt mr-1"></i> | </label>
                </div>

                <div class="input-grp-rslt mr-3 " id="retourDate">
                  <input type="date" class="form-control select-date" name="retour" placeholder="DD/MM/YYYY">
                  <label class="returnlabl"><i class="fas fa-calendar-alt mr-1"></i> | </label>
                </div>
                <div class="input-search posre">
                   <button type="submit" class="btn btn-primary search">Search<i
                        class="fas fa-search"></i></button> 
                </div>
              </div>
 
            </form>
          </div>
        </div>
        <div class="container">

        
          <div class=" row">
          


            <!-- col two -->
            <div class="col-two   col-sm-8 ">
 
              <div class="accordion" id="Flights">
                @foreach ($flights as $flight)
                {{-- /*******/ --}}
                <div class="card mb-3 card-stl">
                  <div class="card-header pl-0 pr-0" id="head{{$flight->id}}">
                    
                        
                   
                    {{-- // --}}
                    <div class="row">
                      <div class="col-sm-9">
                        <button class="btn btn-link btn-block" type="button" data-toggle="collapse"
                          data-target="#flight{{$flight->id}}" aria-controls="flight{{$flight->id}}">
                          <div class="row mb-0">
                            {{-- aller --}}
                            <div class="col-sm-12 row">
                              <div class="col-sm-3">
                                <img class="logo mb-2 pt-2" src="@if (!empty($flight->airLine->user->avatar))
                                    {{asset( Storage::url($flight->airLine->user->avatar))}} 
                                   @else
                                   {{asset('img/avatar.png')}} 
                                   @endif"
                                  width="55" height="55" alt="air-algerie-logo">
                                <p class="logo-nm mb-li">{{$flight->airLine->name}}</p>
                              </div>
                              <div class="col-sm-8 row align-items-center">
                                 <div class="col-sm-3"><h6>{{$flight->aller_depar_heur}} h:m</h6></div>
                                 <div class="col-sm-2"><h4>-</h4></div>
                                 <div class="col-sm-3"><h6>{{$flight->aller_arret_heur}} h:m</h6></div>
                                 <div class="col-sm-3"> {{$flight->aller_duree}} hours </div>
                              </div>
                            </div>
                            {{-- aller  --}}
                            @if ($flight->flight_type) {{-- if flight type is round --}}
                              {{--   --}}
                              <div class="col-sm-12 row">
                                <div class="col-sm-3">
                                  <img class="logo mb-2 pt-2" src="@if (!empty($flight->airLine->user->avatar))
                                      {{asset( Storage::url($flight->airLine->user->avatar))}} 
                                    @else
                                    {{asset('img/avatar.png')}} 
                                    @endif"
                                    width="55" height="55" alt="air-algerie-logo">
                                  <p class="logo-nm mb-li">{{$flight->airLine->name}}</p>
                                </div>
                                <div class="col-sm-8 row align-items-center">
                                  <div class="col-sm-3"><h6>{{$flight->retour_depar_heur}} h:m</h6></div>
                                  <div class="col-sm-2"><h5>-</h5></div>
                                  <div class="col-sm-3"><h6>{{$flight->retour_arret_heur}} h:m</h6></div>
                                  <div class="col-sm-3"> {{$flight->retour_duree}} hours</div>
                                </div>
                              </div>
                              {{--    --}}
                            @endif
                          </div>
                        </button>
                      </div>
                      <div class="col-sm-3 row  align-items-center">
                        <div class="col-sm-12 "><h4> {{$flight->price}} $</h4></div>
                        <div class="col-sm-12">
                          <a href="{{route('reservation',["id"=>$flight->id])}}">
                            <button type="button" class="btn lina2">Book Now </button>
                          </a>
                        </div>
                      </div>
                    </div>
                    {{-- // --}}
                  </div>

                  <div id="flight{{$flight->id}}" class="collapse" aria-labelledby="head{{$flight->id}}" data-parent="#Flights">
                    <div class="card-body pl-4">
                      <div class="depart">
                        <div class="d-flex justify-content-between">
                          <div>
                            <span class="dprt mr-3">Depart</span>
                            <span class="dpr-lieu">{{$flight->depart}}</span>
                            <span class="">-</span>
                            <span class="dpr-lieu">{{$flight->arret}}</span>
                          </div>

                          <div>
                            <span class="dpr-time">{{$flight->aller}}</span>
                          </div>
                          <div>
                            <span class="dpr-time">{{$flight->aller_depar_heur}} hours</span>
                          </div>
                        </div>
                        <div class="brdr-cntn pr-3 mt-2">
                          {{-- // --}}
                          @foreach ($flight->stopOvers as $stopOver)
                          @if (!$stopOver->stop_over_type)
                          <div class="mb-4">
                            <div class="mt-2 dpr-lieu d-flex justify-content-between mb-1">
                              <div class="mt-3 dt-drt">
                                <span class="mr-4 ml-5">{{$flight->aller}}</span>
                                <span>{{$stopOver->temp_arrive}} h:m</span>
                                <span>-</span>
                                <span>{{$stopOver->temp_depart}} h:m</span>
                              </div>
                              <div class="mt-3">
                                <span class="dt-drt">{{$stopOver->duree}} hours</span>
                              </div>
                            </div>
                            <div class="mr-p">
                              <div>
                                <span class="fnt-bl">{{$stopOver->lieu}}</span>
                              </div>
                            <div class="fnt-bl"> {{$stopOver->air_port}}</div>
                            </div>
                          </div>
                          @endif
                          @endforeach
                          {{-- //// --}}
                        </div>
                      </div>
                      @if ($flight->flight_type)
                         <div class="return">
                          <div class="d-flex justify-content-between mt-4">
                            <div>
                              <span class="dprt mr-3">Return</span>
                              <span class="dpr-lieu">{{$flight->arret}}</span>
                              <span class="">-</span>
                              <span class="dpr-lieu">{{$flight->depart}}</span>
                            </div>
                            <div>
                              <span class="dpr-time">{{$flight->retour}}</span>
                            </div>
                            <div>
                              <span class="dpr-time">{{$flight->retour_duree}} hours</span>
                            </div>
                          </div>
                          <div class="brdr-cntn pr-3 mt-2">
                            @foreach ($flight->stopOvers as $stopOver)
                            @if ($stopOver->stop_over_type) 
                            <div class="mb-4">
                              <div class="mt-2 dpr-lieu d-flex justify-content-between mb-1">
                                <div class="mt-3 dt-drt">
                                  <span class="mr-4 ml-5">{{$flight->retour}}</span>
                                  <span>{{$stopOver->temp_arrive}} h:m</span>
                                  <span>-</span>
                                  <span>{{$stopOver->temp_depart}} h:m</span>
                                </div>
                                <div class="mt-3">
                                  <span class="dt-drt">{{$stopOver->duree}} hours</span>
                                </div>
                              </div>
                              <div class="mr-p">
                                <div>
                                  <span class="fnt-bl">{{$stopOver->lieu}}</span>
                                </div>
                              <div class="fnt-bl"> {{$stopOver->air_port}}</div>
                              </div>
                            </div>
                            @endif
                            @endforeach
                          </div>
                        </div>
                      @endif
                      <div class="mt-3 mr-4 ml-4">
                        <a href="{{route('reservation',["id"=>$flight->id])}}"><button type="button" class="btn lina2">Book The Flight</button></a>
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
                {{--    --}}
              </div>
            </div>
            <!-- col two -->
 
            <!-- col three -->
            <div class="col-three  col-sm-3 ">
              <div class="trstd mb-3">
                <div class="bld-wght"><i class="fas fa-shield-alt mr-3 mb-3 text-primary fnt-lrg"></i>TRUSTED CHOICE</div>
                <div class="sml-wght"><i class="fas fa-plane mr-2 mb-2 clr-icn"></i>Compare flights from 650 airlines
                </div>
                <div class="sml-wght"><i class="fas fa-user-alt mr-2 mb-2 clr-icn"></i>14 million customers per year</div>
                <div class="sml-wght"><i class="fas fa-lock mr-2 mb-2 clr-icn"></i>Secure payment</div>
              </div>

              <div class="heart mb-2">
                <div class="bld-wght"><i class="	far fa-heart mr-2 text-info fnt-lrg"></i>ALWAYS INCLUDED</div>
                <div class="sml-wght"><span class="fnt-lrg2 mr-2">.</span>Comparison between a huge number of flights,
                  quality-assured booking and secure payment</div>
                <div class="sml-wght"><span class="fnt-lrg2 mr-2">.</span>Access to professional customer service</div>
                <div class="sml-wght"><span class="fnt-lrg2 mr-2">.</span>Free rebooking to the airline’s option when
                  schedule changes occur</div>
              </div>
            </div>
            <!-- col three -->
          </div>
         </div>
      </div>
      <!--body-->


 @endsection

 @section('extr')
 






 <script >
 
  $(document).ready(function(){
    $('#retourDate').hide();
    if($('#rdoundtrip').is(':checked')){
      $('#retourDate').show();
    }
    
    
    $("#rdoundtrip").click(function(){
        $('#retourDate').show();
    });

    $("#oneWay").click(function(){
        $('#retourDate').hide();
    });

  });
  
  
</script>
<script src="js/main2.js"></script>

 @endsection