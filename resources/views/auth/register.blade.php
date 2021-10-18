@extends('layouts.masterPage')
@section('pageTitle','register')
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
  <div class="container containerCost" >
    <div class="row  ">
        <div class="row col-sm-8 m-auto log">
            <form method="POST" action="
            @if (empty($isHotelOwner))
             {{ route('register') }} 
                
            @else
              {{ route('registerHotelOwnerStore') }}
            @endif " class="w-100 form">
                @csrf
                <div class="formTab">
                    <!-- email password -->
                    <div class="row mb-3 align-items-center justify-content-center">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="email" class="font-weight-bold"><i class="far fa-envelope color-r ml-2 mr-2"></i>Email address </label>
                                <input type="email" class="form-control" placeholder="Enter email" id="email" name="email">
                            </div>
                            <div class="form-group mb-4">
                                <label for="pwd" class="font-weight-bold"><i class="far fa-lock-alt color-r ml-2 mr-2"></i>Password </label>
                                <input type="password" class="form-control" placeholder="Enter password" id="pwd" name="password">
                            </div>
                            <div class="form-group mb-4">
                                <label for="password_confirmation" class="font-weight-bold"><i class="far fa-lock-alt color-r ml-2 mr-2"></i>Password </label>
                                <input type="password" class="form-control" placeholder="Enter password" id="password_confirmation" name="password_confirmation">
                            </div>
                        </div>
                    </div>
                    <!-- end email password  -->
                </div>
                <div class="formTab">
                    <!-- first last name  -->
                    <div class="row mb-3 align-items-center justify-content-center">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="firstName" class="font-weight-bold"><i class="far fa-id-card color-r ml-2 mr-2"></i>FirstName </label>
                                <input type="text" class="form-control" placeholder="Enter your first name" id="firstName" name="firstName">
                            </div>
                            <div class="form-group mb-4">
                                <label for="lastName" class="font-weight-bold"><i class="far fa-id-card color-r ml-2 mr-2"></i>LastName </label>
                                <input type="text" class="form-control" placeholder="Enter your last name" id="lastName" name="lastName">
                            </div>
                        </div>
                    </div>
                    <!-- end first last name  --> 

                    <!-- gender birthday  -->
                    <div class="row mb-3 align-items-center justify-content-center">
                        <div class="col-sm-6">
                            <div class="form-group mb-4">
                                <label for="birthDay" class="font-weight-bold"><i class="far fa-birthday-cake color-r ml-2 mr-2"></i>BirthDay </label>
                                <input type="date" class="form-control" placeholder="Enter birthDay" id="birthDay" name="birthDay">
                            </div>
                            <div class="form-group">  
                                <label  class="font-weight-bold"><i class="far fa-venus-mars color-r ml-2 mr-2"></i>Gender </label>
                                <div class="custom-radio " >
                                    <input type="radio" id="male" name="gender" value="male" >
                                    <label for="male" class="font-weight-bold">Male</label>
                                    <input type="radio" id="female" name="gender" value="female" >
                                    <label for="female" class="font-weight-bold">Female</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end gender birthday  -->  
                    <!-- phone number  -->
                    <div class="row mb-3 align-items-center justify-content-center">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="phone" class="font-weight-bold"><i class="far fa-id-card color-r ml-2 mr-2"></i>Phone number </label>
                                <input type="text" class="form-control " placeholder="Endter your phone number" id="phone" name="phone">
                            </div>
                        </div>
                    </div>
                    <!-- end phone number  -->                                            
                </div>
                <div class="formTab">
                    <!-- address  -->
                    <div class="row mb-3 align-items-center justify-content-center">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="street" class="font-weight-bold">Street </label>
                                <input type="text" class="form-control" placeholder="street" id="route" name="street">
                            </div>
                            <div class="form-group mb-4">
                                <label for="city" class="font-weight-bold">City </label>
                                <input type="text" class="form-control" placeholder="city" id="locality" name="city">
                            </div>
                            <div class="form-group mb-4">
                                <label for="state" class="font-weight-bold">State </label>
                                <input type="text" class="form-control" placeholder="state" id="administrative_area_level_1" name="state">
                            </div>
                            <div class="form-group mb-4">
                                <label for="zipCode" class="font-weight-bold">Zip Code </label>
                                <input type="text" class="form-control" placeholder="Enter your zop code" id="postal_code" name="zipCode">
                            </div>
                            <div class="form-group mb-4">
                                <label for="country" class="font-weight-bold">Country </label>
                                <input type="text" class="form-control" placeholder="Enter your country" id="country" name="country">
                            </div>
                        </div>
                    </div>
                    <!-- end address  -->
                </div>
                <div class="row justify-content-around">
                    <button type="button"   class="btn bg-color-r formPriv">priv</button>
                    <button type="button"   class="btn bg-color-r formNext">next</button>
                    <button   type="submit" class="btn  bg-color-r formBtn">Register</button>
                </div>
            </form> 
            <div class="row col-sm-12  justify-content-center">
                <a class="d-block   color-b" href="{{route("login")}}">have account?</a>
            </div>


        </div>

    </div>
</div>
<!-- end body -->

@endsection
@section('extr')
@endsection