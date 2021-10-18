 

 @extends('layouts.masterPage')
 @section('pageTitle','hotel details')
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
    table.table tr th:first-child {
  
        width: auto;
    }
</style>
@endsection
  @section('content')
    <!-- body -->
    <!-- map  -->
    <div id="mapContainer" class="collapse">
        <div id="map"></div>
    </div>
    <!-- end map  -->
    <!--  body -->
    <div class="container containerCost">
        <div class="row flex-row-reverse ">
            <!-- left section  -->
            <div class="col-md-4  col-sm-12">
                <div class="map-btn mb-2">
                    <!-- map btn  -->
                    <button  type="submit" class="btn  bg-color-r" id="map-btn" >Map</button>
                    <!-- end map btn  -->
                </div>
                <!-- search -->
                <div class="Acc searchAcc">
                    <div class="AccH searchHead d-flex ">
                        <i class="far fa-search icon-color-red mr-3"></i><span> Check Availability </span>
                    </div>
                    <div id="search" class="AccB searchBody show">
                        <!-- search form  -->
                        <form action="{{ route('hotelDetail',["id"=>$hotel->id ]) }}" method="GET" id="searchForm">
                            <!-- checkIn -->@csrf
                            <div class="lable"><i class="far fa-calendar-alt icon-color-red mr-3"></i> Check In </div>
                            <div class="input-group">
                                <input type="date" class="form-control" name="checkIn">
                            </div>
                            <!-- end checkIn -->
                            <!-- checkOut -->
                            <div class="lable"><i class="far fa-calendar-alt icon-color-red mr-3"></i> Check Out </div>
                            <div class="input-group  ">
                                <input type="date" class="form-control" name="checkOut">
                            </div>
                            <!-- end checkOut -->
                            <div class="search-btn">
                                <!-- search btn  -->
                                <button type="submit" class="btn mt-3  bg-color-g" id="search-btn"
                                    form="searchForm">Check now</button>
                                <!-- end search btn  -->
                            </div>
                        </form>
                        <!-- end search form  -->
                    </div>
                </div>
                <!-- search end -->
            </div>
            <!-- end left section  -->
            <!-- right section  -->
            <div class="col-md-8 col-sm-12">
                <!-- gallery  -->
                <div class="row gallery">
                    <div id="gallery" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            @php
                                $isTheFirst=true;
                            @endphp
                            @foreach ($hotel->rooms as $room)
                                @if ($room->imgs->count()>0)
                                    @foreach ($room->imgs as $img)
                                            <div class="carousel-item
                                                @if ($isTheFirst)
                                                    active
                                                    @php
                                                        $isTheFirst=false;
                                                    @endphp
                                                @endif "> {{--active--}}
                                                <img src="{{asset(Storage::url($img->url))}}">
                                            </div>
                                    @endforeach
                                @endif
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#gallery" data-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </a>
                        <a class="carousel-control-next" href="#gallery" data-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </a>
                    </div>
                </div>
                <!-- end gallery  -->
                <!-- description  -->
                <div class="row description ">
                    <div class="col ">
                        <h3>Description</h3>
                        <p>{{$hotel->description}}</p>
                    </div>
                </div>
                <!-- end description  -->
                <!-- facilitys  -->
                <div>
                    <h3>Facilitys</h3>
                    <div class="row  ">
                        <div class="col">
                            <ul class="  facilitys">
                                @foreach ($hotel->facilities as $facilitie)
                                    <li class="list-inline-item">
                                        <i class="far {{$facilitie->icon}} color-r"></i>
                                        <span class="d-block">{{$facilitie->name}}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- end facilitys  -->
                <!-- room types  -->
                <div class="roomTypes">
                    <h3>Rooms</h3>
                    <div class="row rooms ">
                        <div class="col">
                            <table class="table  table-striped">
                                <thead>
                                    <tr>
                                        <th>Room</th>
                                        <th>Guests</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- room  -->
                                    @foreach ($hotel->rooms as $room)
                                        
                                    
                                        <tr>
                                            <td>
                                            <div class="roomName">{{$room->roomType->name}}: {{$room->name}} </div>
                                                <div class="roomBeds">
                                                    @foreach ($room->bads as $bad)
                                                      <span data-toggle="tooltip" title="{{$bad->name}}!"><i class="far {{$bad->icon}} color-r"></i>x {{$bad->pivot->badsNum}}</span>
                                                    @endforeach
                                                </div>
                                                <div class="roomAmenities">
                                                    <ul>
                                                        @foreach ($room->amenities as $amenitie)
                                                            <li class="list-inline-item">
                                                                <span><i class="far {{$amenitie->icon}} color-r"></i>{{$amenitie->name}}</span>
                                                            </li>
                                                        @endforeach
                                                        
                                                    </ul>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="roomGuests">
                                                    <span><i class="far fa-user-times color-r"></i> {{$room->guests}}</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="roomNumbers row">
                                                    <div class="col-sm-3">
                                                        <i class="far fa-door-open color-r"></i>
                                                    </div>
                                                    <div class="col-sm-9">
                                                    <form id="reservation{{$room->id}}" method="post"  action="{{ route('hotelReservation',["id"=>$hotel->id]) }}">
                                                            @csrf
                                                        @empty(!$defInDays)
                                                         <input type="hidden" name="defInDays" value="{{$defInDays}}" >
                                                        @endempty
                                                        <input type="hidden" name="roomId" value="{{$room->id}}" >
                                                        <input type="hidden" name="checkIn" value="{{request()->get('checkIn') }}" >
                                                        <input type="hidden" name="checkOut" value="{{request()->get('checkOut') }}" >
                                                            <select name="rooms" id="d">
                                                                @for ($i = 0; $i < $room->roomsNumAvialable ; $i++)
                                                                <option value="{{$i+1}}">{{$i+1}}</option>
                                                                @endfor
                                                            </select>
                                                    </form>
                                                    </div>
                                                    <div col-sm-12 id="total">
                                                    <span data-price-night="{{$room->price}}">{{$room->price}}</span>
                                                        <span class="fa-layers icon-color-red">
                                                            <i class="fas fa-circle"></i>
                                                            <i class="fa-inverse far fa-dollar-sign"
                                                                data-fa-transform="shrink-5"></i>
                                                        </span>
                                                        <span class="d-block"><small>for night</small></span>
                                                    </div>

                                                </div>
                                                <div class="roomReserv">@empty(!request()->get('checkOut')&&!request()->get('checkIn'))
                                                    <button  form="reservation{{$room->id}}" class="bg-color-r">reservation</button>
                                                     
                                                @endempty
                                                </div>
                                            </td>
                                        </tr>
                                        <!-- end room  -->
 
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- end room types  -->
                <!-- reviews  -->
                <div class="row reviews">
                    <div class="col-sm-12">
                        <div class="scores d-flex align-items-center">
                            <div class="mr-auto">
                                <h3>Reviews</h3>
                            </div>
                            <span class=" score fa-layers fa-fw d-inline-block ">
                                <i class="far fa-circle color-r"></i>
                            <span class="fa-layers-text  " data-fa-transform="shrink-11 ">{{$hotel->rating()}}</span>
                            </span>
                            <span class=" ">{{$hotel->reviews->count()}} review </span>
                        </div>
                    </div>
                     @foreach ($hotel->reviews as $review)
                        
                        <div class="col-sm-12 review">
                            <div>
                                <div class="reviewHead">
                                    <a href=" "><img src="  @if (!empty($review->avatar))
                                        {{asset( Storage::url($review->avatar))}} 
                                      @else
                                        {{asset('img/avatar.png')}} 
                                      @endif " alt=""></a>
                                <h3>{{$review->name}}</h3>
                                <div class="date"><small>{{$review->pivot->created_at->format('d-m-Y')}}</small></div>
                                </div> 
                                <p>{{$review->pivot->review}}</p>
                            </div>
                        </div>
                    @endforeach
                  
                    <!-- end reviews  -->

                    @auth
                    
                                       @if ($hotel->canAddReview(1))
                                           
                                       <!-- review text area -->
                                       <div class="col-sm-12 review">
                                           <div>
                                               <div class="reviewHead">
                                                   <a href="#"><img src="  @if (!empty(Auth::user()->avatar))
                                                    {{asset( Storage::url(Auth::user()->avatar))}} 
                                                  @else
                                                    {{asset('img/avatar.png')}} 
                                                  @endif " alt=""></a>
                                               <h3>{{Auth::user()->name}}</h3>
                                               </div>
                                           <form class="form flex-column" action="{{route('addReview')}}" method="POST">
                                               @csrf
                                                   <div class="form-group mb-2">
                                                   <input type="hidden" name="hotelId" value="{{$hotel->id}}">
                                                   <input type="hidden" name="userId" value=" {{Auth::user()->id}}">{{-- --}}
                                                       <label for="rating" class="font-weight-bold">Rating </label>
                                                        <select id="rating" name="rating" class="custom-select">
                                                            @for ($i = 1; $i <=10; $i++)
                                                               <option value="{{$i}}" >{{$i}}</option>
                                                               @endfor
                                                         </select>
                                                       </div>
                                                       <textarea name="review" id="review" rows="4"></textarea>
                                                       <button class="btn bg-color-g">Submit</button>
                                                   </form>
                                                   
                                               </div>
                                           </div>
                                           <!-- end text area  -->
                                       @endif
                        
                    @endauth









                    @php
                         $latlng="";
                        $latlng=$latlng.'{ title:"'.$hotel->name.'",latlng:'.$hotel->latlng().'} ,';
                            
                    @endphp

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

 