 

 @extends('layouts.masterPage')
 @section('pageTitle','add hotel')
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
                <form action="{{ route('storeHotel') }}" method="post" class="w-100 form">
                    @csrf
                    <!-- tab one  -->
                    <div class="formTab">
                        <div class="row mb-3 align-items-center justify-content-center">
                            <div class="col-sm-6">
                                <!-- hotel name  -->
                                <div class="form-group">
                                    <label for="hotelName" class="font-weight-bold">Hotel name</label>
                                    <input type="text" class="form-control" placeholder="Enter your hotel name"
                                        id="hotelName" name="hotelName">
                                </div>
                                <!-- end hotel name  -->
                                <!-- hotel description  -->
                                <div class="form-group">
                                    <label for="hotelDescription" class="font-weight-bold">Hotel description</label>
                                    <textarea  class="form-control" placeholder="Enter your hotel name" name="hotelDescription" id="hotelDescription" cols="30" rows="5"></textarea>
                                </div>
                                <!-- end hotel descripton  -->
                                <!-- stars  -->
                                <div class="mb-5">
                                    <div class="lable font-weight-bold"> Stars </div>
                                    <div class="custom-radio">
                                        <input type="radio" id="s1" name="stars" value="1" checked>
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
                                        <input type="radio" id="s2" name="stars" value="2">
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
                                        <input type="radio" id="s3" name="stars" value="3">
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
                                        <input type="radio" id="s4" name="stars" value="4">
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
                                        <input type="radio" id="s5" name="stars" value="5">
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
                                        id="contactName" name="contactName">
                                </div>
                                <!-- end contact name  -->
                                <!--  email  -->
                                <div class="form-group ">
                                    <label for="contactEmail" class="font-weight-bold">Contact email</label>
                                    <input type="email" class="form-control" placeholder="Enter your phone number"
                                        id="contactEmail" name="contactEmail">
                                </div>
                                <!-- end email  -->
                                <!--  Phone number    -->
                                <div class="form-group mb-5">
                                    <label for="contactPhone" class="font-weight-bold">Contact Phone number</label>
                                    <input type="text" class="form-control" placeholder="Enter your contact phone number"
                                        id="contactPhone" name="contactPhone">
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
                                    <input type="checkbox" id='f{{$facilitie->id}}' name="facilities[]" value="{{$facilitie->id}}">
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
                    <!-- tab therr.1  -->
                    <div class="formTab">
                        <div class="row mb-3 align-items-center justify-content-center">
                            <div class="col-sm-6">
                                <!-- facility  -->
                                <div class="lable font-weight-bold" > Languages </div>
                                <div class="filterFacility">
                                    @foreach ($languages as $language)
                                    <div class="custom-checkbox">
                                    <input type="checkbox" id='l{{$language->id}}'  name="languages[]" value="{{$language->id}}">
                                        <label for="l{{$language->id}}">
                                              <span>{{$language->name}}</span>
                                        </label>
                                    </div>
                                    @endforeach
                                </div>
                                <!-- end facility  -->
                            </div>
                        </div>
                    </div>
                    <!-- end tab three.1  -->

                    
                    <!-- tab four  -->
                    <div class="formTab">
                        <!-- address  -->
                        <div class="row mb-3 align-items-center justify-content-center">
                            <div class="col-sm-6">
 
                                <div class="form-group">
                                    <label for="street" class="font-weight-bold">Street </label>
                                    <input type="text" class="form-control" placeholder="street" id="route"
                                        name="street">
                                </div>
                                <div class="form-group mb-4">
                                    <label for="city" class="font-weight-bold">City </label>
                                    <input type="text" class="form-control" placeholder="city" id="locality"
                                        name="city">
                                </div>
                                <div class="form-group mb-4">
                                    <label for="state" class="font-weight-bold">State </label>
                                    <input type="text" class="form-control" placeholder="state"
                                        id="administrative_area_level_1" name="state">
                                </div>
                                <div class="form-group mb-4">
                                    <label for="zipCode" class="font-weight-bold">Zip Code </label>
                                    <input type="text" class="form-control" placeholder="Enter your zop code"
                                        id="postal_code" name="zipCode">
                                </div>
                                <div class="form-group mb-4">
                                    <label for="country" class="font-weight-bold">Country </label>
                                    <input type="text" class="form-control" placeholder="Enter your country"
                                        id="country" name="country">
                                </div>
                            </div>
                        </div>
                        <!-- end address  -->
                    </div>
                    <!-- end tab four  -->
                    <!-- tab fiv  -->
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
                                        id="lat" name="lat" hidden value="">
                                </div>
                                <div class="form-group">
                                     <input type="text" class="form-control"  id="lng"
                                        name="lng" hidden value="">
                                </div>
                            </div>
                        </div>
                        <!-- end location  -->
                    </div>
                    <!-- end tab fiv  -->
                    <div class="row justify-content-around">
                        <button type="button" class="btn bg-color-r formPriv">priv</button>
                        <button type="button" class="btn bg-color-r formNext">next</button>
                        <button type="submit" class="btn  bg-color-r formBtn">Add</button>
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

        var Lat=36.15954220138314;
        var Lng=3.2660127563476715;
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

 

 