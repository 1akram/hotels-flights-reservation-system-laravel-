@extends('layouts.masterPage')
@section('pageTitle','hotels')
 @section('head')
     <style>
         .alert{
            margin-top: 100px;
         }
     </style>
 @endsection

@section('content')


<!-- body -->
    <div class="header">
        <div class="headerBG headerBGSlid"><img  src="img/hotelBG.jpg" alt=""></div>
    </div> 
    <!-- map  -->
    <div id="mapContainer" class="collapse">
        <div id="map"></div>
    </div>
    <!-- end map  -->
    <div class="container containerCost">
        <div class="row">
            <!-- left section  -->
            <div class="col-md-3 col-sm-12 ">
                <div class="map-btn mb-2">
                    <!-- map btn  -->
                    <button  type="submit" class="btn  bg-color-r" id="map-btn" >Map</button>
                    <!-- end map btn  -->
                </div>
                <div class="search-btn">
                    <!-- search btn  -->
                     <button type="submit" class="btn  bg-color-g" id="search-btn" form="searchForm">Search</button>
                    <!-- end search btn  -->
                </div>
                <!-- search -->
                <div class="Acc searchAcc">
                    <div class="AccH searchHead d-flex justify-content-between" data-toggle="collapse"   data-target="#search">
                      <i class="far fa-search icon-color-red mr-3"></i><span> Search </span><span ><i class="far fa-minus icon-color-red"></i></span>
                    </div>
                    <div id="search" class="AccB searchBody show" >
                        <!-- search form  -->
                    <form action="{{route('showHotels')}}" method="GET" id="searchForm">
                            <!-- checkIn -->
                            <div class="lable" ><i class="far fa-calendar-alt icon-color-red mr-3"></i> Check In </div>
                            <div class="input-group">
                              <input type="date" class="form-control" name="checkIn">
                            </div>
                            <!-- end checkIn -->
                            <!-- checkOut -->
                            <div class="lable" ><i class="far fa-calendar-alt icon-color-red mr-3"></i> Check Out </div>
                            <div class="input-group  ">
                              <input type="date" class="form-control" name="checkOut">
                            </div>
                            <!-- end checkOut -->
                            <!-- rooms -->
                            <div class="lable" ><i class="far fa-door-open icon-color-red mr-3"></i> Rooms  </div>
                            <div class="input-group  room">
                                <div class="input-group-prepend w-25 RM" id="RM">
                                  <span class="input-group-text w-100"><i class="far fa-minus icon-color-red m-auto"></i></span>
                                </div>
                                <input type="text" class="form-control"  name="rooms" id="rooms" pattern="[0-9]+" readonly value="1">
                                <div class="input-group-append w-25 RP" id="RP">
                                    <span class="input-group-text w-100"><i class="far fa-plus icon-color-red m-auto"></i></span>
                                </div>
                            </div>
                            <!-- end rooms  -->
                            <!-- guests -->
                            <div class="lable" ><i class="far fa-users icon-color-red mr-3"></i> Guests  </div>
                            <div class="input-group  guests mb-3">
                                <div class="input-group-prepend w-25 RM" id="GM">
                                  <span class="input-group-text w-100"><i class="far fa-minus icon-color-red m-auto"></i></span>
                                </div>
                                <input type="text" class="form-control"  name="guests" id="guests" pattern="[0-9]+" readonly value="1" >
                                <div class="input-group-append w-25 RP" id="GP">
                                    <span class="input-group-text w-100"><i class="far fa-plus icon-color-red m-auto"></i></span>
                                </div>
                            </div>
                            <!-- end guests -->
                        </form> 
                        <!-- end search form  -->
                    </div>
                  </div>
                  <!-- search end -->
                  

            </div>
            <!-- end left section  -->
            <!-- right section  -->
            <div class="col-md-9  col-sm-12">
                <div class="row">
                    @php
                            $latlng="";
                    @endphp
                    @foreach ($hotels as $hotel)
                    @php
                            $latlng=$latlng.'{ title:"'.$hotel->name.'",latlng:'.$hotel->latlng().'} ,';
                            
                    @endphp
                        <!-- hotelContainer  -->
                        <div class="col-md-6 ">
                            <div class="hotelContainer">
                                <div class="hotelImg">
                                    <a class="d-block" href="{{ route('hotelDetail',["id"=>$hotel->id]) }}">
                                        <img  class="img-thumbnail" src="{{asset(Storage::url($hotel->randomIMG()))}}">
                                        <div class=" overlay">
                                            <div class="short_info">
                                                <span class=" score fa-layers fa-fw d-inline-block " >
                                                    <i class="far fa-circle icon-color-red"></i>
                                                    <span class="fa-layers-text fa-inverse" data-fa-transform="shrink-11 " >{{$hotel->rating()}}</span>
                                                </span>
                                                <span class="review">{{$hotel->reviews->count()}} review </span>
                                                <ul class="fa-ul">
                                                     @for ($i = 0; $i <6 ; $i++)
                                                     @if ($i<$hotel->facilities->count() )
                                                      <li><span class="fa-li"><i class="far {{$hotel->facilities[$i]->icon}}"></i></span>{{$hotel->facilities[$i]->name}}</li>   
                                                     @endif
                                                    @endfor

                                                </ul>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="hotelContent row" >
                                    <div class="col-sm-8">
                                        <h4>{{$hotel->name}} </h4>
                                        <div class="rating  icon-color-red">

                                            @for ($i = 1; $i <= 5; $i++)
                                                @if ($i<=$hotel->stars)
                                                    <i class="fas fa-star"></i>
                                                @else
                                                    <i class="far fa-star"></i>
                                                @endif
                                            @endfor
                                        </div>
                                    </div>
                                    <div class="col-sm-4 price">
                                        <span class="d-block">From / Night</span>
                                            <strong class="">
                                            <span>{{$hotel->rooms->sortBy('price')->first()->price}}</span>
                                            <span class="fa-layers icon-color-red">
                                                <i class="fas fa-circle"></i>
                                                <i class="fa-inverse far fa-dollar-sign" data-fa-transform="shrink-5" ></i>
                                            </span>
                                            </strong>
                                        </span>
                                        
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <!-- end hotelContainer  -->
                    @endforeach
                    

                </div>
            </div>
            <!-- end right section  -->
        </div>
    </div>
<!-- end body -->
 @endsection
 @section('extr')
 <script >
     
     var markR = [ 
        {!! $latlng !!}        
        ];
     
     
  

 </script>
 <script src="{{asset("js/googleMaps.js")}}"></script>
 <script async defer
         src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDRbMFZDRco8ITonULW7kRcsO15RD0U80A&callback=initMap">
 </script>
 @endsection