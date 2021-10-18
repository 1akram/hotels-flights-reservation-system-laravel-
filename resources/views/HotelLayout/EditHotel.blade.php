

 @extends('layouts.masterPage')
 @section('pageTitle','edit hotel')
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
                <form action="{{ route('updateHotel',["id"=>$hotel->id]) }}" method="post" class="w-100 form">
                    @csrf
                    <!-- tab one  -->
                    <div class="formTab">
                        <div class="row mb-3 align-items-center justify-content-center">
                            <div class="col-sm-6">
                                <!-- hotel name  -->
                                <div class="form-group">
                                    <label for="hotelName" class="font-weight-bold">Hotel name</label>
                                    <input type="text" class="form-control" placeholder="Enter your hotel name"
                                id="hotelName" name="hotelName" value="{{$hotel->name}}">
                                </div>
                                <!-- end hotel name  -->
                                <!-- hotel description  -->
                                <div class="form-group">
                                    <label for="hotelDescription" class="font-weight-bold">Hotel description</label>
                                    <textarea  class="form-control" placeholder="Enter your hotel name" name="hotelDescription" id="hotelDescription" cols="30" rows="5">{{$hotel->description}}</textarea>
                                </div>
                                <!-- end hotel descripton  -->
                                <!-- stars  -->
                                <div class="mb-5">
                                    <div class="lable font-weight-bold"> Stars </div>
                                    <div class="custom-radio">
                                        <input type="radio" id="s1" name="stars" value="1"@if ($hotel->stars==1) checked @endif >
                                        <label for="s1">
                                            <div>
                                                <i class="fas fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                            </div>
                                        </label>
                                    </div>
                                    <div class="custom-radio">
                                        <input type="radio" id="s2" name="stars" value="2" @if ($hotel->stars==2) checked @endif >
                                        <label for="s2">
                                            <div>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                            </div>
                                        </label>
                                    </div>
                                    <div class="custom-radio">
                                        <input type="radio" id="s3" name="stars" value="3" @if ($hotel->stars==3) checked @endif >
                                        <label for="s3">
                                            <div>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                            </div>
                                        </label>
                                    </div>
                                    <div class="custom-radio">
                                        <input type="radio" id="s4" name="stars" value="4" @if ($hotel->stars==4) checked @endif >
                                        <label for="s4">
                                            <div>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="far fa-star"></i>
                                            </div>
                                        </label>
                                    </div>
                                    <div class="custom-radio">
                                        <input type="radio" id="s5" name="stars" value="5" @if ($hotel->stars==5) checked @endif >
                                        <label for="s5">
                                            <div>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                                <!-- end stars  -->
                            </div>
                        </div>
                    </div>
                    <!-- end tab one  -->
                    <!-- tab two -->
                    <div class="formTab">
                        <div class="row mb-3 align-items-center justify-content-center">
                            <div class="col-sm-6">
                                <!--  contact name  -->
                                <div class="form-group">
                                    <label for="contactName" class="font-weight-bold">Contact name</label>
                                    <input type="text" class="form-control" placeholder="Enter your contact name"
                                id="contactName" name="contactName" value="{{$hotel->contact_name}}">
                                </div>
                                <!-- end contact name  -->
                                <!--  email  -->
                                <div class="form-group ">
                                    <label for="contactEmail" class="font-weight-bold">Contact email</label>
                                    <input type="email" class="form-control" placeholder="Enter your phone number"
                                        id="contactEmail" name="contactEmail"  value="{{$hotel->contact_email}}">
                                </div>
                                <!-- end email  -->
                                <!--  Phone number    -->
                                <div class="form-group mb-5">
                                    <label for="contactPhone" class="font-weight-bold">Contact Phone number</label>
                                    <input type="text" class="form-control" placeholder="Enter your contact phone number"
                                        id="contactPhone" name="contactPhone"  value="{{$hotel->contact_phone}}">
                                </div>
                                <!-- end phone number  -->
                            </div>
                        </div>
                    </div>
                    <!-- end tab two  -->
                    <!-- tab therr  -->
                    <div class="formTab">
                        <div class="row mb-3 align-items-center justify-content-center">
                            <div class="col-sm-6">
                                <!-- facility  -->
                                <div class="lable font-weight-bold" > Facility </div>
                                <div class="filterFacility">
                                    @foreach ($facilities as $facilitie)
                                    <div class="custom-checkbox">
                                    <input type="checkbox" id='f{{$facilitie->id}}' name="facilities[]" value="{{$facilitie->id}}"
                                    @foreach ($hotel->facilities as $hotelFacilitie)
                                        @if ($hotelFacilitie->id==$facilitie->id)
                                             checked
                                        @endif
                                    @endforeach >
                                        <label for="f{{$facilitie->id}}">
                                            <i class="fas {{$facilitie->icon}} m-1"></i> <span>{{$facilitie->name}}</span>
                                        </label>
                                    </div>
                                    @endforeach
                                </div>
                                <!-- end facility  -->
                            </div>
                        </div>
                    </div>
                    <!-- end tab three  -->
                    <!-- tab four  -->
                    <div class="formTab">
                        <div class="row mb-3 align-items-center justify-content-center">
                            <div class="col-sm-6">
                                <!-- language  -->
                                <div class="lable font-weight-bold" > Languages </div>
                                <div class="filterFacility">
                                    @foreach ($languages as $language)
                                    <div class="custom-checkbox">
                                    <input type="checkbox" id='l{{$language->id}}'  name="languages[]" value="{{$language->id}}"
                                    @foreach ($hotel->languages as $hotelLanguage)
                                        @if ($hotelLanguage->id==$language->id)
                                             checked
                                        @endif
                                    @endforeach  >
                                    
                                        <label for="l{{$language->id}}">
                                              <span>{{$language->name}}</span>
                                        </label>
                                    </div>
                                    @endforeach
                                </div>
                                <!-- end language  -->
                            </div>
                        </div>
                    </div>
                    <!-- end tab four  -->

                   
                    <!-- tab five  -->
                    <div class="formTab">
                        <!-- address  -->
                        <div class="row mb-3 align-items-center justify-content-center">
                            <div class="col-sm-6">
 
                                <div class="form-group">
                                    <label for="street" class="font-weight-bold">Street </label>
                                    <input type="text" class="form-control" placeholder="street" id="route"
                                name="street" value="{{$hotel->street}}">
                                </div>
                                <div class="form-group mb-4">
                                    <label for="city" class="font-weight-bold">City </label>
                                    <input type="text" class="form-control" placeholder="city" id="locality"
                                        name="city" value="{{$hotel->city}}">
                                </div>
                                <div class="form-group mb-4">
                                    <label for="state" class="font-weight-bold">State </label>
                                    <input type="text" class="form-control" placeholder="state"
                                        id="administrative_area_level_1" name="state" value="{{$hotel->state}}">
                                </div>
                                <div class="form-group mb-4">
                                    <label for="zipCode" class="font-weight-bold">Zip Code </label>
                                    <input type="text" class="form-control" placeholder="Enter your zop code"
                                        id="postal_code" name="zipCode" value="{{$hotel->postal_code}}">
                                </div>
                                <div class="form-group mb-4">
                                    <label for="country" class="font-weight-bold">Country </label>
                                    <input type="text" class="form-control" placeholder="Enter your country"
                                        id="country" name="country" value="{{$hotel->country}}">
                                </div>
                            </div>
                        </div>
                        <!-- end address  -->
                    </div>
                    <!-- end tab five  -->
                    <!-- tab six  -->
                    <div class="formTab">
                        <!-- location  -->
                        <div class="row mb-3 align-items-center justify-content-center">
                            <label for="country" class="font-weight-bold mb-3">Select your hotel place in map </label>
                            <div id="mapContainer" class="w-100">
                                <div id="map"></div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                     <input type="text" class="form-control " 
                                        id="lat" name="lat" hidden value="{{$hotel->lat}}">
                                </div>
                                <div class="form-group">
                                     <input type="text" class="form-control"  id="lng"
                                        name="lng" hidden value="{{$hotel->lng}}">
                                </div>
                            </div>
                        </div>
                        <!-- end location  -->
                    </div>
                    <!-- end tab six  -->
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
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDRbMFZDRco8ITonULW7kRcsO15RD0U80A&libraries=places&callback=initPlace">
    </script>
<script>


function initPlace() {

        var Lat= parseFloat(document.getElementById('lat').value);
        var Lng= parseFloat(document.getElementById('lng').value);
    $(document).ready(function(){

        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 7,
            center: {lat: Lat, lng: Lng}
        });
        
        marker = new google.maps.Marker({
            map: map,
            draggable: true,
            animation: google.maps.Animation.DROP,
            position: {lat:Lat , lng:Lng }
        });
        $("#lat").val(marker.position.lat());
        $("#lng").val(marker.position.lng());
        marker.addListener('dragend', function(){
            $("#lat").val(marker.position.lat());
            $("#lng").val(marker.position.lng());
        });
    });
}

$(document).ready(function(){
    $(".cancelalation-note").children(".span-one").text($("#cancellation").children("option:selected").text());
    $(".cancelalation-note").children(".span-two").text($("#payment").children("option:selected").text());
    $("#cancellation").change(function(){
        $(".cancelalation-note").children(".span-one").text($("#cancellation").children("option:selected").text());
    });
    $("#payment").change(function(){
        $(".cancelalation-note").children(".span-two").text($("#payment").children("option:selected").text());
    });
});
</script>
    @endsection

 

 