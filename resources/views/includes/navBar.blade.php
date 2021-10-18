<!-- navbar -->
<div class="d-flex c-navebar flex-column ">
    <!-- topbar -->
    <div class="topbar d-flex flex-wrap  ">
        @guest

        <div class="item-group d-flex align-items-center mr-auto">
            <a class="c-n-item" href="" data-toggle="modal" data-target="#modalLoginForm"><i
                    class="far fa-sign-in-alt ml-1 mr-1 icon"></i>LogIN</a>
        </div>
        @endguest
        @auth

        <!-- avatar  -->
        <div class="item-group mr-auto userAvatar  ">
            <a class="c-n-item" href="#avatar" data-toggle="collapse"><img src="@if (!empty(Auth::user()->avatar))
                {{asset( Storage::url(Auth::user()->avatar))}} 
              @else
                {{asset('img/avatar.png')}} 
              @endif " alt=""></a>
            <div class="c-n-i-dropDown collapse" id="avatar">
                <div class="info">
                    <a class="list-group-item">
                    <h4>{{Auth::user()->name}} @if (!empty(Auth::user()->lastName))
                        {{Auth::user()->lastName}}
                    @endif</h4>
                    </a>
                    <a class="list-group-item"><small>{{Auth::user()->email}}</small></a>
                </div>
                <a href="{{route('showAccount')}}" class="list-group-item"><i class="far fa-user-circle icon"></i> Account </a>

                @if (Auth::user()->role==config('roles.role')['HotelOwner'])

                 <a href="{{route('myHotels')}}" class="list-group-item"><i class="far fa-hotel"></i> My Hotels </a>
                 <a href="{{route('addHotel')}}" class="list-group-item"><i class="far fa-plus icon"></i> Add Hotel </a>
                    
                @endif
                @if (Auth::user()->role==config('roles.role')['airLine'])

                <a href="{{route('airLine')}}" class="list-group-item"><i class="far fa-plane"></i> My Flights </a>
                <a href="{{route('addFlight')}}" class="list-group-item"><i class="far fa-plus icon"></i> Add Flight </a>
                   
               @endif
               @if (Auth::user()->role==config('roles.role')['client'])

               <a href="{{route('myFlighReservations')}}" class="list-group-item"><i class="far fa-plane"></i>  Flights Reservations </a>
               <a href="{{route('myReservations')}}" class="list-group-item"><i class="far fa-hotel icon"></i> Hotels Reservations </a>
                  
               @endif
                <button   type="submit" form='logOutForm' class="list-group-item w-100 text-left"><i class="far fa-sign-out-alt icon"></i>logOut </button>
                <form action="{{route('logout')}}" method="POST" id="logOutForm">@csrf</form>
            </div>
        </div>
        <!-- end avatar  -->
        @endauth
        <div class="item-group d-flex align-items-center">
            <a class="c-n-item" href="#"><i class="far fa-envelope ml-1 mr-1 icon"></i>Hotel@service.com</a>
        </div>
        <div class="item-group d-flex align-items-center">
            <a class="c-n-item" href="#"><i class="far fa-phone-alt ml-1 mr-1 icon"></i>+213 698 690 085</a>
        </div>
    </div>
    <!-- end topbar  -->
    <div class="d-flex flex-wrap flex-row justify-content-center ">
         
        <div class="item-group">
            <a class="c-n-item" href="{{route('showHotels')}}"><i class="far fa-hotel ml-1 mr-1 icon"></i>Hetels</a>
        </div>
        <div class="item-group">
            <a class="c-n-item" href="{{route('flights')}}"><i class="far fa-plane ml-1 mr-1 icon"></i>planes</a>
        </div>
        @guest
        <div class="item-group">
            <a class="c-n-item" href="{{route('register')}} "><i class="far fa-sign-in-alt ml-1 mr-1 icon"></i>Register</a>
        </div>  
        <div class="item-group">
            <a class="c-n-item" href=""><i class="far fa-plus ml-1 mr-1 icon"></i> Add Your </a>
            <div class="c-n-i-dropDown">
                <a href="{{route('addAirLine')}}" class="list-group-item"><i class="far fa-plane icon"></i> Air Line </a>
                <a href="{{route('registerHotelOwner')}}" class="list-group-item"><i class="far fa-hotel icon"></i> Hotel </a>
            </div>
        </div>  
        @endguest
    </div>
</div>
<!-- end navbar  -->
@guest
    
<!--  form login -->
<div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content mdl-color">

            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold my-3 bl-color">LogIn</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('login') }}">
                <div class="modal-body mx-3">
                    <!-- Email -->
                    <div class="md-form mb-5">
                        <i class="fas fa-envelope prefix  color-r"></i>
                        <input type="email"  name='email' id="Form-email5" class="form-control validate" placeholder="E-mail">
                        <label data-error="wrong" data-success="right" for="Form-email5"></label>
                    </div>
                    @csrf
                    <!-- Password -->
                    <div class="md-form mb-5">
                        <i class="fas fa-lock prefix color-r"></i>
                        <input type="password" name="password" id="defaultForm-pass" class="form-control validate"
                            placeholder="Password">
                        <label data-error="wrong" data-success="right" for="Form-pass5"></label>
                    </div>
                    <div class="md-form mb-5">
                        <!-- Remember me -->
                        <div class="row mb-3">
                            <div class="custom-checkbox">
                                <input type="checkbox" id="remember" name="remember">
                                <label for="remember"><span>Remember me</span></label>
                        </div>
                        </div>
                        <div class="row">
                            <a class="d-block color-b col-sm-12" href="{{ route('password.request') }}">Forget your password?</a>
                            
                            <a class="d-block color-b col-sm-12" href="{{ route('register') }}">Don't have account?</a>
                            
                        </div>

                    </div>
                </div>
                <!-- Forgot password -->
                <button class="btn btn-block button my-2" type="submit">Log in</button>
            </form>

        </div>
    </div>
</div>
<!--   form login -->
@endguest