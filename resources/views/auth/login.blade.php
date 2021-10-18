@extends('layouts.masterPage')
@section('pageTitle','login')
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
                <form method="POST" action="{{ route('login') }}"class="w-100 form">@csrf
                    <div class="form-group">
                      <label for="email" class="font-weight-bold"><i class="fas fa-envelope color-r ml-2 mr-2"></i>Email address </label>
                      <input id="email" type="email" class="form-control" placeholder="Enter email"  name="email" >
                    </div>
                    <div class="form-group">
                      <label for="pwd" class="font-weight-bold"><i class="fas fa-lock-alt color-r ml-2 mr-2"></i>Password </label>
                      <input type="password" class="form-control" placeholder="Enter password" id="pwd" name="password">
                    </div>
                    <div class="custom-checkbox ">
                        <input type="checkbox" id="rememberME" name="remember"   >
                        <label for="rememberME" class="font-weight-bold">Remember me</label>
                    </div>
                    <button type="submit" class="btn  bg-color-r">LogIn</button>
                </form> 
                <div>
                    @if (Route::has('password.request'))
                    <a class="d-block color-b" href="{{ route('password.request') }}">Forget your password?</a>
                     @endif
                    <a class="d-block color-b" href="{{ route('register') }}">Don't have account?</a>
                </div>
                
 
            </div>

        </div>
    </div>
    <!-- end body -->              
 

        
@endsection
@section('extr')
@endsection

