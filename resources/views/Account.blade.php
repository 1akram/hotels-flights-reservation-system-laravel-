@extends('layouts.masterPage')
@section('pageTitle','Account')
@section('head')
<style>
    .c-navebar {
        background-color: #fff;
        border-bottom: .5px solid rgba(0, 0, 0, 0.200);
        position: relative;
    }

    .topbar {
        background-color: #6695a3;
    }
</style>
@endsection

@section('content')

    <!--  body -->
    <div class="container containerCost">
        <div class="row justify-content-center">
            <div class="accountAvatar">
                <div class="fileUploadTarget d-flex justify-content-center align-items-center" >
                    <i class="far fa-camera color-r"></i>
                </div> 
                <img  src="@if (!empty(Auth::user()->avatar))
                  {{asset( Storage::url(Auth::user()->avatar))}} 
                @else
                  {{asset('img/avatar.png')}} 
                @endif " > 
            <form action="{{route('updateAvatar')}}" method="POST"  enctype="multipart/form-data">@csrf
                <input class="fileUpload" type="file" id="avatar" name="avatar">
            </form>
            </div>
        </div>
        <div class="row justify-content-center  ">
            <div>
                <!-- Nav tabs -->
                <ul class="nav  facilitys">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#about-you">About you</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#contact-info">Contact info</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#address">Address</a>
                    </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#password">Password</a>
                                </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <!-- Tab panes --> 
            <div class="tab-content w-100 mt-3">
                <div class="tab-pane container active" id="about-you">
                    <div class="row col-sm-8 m-auto log">
                    <form action="{{route('storeAccount')}}" method="POST" class="w-100 form " id="info">@csrf
                            <!-- first last name  -->
                            <div class="row mb-3 align-items-center justify-content-center">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="firstName" class="font-weight-bold"><i
                                                class="far fa-id-card color-r ml-2 mr-2"></i>FirstName </label>
                                        <input type="text" class="form-control" placeholder="Enter your first name"
                                        id="firstName" value="{{Auth::user()->name}}" name="firstName">
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="lastName" class="font-weight-bold"><i
                                                class="far fa-id-card color-r ml-2 mr-2"></i>LastName </label>
                                        <input type="text" value="{{Auth::user()->lastName}}" class="form-control" placeholder="Enter your last name" id="lastName"
                                            name="lastName">
                                    </div>
                                </div>
                            </div>
                            <!-- end first last name  -->
                            <!-- gender birthday  -->
                            <div class="row mb-3 align-items-center justify-content-center">
                                <div class="col-sm-6">
                                    <div class="form-group mb-4">
                                        <label for="birthDay" class="font-weight-bold"><i
                                                class="far fa-birthday-cake color-r ml-2 mr-2"></i>BirthDay </label>
                                        <input type="date" value="{{Auth::user()->birthDay}}" class="form-control" placeholder="Enter birthDay" id="birthDay"
                                            name="birthDay">
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-bold"><i
                                                class="far fa-venus-mars color-r ml-2 mr-2"></i>Gender </label>
                                        <div class="custom-radio ">
                                            <input type="radio" @if (Auth::user()->sex=='male')
                                                checked
                                            @endif id="male" name="gender" value="male">
                                            <label for="male" class="font-weight-bold">Male</label>
                                            <input type="radio" @if  (Auth::user()->sex=='female') 
                                                checked
                                            @endif id="female" name="gender" value="female">
                                            <label for="female" class="font-weight-bold">Female</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end gender birthday  -->
                            <div class="row justify-content-lg-around">
                                <button type="submit" class="btn  bg-color-r">save </button>
                            </div>
                        </form>
        
                    </div>
                </div>
                <div class="tab-pane container fade" id="address">
                    <div class="row col-sm-8 m-auto log">
                        <div class="w-100 form ">
                             <!-- address  -->
                            <div class="row mb-3 align-items-center justify-content-center">
                                <div class="col-sm-6">
 
                                    <div class="form-group">
                                        <label for="street" class="font-weight-bold">Street </label>
                                        <input form="info" value="{{Auth::user()->street}}" type="text" class="form-control" placeholder="street" id="route" name="street">
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="city" class="font-weight-bold">City </label>
                                        <input form="info" value="{{Auth::user()->city}}" type="text" class="form-control" placeholder="city" id="locality" name="city">
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="state" class="font-weight-bold">State </label>
                                        <input type="text" form="info" value="{{Auth::user()->state}}" class="form-control" placeholder="state"
                                            id="administrative_area_level_1" name="state">
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="zipCode" class="font-weight-bold">Zip Code </label>
                                        <input type="text" form="info" value="{{Auth::user()->postal_code}}" class="form-control" placeholder="Enter your zop code"
                                            id="postal_code" name="zipCode">
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="country" class="font-weight-bold">Country </label>
                                        <input type="text" form="info" value="{{Auth::user()->country}}" class="form-control" placeholder="Enter your country" id="country"
                                            name="country">
                                    </div>
                                </div>
                            </div>
                            <!-- end address  -->
                            <div class="row justify-content-lg-around">
                                <button form="info" type="submit" class="btn  bg-color-r">save </button>
                            </div>
                        </div>
        
                    </div>
                </div>
                <div class="tab-pane container fade" id="password">
                    <div class="row col-sm-8 m-auto log">
                    <form action="{{route('updatePasse')}}" method="POST" class="w-100 form">
                            <!--password -->@csrf
                            <div class="row mb-3 align-items-center justify-content-center">
                                <div class="col-sm-6">
                                    <div class="form-group mb-4">
                                        <label for="pwd" class="font-weight-bold"><i
                                                class="far fa-lock-alt color-r ml-2 mr-2"></i>Password </label>
                                        <input type="password" class="form-control" placeholder="Enter password" id="pwd"
                                            name="password">
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="pwd" class="font-weight-bold"><i
                                                class="far fa-lock-alt color-r ml-2 mr-2"></i>Password </label>
                                        <input type="password" class="form-control" placeholder="Enter password" id="pwd"
                                            name="password_confirmation">
                                    </div>
                                </div>
                            </div>
                            <!-- end password  -->
                            <div class="row justify-content-lg-around">
                                <button type="submit" class="btn  bg-color-r">save </button>
                            </div>
                        </form>
        
                    </div>
                </div>
                <div class="tab-pane container fade " id="contact-info">
                    <div class="row col-sm-8 m-auto log">
                        <div  class="w-100 form">
                             <!-- email phone -->
                            <div class="row mb-3 align-items-center justify-content-center">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="email" class="font-weight-bold"><i
                                                class="far fa-envelope color-r ml-2 mr-2"></i>Email address </label>
                                        <input form="info" value="{{Auth::user()->email}}" type="email" class="form-control" placeholder="Enter email" id="email"
                                            name="email">
                                    </div>
                                    <div class="form-group">
                                        <label for="phone" class="font-weight-bold"><i class="far fa-id-card color-r ml-2 mr-2"></i>Phone number </label>
                                        <input type="text" form="info" value="{{Auth::user()->phone}}" class="form-control " placeholder="Endter your phone number" id="phone" name="phone">
                                    </div>
                                </div>
                            </div>
                            <!-- end email  phone -->
                            <div class="row justify-content-lg-around">
                                <button form="info" type="submit" class="btn  bg-color-r">save </button>
                            </div>
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